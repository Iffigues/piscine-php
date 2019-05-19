<?php
if ($argc > 1) {
	$content = file_get_contents($argv[1]);
	echo $content;
}

