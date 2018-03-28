<?php


class ShareController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	public function actionCreate()
	{
        $users = Publisher::model()->find(array('condition'=>"UserName='".Yii::app()->user->name."'"));
		$model=new Share;
        $model->UserName = $users->UserName;
        $model->ParentID = $users->ParentID;
        //$model->Image = CUploadedFile::getInstance($model,'Image');

        $random = rand(1000, 9999);
        $uploadedFile = CUploadedFile::getInstance($model, 'Image');
        $fileName = "{$random}-{$uploadedFile}";
        $model->Image = $fileName;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Share']))
        {

            $model->attributes=$_POST['Share'];
            if($model->save()) {
                //$uploadedFile->saveAs('https://assignment-aws.s3.amazonaws.com/Md-Ashiqur-Rahman' . $model->Image);
                $uploadedFile->saveAs(Yii::app()->basePath . './../images/' . $model->Image);

                //$model->Image->saveAs(Yii::app()->basePath .'./../images/'.$model->Image);
                $this->redirect(array('view', 'id' => $model->ImageID));
            }
        }

//		$this->render('create',array(
//			'model'=>$model,
//		));

        $this->render('upload');
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Share']))
		{
			$model->attributes=$_POST['Share'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ImageID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $user = Publisher::model()->find(array('condition' => "UserName='".Yii::app()->user->name."'"));
        $level = $user->Level;
        $name = $user->UserName;
        $id = $user->ID;

        if ($level == "Admin"){
            $dataProvider=new CActiveDataProvider('Share');
        }elseif ($level == "Agent"){
            $dataProvider=new CActiveDataProvider('Share', array(
                'criteria' => array('condition' => "UserName ='$name' or ParentID='$id' or ShareWith = '$id'")));
        }else{
            $dataProvider=new CActiveDataProvider('Share', array(
                'criteria' => array('condition' => "UserName ='$name' or ShareWith = '$id'")));
        }
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));

        $this->render('list');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Share('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Share']))
			$model->attributes=$_GET['Share'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Share the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Share::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Share $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='share-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
