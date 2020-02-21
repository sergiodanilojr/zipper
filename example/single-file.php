<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "single-file.php";
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileExample = __DIR__ . "/assets/files/example-file.txt";

$single = $zipper->zipFile($fileExample);

echo $single;
