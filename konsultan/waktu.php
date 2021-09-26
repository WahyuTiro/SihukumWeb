<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "<b>".date("d-M-Y", $tanggal)."</b><br/> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "<b>". $jam." "."</b><br/>";
?> 