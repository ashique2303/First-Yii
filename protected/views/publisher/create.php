<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	'Add',
);

$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {

    $this->menu = array(
        array('label' => 'List of Publishers', 'url' => array('index')),
        array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else if ($level == 'Agent') {

    $this->menu = array(
        array('label' => 'List of My Publishers', 'url' => array('index')),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else{

    $this->menu = array(
        array('label' => 'View Profile', 'url' => array('view', 'id' => $model->ID)),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}?>

<h1>Add Publisher</h1>

<?php
    $this->renderPartial('_form', array('model'=>$model));
    $users = Publisher::model()->findAll(array('select'=>'UserName'));
?>