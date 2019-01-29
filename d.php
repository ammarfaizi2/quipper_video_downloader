<?php

require __DIR__."/func.php";

$v = [
	"name" => "persamaan_linear_nilai_mutlak_satu_variabel",
	"url" => [
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732083001/3930705532001_5969732083001_s-%d.ts?pubId=3930705532001&videoId=5137899566001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732746001/3930705532001_5969732746001_s-%d.ts?pubId=3930705532001&videoId=5137916066001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732906001/3930705532001_5969732906001_s-%d.ts?pubId=3930705532001&videoId=5137916070001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732988001/3930705532001_5969732988001_s-%d.ts?pubId=3930705532001&videoId=5137901786001"
	]
];

downloader($v);
