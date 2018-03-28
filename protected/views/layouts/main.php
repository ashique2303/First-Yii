<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="container" id="page">

	<div id="header">
        <div id="logo" style="text-align-last: center"><strong><?php echo CHtml::encode(Yii::app()->name); ?></strong></div>
        <?php
        if(!Yii::app()->user->isGuest) {
            $user = Publisher::model()->find(array('condition' => "UserName='".Yii::app()->user->name."'"));
            $level = $user->Level;
            $name = $user->Name;
            $id = $user->ID;

        ?>
            <div id="logo" style="font-size: medium;text-align-last: center""><?php echo "Name: $name <br> Designation: $level";?></div>
        <?php
        }
        ?>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'List of My Publishers', 'url'=>array('/publisher/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Add Publisher', 'url'=>array('/publisher/create'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'List of Uploaded Files In Bucket', 'url'=>array('/share/index'), 'visible'=>!Yii::app()->user->isGuest),
//                array('label'=>'Share Image', 'url'=>array('/share/create'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Upload Files', 'url'=>array('/share/create'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Admin.<br/>
		All Rights Reserved.<br/>
<!--		--><?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
