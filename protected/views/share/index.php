<?php
/* @var $this ShareController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shared Images',
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(

        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(

        array('label' => 'Share New Image', 'url' => array('create')),
        array('label' => 'Manage Shared Images', 'url' => array('admin')),
    );
}
?>

<h1>List of Shared Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
