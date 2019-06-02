<?php
header("Access-Control-Allow-Origin: *");
if (!file_exists("./todo.csv")) {
	file_put_contents("./todo.csv","");
	chmod("./todo,csv",0777);
}

function getCsv() {
	if (($handle = fopen("todo.csv", "r")) !== FALSE) {
		$bb = [];
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			foreach($data as $v)
				array_push($bb, $v);
		fclose($handle);
		return ($bb);
	}
	return False;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") 	{
	$e = $_POST['id'];
	$r  = getCsv();
	$dd = 0;
	$fp = fopen('./todo.csv','w');
	foreach ($r as $val) {
		$f = split(";", $val);
			if ($f[0] != $e )
				fputcsv($fp, [$val]);
			else
				$dd = 1;
	}
	echo ($dd);
}

?>
