<?php
/* @var $this PublisherController */
/* @var $data Publisher */
?>

<div class="view">

    <?php
    $user = Publisher::model()->find(array('condition'=>"ID = $data->ParentID"));
    $name = $user->UserName;

    ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('Password')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->Password); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Level')); ?>:</b>
	<?php echo CHtml::encode($data->Level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ParentID')); ?>:</b>
	<?php echo CHtml::encode($name); ?>
	<br />


</div>