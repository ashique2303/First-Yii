<?php

use \Aws\S3\S3Client;
require 'C:\xampp\htdocs\Image_Share\vendor\autoload.php';
$config = require ('C:\xampp\htdocs\Image_Share\protected\config\config.php');

//S3

$s3 = S3Client::factory([
    'key' => $config['s3']['key'],
    'secret' => $config['s3']['secret']
]);
