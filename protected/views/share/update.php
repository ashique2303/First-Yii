<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'Shared Images'=>array('index'),
	$model->ImageID=>array('view','id'=>$model->ImageID),
	'Update',
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'View Shared Image', 'url' => array('view', 'id' => $model->ImageID)),
        array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'View Shared Image', 'url' => array('view', 'id' => $model->ImageID)),
        //array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}?>

<h1>Update Shared Image :<?php echo $model->ImageID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>