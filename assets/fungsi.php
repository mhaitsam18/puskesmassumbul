<?php
function rupiah($nilai, $pecahan = 0)
{
	return number_format($nilai, $pecahan, ',', '.');
}

function random($panjang)
{
	$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter) - 1);
		$string .= $karakter[$pos];
	}
	return $string;
}

function cekhari($angka)
{
	switch ($angka) {
		case '1':
			$hari = "Senin";
			break;

		case '2':
			$hari = "Selasa";
			break;

		case '3':
			$hari = "Rabu";
			break;

		case '4':
			$hari = "Kamis";
			break;

		case '5':
			$hari = "Jumat";
			break;

		case '6':
			$hari = "Sabtu";
			break;

		case '7':
			$hari = "Minggu";
			break;

		default:
			$hari = "";
			break;
	}

	return $hari;
}


function youtube($url)
{
	$link = str_replace('http://www.youtube.com/watch?v=', '', $url);
	$link = str_replace('https://www.youtube.com/watch?v=', '', $link);
	$data = '<object width="100%" height="500" data="http://www.youtube.com/v/' . $link . '" type="application/x-shockwave-flash">
	<param name="src" value="http://www.youtube.com/v/' . $link . '" />
	</object>';
	return $data;
}
