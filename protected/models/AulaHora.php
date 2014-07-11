<?php

/**
 * This is the model class for table "aula_hora".
 *
 * The followings are the available columns in table 'aula_hora':
 * @property integer $id_aula_hora
 * @property integer $fk_aula
 * @property integer $fk_dia
 * @property integer $fk_hora
 * @property boolean $es_activo
 *
 * The followings are the available model relations:
 * @property Aula $fkAula
 * @property Maestro $fkDia
 * @property Maestro $fkHora
 */
class AulaHora extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aula_hora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_aula, fk_dia, fk_hora', 'required'),
			array('fk_aula, fk_dia, fk_hora', 'numerical', 'integerOnly'=>true),
			array('es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_aula_hora, fk_aula, fk_dia, fk_hora, es_activo', 'safe', 'on'=>'search'),
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
			'fkDia' => array(self::BELONGS_TO, 'Maestro', 'fk_dia'),
			'fkHora' => array(self::BELONGS_TO, 'Maestro', 'fk_hora'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_aula_hora' => 'Id Aula Hora',
			'fk_aula' => 'Fk Aula',
			'fk_dia' => 'Fk Dia',
			'fk_hora' => 'Fk Hora',
			'es_activo' => 'true si esta ocupado, false si esta libre',
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

		$criteria->compare('id_aula_hora',$this->id_aula_hora);
		$criteria->compare('fk_aula',$this->fk_aula);
		$criteria->compare('fk_dia',$this->fk_dia);
		$criteria->compare('fk_hora',$this->fk_hora);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AulaHora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
