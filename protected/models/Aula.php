<?php

/**
 * This is the model class for table "aula".
 *
 * The followings are the available columns in table 'aula':
 * @property integer $id_aula
 * @property string $str_piso
 * @property string $nu_aula
 * @property string $piso_aula
 * @property boolean $es_activo
 *
 * The followings are the available model relations:
 * @property AulaHora[] $aulaHoras
 * @property Horario[] $horarios
 */
class Aula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('str_piso, nu_aula, piso_aula, es_activo', 'safe'),
			array('str_piso, nu_aula', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_aula, str_piso, nu_aula, piso_aula, es_activo', 'safe', 'on'=>'search'),
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
			'aulaHoras' => array(self::HAS_MANY, 'AulaHora', 'fk_aula'),
			'horarios' => array(self::HAS_MANY, 'Horario', 'fk_aula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_aula' => 'Id Aula',
			'str_piso' => 'Piso',
			'nu_aula' => 'Número de Aula',
			'piso_aula' => 'Piso Aula',
			'es_activo' => 'Disponibilidad',
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

		$criteria->compare('id_aula',$this->id_aula);
		$criteria->compare('str_piso',$this->str_piso,true);
		$criteria->compare('nu_aula',$this->nu_aula,true);
		$criteria->compare('piso_aula',$this->piso_aula,true);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function BuscarPiso(){
		$criteria = new CDbCriteria;
		$data = CHtml::listData(self::model()->findAll($criteria), 'str_piso', 'str_piso');
        return $data;
		}
	public function BuscarNumeroAula(){
		$criteria = new CDbCriteria;
		$data = CHtml::listData(self::model()->findAll($criteria), 'nu_aula', 'nu_aula');
        return $data;
		}
}
