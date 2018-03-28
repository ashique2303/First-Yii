<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
    'Uploaded Files'=>array('index'),
    'Upload New File',
);
//$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
//$level = $user->Level;
//
//if ($level == 'Admin') {
//    $this->menu = array(
//        array('label' => 'List of Shared Files', 'url' => array('index')),
//        array('label' => 'Manage Shared Files', 'url' => array('admin')),
//    );
//}
//else{
//    $this->menu = array(
//        array('label' => 'List of Shared Files', 'url' => array('index')),
//        //array('label' => 'Manage Shared Files', 'url' => array('admin')),
//    );
//
//}

$this->menu = array(
    array('label' => 'List of Uploaded Files', 'url' => array('index')),);
?>

<?php

use Aws\S3\Exception\S3Exception;

require 'C:/xampp/htdocs/Image_Share/protected/config/start.php';

if (isset($_FILES['file']['name'])) {
    $file = $_FILES['file']['name'];
    $count = count($_FILES['file']['name']);

    for ($i = 0; $i < $count; $i++) {

        //File details
        $name = $_FILES['file']['name'][$i];
        $tmp_name = $_FILES['file']['tmp_name'][$i];
        $extension = explode('.', $name);
        $extension = strtolower(end($extension));
        if($tmp_name == "") {
            echo nl2br("Must choose a file first.");
        }
        else {
            if ($_FILES['file']['size'][$i] > 52428800) {
                echo nl2br(($i + 1) . "==>The file exceeds the limit of 50 MB. Your file : '" . $name . "'\n");

            } else {

                if (($extension != "exe" && $extension != "msi")) {

                    //Temp details
                    //$key = md5(uniqid());
                    $random = rand(10000, 99999);
                    $fileName = "{$random}-{$name}";
                    $tmp_file_name = "{$fileName}";
                    $tmp_file_path = "files/" . $_FILES['file']['name'][$i];


                    //Move the file
                    move_uploaded_file($tmp_name, $tmp_file_path);

                    try {

                        $s3->putObject([
                            'Bucket' => $config['s3']['bucket'],
                            'Key' => "Md-Ashiqur-Rahman/$tmp_file_name",
                            'Body' => fopen($tmp_file_path, 'rb'),
                            'ACL' => 'public-read'
                        ]);

                        //Remove the file
                        unlink($tmp_file_path);
                        echo nl2br(($i + 1) . "==> File: '" . $name . "' Uploaded\n");


                    } catch (S3Exception $e) {
                        die("There was an error uploading the file '" . $name . "'");
                    }
                } else {
                    echo nl2br(($i + 1) . "==>Any executable file (.exe or .msi)can't be uploaded. Your file : '" . $name . "'\n");
                }
            }
        }

    }

    die();
}

?>

<?php $this->renderPartial('_upform'); ?>
