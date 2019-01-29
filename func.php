<?php

/**
 * @param array $v
 * @return void
 */
function downloader(array $vv): void
{
	if (isset($vv["name"], $vv["url"])) {
		foreach ($vv["url"] as $k => $v) {
			if (!(pcntl_fork())) {
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
		}

		$status = null;
		pcntl_wait($status);
	}
}
