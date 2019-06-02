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

function createId($r) {
		$i = 0;
		foreach ($r as $val) {
			$r = split(";", $val);
			$t = intVal($r[0]);
			if ($i < $t)
				$i = $t;
		}
		return ($i + 1);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") 	{
	$e = $_POST['todo'];
	$eee = $e;
	$e = urlencode($e);
	$bb = getCsv();
	$i = createId($bb);
	$fp = fopen('./todo.csv','w');
	if ($bb)
		fputcsv($fp,$bb);
	@fputcsv($fp,["$i;".$e]);
	header("Content-Type: application/json");
	echo (json_encode(['id'=>$i,'value' => $eee]));
}
?>
