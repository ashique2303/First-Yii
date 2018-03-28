<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	$model->Name,
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Publishers', 'url' => array('index')),
        array('label' => 'Add New Publisher', 'url' => array('create')),
        array('label' => 'Update Publisher', 'url' => array('update', 'id' => $model->ID)),
        array('label' => 'Delete Publisher', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ID), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else if ($level == 'Agent'){
    $this->menu = array(
        array('label' => 'List of My Publishers', 'url' => array('index')),
        array('label' => 'Add New Member', 'url' => array('create')),
        array('label' => 'Update Member', 'url' => array('update', 'id' => $model->ID)),
        array('label' => 'Delete Member', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ID), 'confirm' => 'Are you sure you want to delete this item?')),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(
        //array('label' => 'List of My Publishers', 'url' => array('index')),
        array('label' => 'Add New Member Of My Agent', 'url' => array('create')),
        array('label' => 'Update Profile', 'url' => array('update', 'id' => $model->ID)),
        array('label' => 'Delete Profile', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ID), 'confirm' => 'Are you sure you want to delete this item?')),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}?>

<h1>Publisher : <?php echo $model->UserName; ?></h1>

<?php

    $user = Publisher::model()->find(array('condition'=>"ID = $model->ParentID"));
    $name = $user->UserName;



$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Name',
		'UserName',
		'Password',
		'Level',
		'ParentID',
	),
)); ?>
