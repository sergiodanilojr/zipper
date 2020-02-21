<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "single-file.php";
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileOne = __DIR__."/assets/files/example-file.txt";
$fileTwo = __DIR__."/assets/files/example-file-two.txt";

$files = [
    $fileOne,
    $fileTwo
];

//Here I'll set a new folder that not exists yet.
$path = __DIR__."/assets/files/ZipperFiles";

$several = $zipper->zipFiles($files, "MadeWithZipper", $path);

echo $several;
