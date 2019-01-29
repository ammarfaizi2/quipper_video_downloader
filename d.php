<?php

require __DIR__."/func.php";

$v = [
	"name" => "persamaan_linear_nilai_mutlak_satu_variabel",
	"url" => [
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732083001/3930705532001_5969732083001_s-%d.ts?pubId=3930705532001&videoId=5137899566001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969810241001/3930705532001_5969810241001_s-%d.ts?pubId=3930705532001&videoId=4970773896001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969809418001/3930705532001_5969809418001_s-%d.ts?pubId=3930705532001&videoId=4970773927001",
		"https://hlsrecruit-a.akamaihd.net/3930705532001/5969810083001/3930705532001_5969810083001_s-%d.ts?pubId=3930705532001&videoId=4970713714001"
	]
];

downloader($v);
