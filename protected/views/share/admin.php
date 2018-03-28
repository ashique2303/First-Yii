<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'Shared Images'=>array('index'),
	'Manage',
);

$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin') {
    $this->menu = array(
        array('label' => 'List of Shared Images', 'url' => array('index')),
        array('label' => 'Share New Image', 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#share-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
}?>

<h1>Manage Shares</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
$user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
$level = $user->Level;

if ($level == 'Admin')
{
echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'share-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ImageID',
		'UserName',
		'ParentID',
		'Image',
		'Caption',
		'ShareWith',
		/*
		'Time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); }?>
