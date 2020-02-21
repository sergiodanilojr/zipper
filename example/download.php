<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "single-file.php";
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileExample = __DIR__ . "/assets/files/example-file.txt";

//This method don't return, obvly, a way!
$zipper->download($fileExample);