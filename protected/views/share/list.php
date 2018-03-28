<?php
/* @var $this ShareController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Uploaded Files',
);
//$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
//$level = $user->Level;
//
//if ($level == 'Admin') {
//    $this->menu = array(
//
//        array('label' => 'Upload New Files', 'url' => array('create')),
//        //array('label' => 'Manage Uploaded Files', 'url' => array('admin')),
//    );
//}
//else{
//    $this->menu = array(
//
//        array('label' => 'Share New Files', 'url' => array('create')),
//        //array('label' => 'Manage Shared Images', 'url' => array('admin')),
//    );
//}

$this->menu = array(
    array('label' => 'Upload New Files', 'url' => array('create')),
);
?>


<?php

require 'C:\xampp\htdocs\Image_Share\protected\config\start.php';


$objects = $s3->getIterator('ListObjects',[
    'Bucket' => $config['s3']['bucket'],
    'Prefix' =>'Md-Ashiqur-Rahman/'
]);


?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<table>
    <thead>
    <tr>
        <th>File</th>
        <th>Download</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($objects as $object): ?>
        <tr><?php
            $file = explode('/', $object['Key']);
            $file = strtolower(end($file));
            ?>
            <td><?php echo $file; ?></td>
            <td><a href="<?php echo $s3->getObjectUrl( $config['s3']['bucket'],$object['Key']); ?>" download="<?php $object['Key'];
                ?>">Download</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>


</html>
