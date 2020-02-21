<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "single-file.php";
require __DIR__ . "/vendor/autoload.php";

use SergioDaniloJr\Zipper\Zipper;

$zipper = new Zipper();

$fileToExtract = __DIR__ . "/assets/files/MadeWithZipper.zip";

//Here I'll set a new folder that not exists yet. But You can set a existent folder.
$destiny = __DIR__ . "/assets/files/Storage";

$extracted = $zipper->extract($fileToExtract, $destiny);

echo $extracted;
