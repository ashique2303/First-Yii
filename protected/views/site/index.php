<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$username = Publisher::model()->findAll();

if(Yii::app()->user->isGuest) {
    ?>
    <div id="logo" style="text-align-last: center"><?php echo "Please login if you are an enlisted publisher.<br> If not, please contact an enlisted publisher to add you."; ?></div>
<?php
}
else {?>
<div id="logo" style="text-align-last: center"><?php echo "WELCOME TO THE AWS-S3 FILE UPLOADING WEBSITE"; ?></div>
<?php
}
?>

