<?php

/**
 * @param array $v
 * @return void
 */
function downloader(array $vv): void
{
	if (isset($vv["name"], $vv["url"])) {
		$tarFile = sprintf("%s.tar.gz", $vv["name"]);
		if (file_exists(sprintf(__DIR__."/downloads/%s", $tarFile))) {
			return;
		}
		$tarFile = escapeshellarg($tarFile);

		cli_set_process_title(
			sprintf("qd --name %s -o %s --no-daemon --max-compression", $vv["name"], $tarFile)
		);

		$pids = [];
		$c = count($vv["url"]);
		foreach ($vv["url"] as $k => $v) {
			if (!($pid = pcntl_fork())) {
				cli_set_process_title(
					sprintf("qd-worker --part %d --no-delay --partial-stream %s", $c - $k, $v)
				);
				$i = 1;
				$handle = fopen(sprintf(__DIR__."/downloads/%s_part_%d.ts", $vv["name"], $k), "w");
				while (true) {
					$ch = curl_init(sprintf($v, $i));
					curl_setopt_array($ch, 
						[
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_SSL_VERIFYPEER => false,
							CURLOPT_SSL_VERIFYHOST => false
						]
					);
					$out = curl_exec($ch);
					curl_close($ch);
					if (!$out) {
						printf("Done!\n");
						break;
					}
					printf("Scraping part %d segment %d...\n", $k, $i);
					printf("Wrote %d bytes\n", fwrite($handle, $out));
					$i++;
				}
				fclose($handle);
				exit;
			}
			$pids[] = $pid;
		}

		$status = null;
		foreach ($pids as $pid) {
			pcntl_waitpid($pid, $status);
		}

		$files = sprintf("%s_part_*.ts", escapeshellarg($vv["name"]));
		$wd = escapeshellarg(__DIR__."/downloads");
		$cmd = escapeshellarg(sprintf(
			"cd %s; env GZIP=-9 tar cvzf %s %s",
			$wd,
			$tarFile,
			$files
		));
		shell_exec("bash -c {$cmd}");
	}
}
