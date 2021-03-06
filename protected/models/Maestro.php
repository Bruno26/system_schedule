<?php

/**
 * This is the model class for table "maestro".
 *
 * The followings are the available columns in table 'maestro':
 * @property integer $id_maestro
 * @property string $descripcion
 * @property integer $padre
 *
 * The followings are the available model relations:
 * @property Horario[] $horarios
 * @property Horario[] $horarios1
 * @property AulaHora[] $aulaHoras
 * @property AulaHora[] $aulaHoras1
 * @property Seccion[] $seccions
 * @property Seccion[] $seccions1
 * @property Seccion[] $seccions2
 */
class Maestro extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'maestro';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('padre', 'numerical', 'integerOnly' => true),
            array('descripcion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_maestro, descripcion, padre', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'horarios' => array(self::HAS_MANY, 'Horario', 'fk_hora'),
            'horarios1' => array(self::HAS_MANY, 'Horario', 'fk_dia'),
            'aulaHoras' => array(self::HAS_MANY, 'AulaHora', 'fk_dia'),
            'aulaHoras1' => array(self::HAS_MANY, 'AulaHora', 'fk_hora'),
            'seccions' => array(self::HAS_MANY, 'Seccion', 'fk_carrera'),
            'seccions1' => array(self::HAS_MANY, 'Seccion', 'fk_trayecto'),
            'seccions2' => array(self::HAS_MANY, 'Seccion', 'fk_trimestre'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_maestro' => 'Id Maestro',
            'descripcion' => 'Descripcion',
            'padre' => 'Padre',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_maestro', $this->id_maestro);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('padre', $this->padre);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Maestro the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function FindMaestrosByPadreSelect($IdPadre, $Order = false) {
        $criteria = new CDbCriteria;
        if (!$Order) {
            $criteria->order = 't.descripcion ASC';
        } else {
            $criteria->order = $Order;
        }
        $criteria->addColumnCondition(array('t.padre' => $IdPadre));
        $data = CHtml::listData(self::model()->findAll($criteria), 'id_maestro', 'descripcion');
        return $data;
    }
    
    public function ConsultaPadre($IdPadre) {
        $criteria = new CDbCriteria;
        $criteria->addColumnCondition(array('t.padre' => $IdPadre));
        $criteria->order = 't.id_maestro ASC';
        $data = Maestro::model()->findAll($criteria);
        return $data;
    }
    public function ConsultaHoraDia($Id) {
        $criteria = new CDbCriteria;
        $criteria->addColumnCondition(array('t.id_maestro' => $Id));
        $criteria->order = 't.id_maestro ASC';
        $data = Maestro::model()->findAll($criteria);
        return $data;
    }
    

}
