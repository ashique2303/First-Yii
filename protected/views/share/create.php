<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'Shared Images'=>array('index'),
	'Share New Image',
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        //array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}?>

<h1>Share Image</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>