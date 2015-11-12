<?php
$directory = 'people';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
foreach ($scanned_directory as $value) {
  print "$value;";
}
?>
