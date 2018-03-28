<?php
/* @var $this ShareController */
/* @var $model Share */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ImageID'); ?>
		<?php echo $form->textField($model,'ImageID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ParentID'); ?>
		<?php echo $form->textField($model,'ParentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Image'); ?>
		<?php echo $form->textField($model,'Image',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Caption'); ?>
		<?php echo $form->textField($model,'Caption',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShareWith'); ?>
		<?php echo $form->textField($model,'ShareWith',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Time'); ?>
		<?php echo $form->textField($model,'Time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->