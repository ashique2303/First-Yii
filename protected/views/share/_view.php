<?php
/* @var $this ShareController */
/* @var $data Share */
?>

<div class="view">

    <?php
    $user = Publisher::model()->find(array('condition'=>"ID = $data->ShareWith"));
    $name = $user->UserName;

    ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ImageID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ImageID), array('view', 'id'=>$data->ImageID)); ?>
<!--    --><?php //echo CHtml::link(CHtml::encode($data->ImageID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('ParentID')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->ParentID); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
<!--	--><?php //echo CHtml::encode($data->Image); ?>
           <?php echo CHtml::image(Yii::app()->baseUrl . "/images/" . $data->Image, "$data->Image", array("width" => 250, "height" => 250)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Caption')); ?>:</b>
	<?php echo CHtml::encode($data->Caption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShareWith')); ?>:</b>
	<?php echo CHtml::encode($name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Time')); ?>:</b>
	<?php echo CHtml::encode($data->Time); ?>
	<br />


</div>