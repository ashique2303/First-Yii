<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'Shared Images'=>array('index'),
	$model->ImageID,
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'Update Shared Image', 'url' => array('update', 'id' => $model->ImageID)),
        array('label' => 'Delete Shared Image', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ImageID), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'Update Shared Image', 'url' => array('update', 'id' => $model->ImageID)),
        array('label' => 'Delete Shared Image', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ImageID), 'confirm' => 'Are you sure you want to delete this item?')),
        //array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );

}?>

<h1>Shared Image Name:  <?php echo $model->Image; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'UserName',
		'Image',
		'Caption',
        'ShareWith',
		'Time',
	),
)); ?>
