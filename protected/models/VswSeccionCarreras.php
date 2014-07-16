<?php

/**
 * This is the model class for table "vsw_seccion_carreras".
 *
 * The followings are the available columns in table 'vsw_seccion_carreras':
 * @property integer $id_seccion
 * @property integer $fk_carrera
 * @property string $carrera
 * @property integer $fk_trayecto
 * @property string $trayecto
 * @property integer $fk_trimestre
 * @property string $trimestre
 * @property integer $seccion
 * @property boolean $es_activo
 */
class VswSeccionCarreras extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'vsw_seccion_carreras';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_seccion, fk_carrera, fk_trayecto, fk_trimestre, seccion', 'numerical', 'integerOnly' => true),
            array('carrera, trayecto, trimestre, es_activo', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_seccion, fk_carrera, carrera, fk_trayecto, trayecto, fk_trimestre, trimestre, seccion, es_activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_seccion' => 'Id Seccion',
            'fk_carrera' => 'Fk Carrera',
            'carrera' => 'Carrera',
            'fk_trayecto' => 'Fk Trayecto',
            'trayecto' => 'Trayecto',
            'fk_trimestre' => 'Fk Trimestre',
            'trimestre' => 'Trimestre',
            'seccion' => 'Seccion',
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

        $criteria->compare('id_seccion', $this->id_seccion);
        $criteria->compare('fk_carrera', $this->fk_carrera);
        $criteria->compare('carrera', $this->carrera, true);
        $criteria->compare('fk_trayecto', $this->fk_trayecto);
        $criteria->compare('trayecto', $this->trayecto, true);
        $criteria->compare('fk_trimestre', $this->fk_trimestre);
        $criteria->compare('trimestre', $this->trimestre, true);
        $criteria->compare('seccion', $this->seccion);
        $criteria->compare('es_activo', $this->es_activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VswSeccionCarreras the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
