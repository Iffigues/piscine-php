<?phop
fuction($r) {
	if (($handle = fopen("test.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		}
	}
}
?>
