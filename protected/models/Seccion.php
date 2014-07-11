<?php

/**
 * This is the model class for table "seccion".
 *
 * The followings are the available columns in table 'seccion':
 * @property integer $id_seccion
 * @property integer $fk_carrera
 * @property integer $fk_trayecto
 * @property integer $fk_trimestre
 * @property integer $nu_seccion
 *
 * The followings are the available model relations:
 * @property Horario[] $horarios
 * @property Maestro $fkCarrera
 * @property Maestro $fkTrayecto
 * @property Maestro $fkTrimestre
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
			array('fk_carrera, fk_trayecto, fk_trimestre', 'required'),
			array('fk_carrera, fk_trayecto, fk_trimestre, nu_seccion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_seccion, fk_carrera, fk_trayecto, fk_trimestre, nu_seccion', 'safe', 'on'=>'search'),
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
			'horarios' => array(self::HAS_MANY, 'Horario', 'fk_seccion'),
			'fkCarrera' => array(self::BELONGS_TO, 'Maestro', 'fk_carrera'),
			'fkTrayecto' => array(self::BELONGS_TO, 'Maestro', 'fk_trayecto'),
			'fkTrimestre' => array(self::BELONGS_TO, 'Maestro', 'fk_trimestre'),
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
			'fk_carrera' => 'Fk Carrera',
			'fk_trayecto' => 'Fk Trayecto',
			'fk_trimestre' => 'Fk Trimestre',
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
		$criteria->compare('fk_carrera',$this->fk_carrera);
		$criteria->compare('fk_trayecto',$this->fk_trayecto);
		$criteria->compare('fk_trimestre',$this->fk_trimestre);
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
