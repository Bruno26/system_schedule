<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $id_horario
 * @property integer $fk_seccion
 * @property integer $fk_hora
 * @property integer $fk_aula
 * @property integer $fk_materia
 * @property integer $fk_dia
 * @property boolean $es_activo
 *
 * The followings are the available model relations:
 * @property Aula $fkAula
 * @property Materia $fkMateria
 * @property Seccion $fkSeccion
 * @property Maestro $fkHora
 * @property Maestro $fkDia
 */
class Horario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_seccion, fk_hora, fk_aula, fk_materia, fk_dia', 'required'),
			array('fk_seccion, fk_hora, fk_aula, fk_materia, fk_dia', 'numerical', 'integerOnly'=>true),
			array('es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_horario, fk_seccion, fk_hora, fk_aula, fk_materia, fk_dia, es_activo', 'safe', 'on'=>'search'),
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
			'fkAula' => array(self::BELONGS_TO, 'Aula', 'fk_aula'),
			'fkMateria' => array(self::BELONGS_TO, 'Materia', 'fk_materia'),
			'fkSeccion' => array(self::BELONGS_TO, 'Seccion', 'fk_seccion'),
			'fkHora' => array(self::BELONGS_TO, 'Maestro', 'fk_hora'),
			'fkDia' => array(self::BELONGS_TO, 'Maestro', 'fk_dia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_horario' => 'Id Horario',
			'fk_seccion' => 'Fk Seccion',
			'fk_hora' => 'Hora',
			'fk_aula' => 'Aula',
			'fk_materia' => 'Materia',
			'fk_dia' => 'Dia',
			'es_activo' => 'Es Activo',
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

		$criteria->compare('id_horario',$this->id_horario);
		$criteria->compare('fk_seccion',$this->fk_seccion);
		$criteria->compare('fk_hora',$this->fk_hora);
		$criteria->compare('fk_aula',$this->fk_aula);
		$criteria->compare('fk_materia',$this->fk_materia);
		$criteria->compare('fk_dia',$this->fk_dia);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
