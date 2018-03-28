<?php
/* @var $this PublisherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publishers',
);

$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'Add New Publisher', 'url' => array('create')),
        array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else if ($level == 'Agent') {
    $this->menu = array(
        array('label' => 'Add New Member', 'url' => array('create')),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}
else{
    $this->menu = array(
        array('label' => 'Add New Member Of My Agent', 'url' => array('create')),
        //array('label' => 'Manage Existing Publishers', 'url' => array('admin')),
    );
}?>

<h1>List of My Publishers</h1>

<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
));
?>
