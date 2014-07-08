<?php

/**
 * This is the model class for table "seccion".
 *
 * The followings are the available columns in table 'seccion':
 * @property integer $id_seccion
 * @property string $str_carrares
 * @property integer $nu_trimestre
 * @property integer $nu_seccion
 *
 * The followings are the available model relations:
 * @property Materia[] $materias
 */
class Seccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nu_trimestre, nu_seccion', 'numerical', 'integerOnly'=>true),
			array('str_carrares', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_seccion, str_carrares, nu_trimestre, nu_seccion', 'safe', 'on'=>'search'),
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
			'materias' => array(self::HAS_MANY, 'Materia', 'fk_seccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_seccion' => 'Id Seccion',
			'str_carrares' => 'nombre de la carrera',
			'nu_trimestre' => 'trimestre de la carrera',
			'nu_seccion' => 'numero de la seccion',
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

		$criteria->compare('id_seccion',$this->id_seccion);
		$criteria->compare('str_carrares',$this->str_carrares,true);
		$criteria->compare('nu_trimestre',$this->nu_trimestre);
		$criteria->compare('nu_seccion',$this->nu_seccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Seccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
