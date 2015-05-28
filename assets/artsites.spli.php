<?php
$svariants = urldecode($_GET["data"]);
$svariants = json_decode($svariants);
$svariantsnum = count($svariants) -1;

function get_file_num_plus_one(){
	GLOBAL $svariantsnum;
	$file = fopen("base.dat", "c+");
	$num = intval(fgets($file));
	fclose($file);
	$file = fopen('base.dat', 'w+');

	if ($num+1 > $svariantsnum) {
		fwrite($file,1);
	}else{
		fwrite($file,$num+1);
	}
	fclose($file);
	return $num;
}
if (isset($_COOKIE["art_split"])) {
	$variant = $_COOKIE["art_split"];
}else{
	$variant = get_file_num_plus_one();
	echo "
		var date = new Date( new Date().getTime() + 31449600000 );
		document.cookie='art_split=".$variant."; path=/; expires='+date.toUTCString();
";
}
echo 'if (typeof $global === "undefined") {$global = {};};';
echo "\$global.split = ".$variant.";";
if (preg_match("/\?/i", $svariants[$variant])) {
	    $local = $svariants[$variant].(!empty($svariants[0][1]) ? "&".$svariants[0][1] : "");
	} else{
	    $local = $svariants[$variant].(!empty($svariants[0][1]) ? "?".$svariants[0][1] : "");
	}

$preg = preg_quote($svariants[$variant]);
$preg = str_replace("/", "\/", $preg);
// echo "console.log('".$svariants[0][0]."');";
// echo "console.log('".."');";

if (!preg_match("/$preg/i", $svariants[0][0])) {	
	echo "document.location.href = '".$local."';";
}




?>