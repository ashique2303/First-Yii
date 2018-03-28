<?php
/* @var $this ShareController */
/* @var $model Share */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'share-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'UserName'); ?>
<!--		--><?php //echo $form->labelEx($model,'UserName',array('size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'UserName'); ?>
<!--	</div>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'ParentID'); ?>
<!--		--><?php //echo $form->textField($model,'ParentID'); ?>
<!--		--><?php //echo $form->error($model,'ParentID'); ?>
<!--	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'Image'); ?>
		<?php echo $form->fileField($model,'Image'); ?>
		<?php echo $form->error($model,'Image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Caption'); ?>
		<?php echo $form->textArea($model,'Caption',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'Caption'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShareWith'); ?>
		<?php echo $form->dropDownList($model, 'ShareWith', CHtml::listData(Publisher::model()->findAll(),'ID','UserName')); ?>
		<?php echo $form->error($model,'ShareWith'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Share New File' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->