<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Publishers', 'url' => array('index')),
        array('label' => 'Add New Publisher', 'url' => array('create')),
        array('label' => 'View Publisher', 'url' => array('view', 'id' => $model->ID)),
        array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else if ($level == 'Agent') {
    $this->menu = array(
        array('label' => 'List of My Publishers', 'url' => array('index')),
        array('label' => 'Add New Member', 'url' => array('create')),
        array('label' => 'View Member', 'url' => array('view', 'id' => $model->ID)),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(
        //array('label' => 'List of My Publishers', 'url' => array('index')),
        array('label' => 'Add New Member Of My Agent', 'url' => array('create')),
        array('label' => 'View Profile', 'url' => array('view', 'id' => $model->ID)),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}?>

<h1>Update Publisher <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>