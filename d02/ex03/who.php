<?php
$f = file_get_contents("/var/run/utmp", true);
echo $f;

