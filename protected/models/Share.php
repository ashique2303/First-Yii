<?php

/**
 * This is the model class for table "share".
 *
 * The followings are the available columns in table 'share':
 * @property integer $ImageID
 * @property string $UserName
 * @property integer $ParentID
 * @property string $Image
 * @property string $Caption
 * @property string $ShareWith
 */
class Share extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'share';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserName, ParentID, Image, ShareWith', 'required'),
			array('ParentID', 'numerical', 'integerOnly'=>true),
			array('UserName', 'length', 'max'=>100),
			array('Image, Caption, ShareWith', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ImageID, UserName, ParentID, Image, Caption, ShareWith, Time', 'safe', 'on'=>'search'),
            //array('Image', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
            array('Image', 'file', 'types'=>!'exe, msi', 'safe' => false),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ImageID' => 'Image',
			'UserName' => 'Uploader',
			'ParentID' => 'Parent',
			'Image' => 'Files',
			'Caption' => 'Description',
			'ShareWith' => 'Share With',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ImageID',$this->ImageID);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('ParentID',$this->ParentID);
		$criteria->compare('Image',$this->Image,true);
		$criteria->compare('Caption',$this->Caption,true);
		$criteria->compare('ShareWith',$this->ShareWith,true);
		$criteria->compare('Time',$this->Time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Share the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
