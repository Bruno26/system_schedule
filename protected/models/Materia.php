<?php

/**
 * This is the model class for table "materia".
 *
 * The followings are the available columns in table 'materia':
 * @property integer $id_materia
 * @property integer $fk_seccion
 * @property string $str_materia
 * @property string $str_corto_materia
 * @property boolean $es_activo
 *
 * The followings are the available model relations:
 * @property Seccion $fkSeccion
 * @property Horario[] $horarios
 */
class Materia extends CActiveRecord {

    public $carrera;
    public $trayecto;
    public $trimestre;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'materia';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fk_seccion, str_materia,str_corto_materia', 'required'),
            array('fk_seccion', 'numerical', 'integerOnly' => true),
            array('str_materia, str_corto_materia, es_activo', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_materia, fk_seccion, str_materia, str_corto_materia, es_activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'fkSeccion' => array(self::BELONGS_TO, 'Seccion', 'fk_seccion'),
            'horarios' => array(self::HAS_MANY, 'Horario', 'fk_materia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_materia' => 'Id Materia',
            'fk_seccion' => 'Seccion',
            'trayecto' => 'Trayecto',
            'carrera' => 'Carrera',
            'trimestre' => 'Trimestre',
            'str_materia' => 'Materia',
            'str_corto_materia' => 'Abreviatura de la Materia',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_materia', $this->id_materia);
        $criteria->compare('fk_seccion', $this->fk_seccion);
        $criteria->compare('str_materia', $this->str_materia, true);
        $criteria->compare('str_corto_materia', $this->str_corto_materia, true);
        $criteria->compare('es_activo', $this->es_activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Materia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function FindMateriasSeccion($IdSeccion, $Order = false) {
        $criteria = new CDbCriteria;
        if (!$Order) {
            $criteria->order = 't.str_materia ASC';
        } else {
            $criteria->order = $Order;
        }
        $criteria->addColumnCondition(array('t.fk_seccion' => $IdSeccion));
        $data = CHtml::listData(self::model()->findAll($criteria), 'id_materia', 'str_materia');
        return $data;
    }

}
