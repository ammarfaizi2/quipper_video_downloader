<?php

require __DIR__."/func.php";

$vv = [
	[
		"name" => "persamaan_linear_nilai_mutlak_satu_variabel",
		"url" => [
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732083001/3930705532001_5969732083001_s-%d.ts?pubId=3930705532001&videoId=5137899566001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732746001/3930705532001_5969732746001_s-%d.ts?pubId=3930705532001&videoId=5137916066001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732906001/3930705532001_5969732906001_s-%d.ts?pubId=3930705532001&videoId=5137916070001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732988001/3930705532001_5969732988001_s-%d.ts?pubId=3930705532001&videoId=5137901786001"
		]
	],
	[
		"name" => "sistem_persamaan_linear_tiga_variabel",
		"url" => [
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732728001/3930705532001_5969732728001_s-%d.ts?pubId=3930705532001&videoId=5137902581001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732734001/3930705532001_5969732734001_s-%d.ts?pubId=3930705532001&videoId=5137902585001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969732614001/3930705532001_5969732614001_s-%d.ts?pubId=3930705532001&videoId=5137906826001",
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969731982001/3930705532001_5969731982001_s-%d.ts?pubId=3930705532001&videoId=5137922847001"
		]
	],
	[
		"name" => "persiapan_un_materi_listrik",
		"url" => [
			"https://hlsrecruit-a.akamaihd.net/3930705532001/5969556430001/3930705532001_5969556430001_s-%d.ts?pubId=3930705532001&videoId=5342729477001"
		]
	]
];

foreach ($vv as &$v) {
	downloader($v);
}
