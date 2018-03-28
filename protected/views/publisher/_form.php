<?php
/* @var $this PublisherController */
/* @var $model Publisher */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publisher-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <?php
        $user = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
        $level = $user->Level;

    ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'UserName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

    <?php
    if ($level=="Admin")
    {
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Level'); ?>
		<?php echo $form->dropDownList($model,'Level',array('Agent' => 'Agent','Member' => 'Member'),array('selected' => 'Choose')); ?>
		<?php echo $form->error($model,'Level'); ?>
	</div>

    <?php

    }

    ?>

    <?php
    if ($level=="Admin")
    {
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ParentID'); ?>
        <?php echo $form->dropDownList($model, 'ParentID', CHtml::listData(Publisher::model()->findAll(array('condition'=>'Level != "Member"')),
            'ID','UserName')); ?>
		<?php echo $form->error($model,'ParentID'); ?>
	</div>

        <?php

    }

    ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add New Publisher' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->