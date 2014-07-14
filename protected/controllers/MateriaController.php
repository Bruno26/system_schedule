<?php

class MateriaController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'BuscarTrayecto', 'BuscarTrimestre', 'BuscarSeccion'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = VswCarreraMaterias::model()->findByPk($id);
        $this->render('view', array('model' => $model));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Materia;

        if (isset($_POST['Materia'])) {

            $consulta = VswCarreraMaterias::model()->findByAttributes(array(
                'fk_carrera' => (int) $_POST['Materia']['carrera'],
                'fk_trayecto' => (int) $_POST['Materia']['trayecto'],
                'fk_trimestre' => (int) $_POST['Materia']['trimestre'],
                'str_materia' => strtoupper($_POST['Materia']['str_materia']),
                'str_corto_materia' => strtoupper($_POST['Materia']['str_corto_materia']),
                'es_activo' => 1,
                'id_seccion' => (int) $_POST['Materia']['fk_seccion']));
            if (!empty($consulta)) {
                $this->render('create', array('model' => $model, 'error' => 'error'));
                Yii:app()->end();
            } else {
                $model->fk_seccion = $_POST['Materia']['fk_seccion'];
                $model->str_materia = strtoupper($_POST['Materia']['str_materia']);
                $model->str_corto_materia = strtoupper($_POST['Materia']['str_corto_materia']);
                if ($model->save()) {
                    Yii::app()->session->destroy();
                    $this->redirect(array('view', 'id' => $model->id_materia));
                }
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            Materia::model()->UpdateByPk($id, array("es_activo" => 0));
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new VswCarreraMaterias('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VswCarreraMaterias']))
            $model->attributes = $_GET['VswCarreraMaterias'];

        $this->render('admin', array('model' => $model));
    }

    /**
     * FUNCION QUE MUESTRA TODOS LOS TRAYECTOS DE ACUERDO A UN ID DE UNA CARRERA
     */
    public function actionBuscarTrayecto() {
        $Id = (isset($_POST['Materia']['carrera']) ? $_POST['Materia']['carrera'] : $_GET['carrera']);
        Yii::app()->getSession()->add('carrera', $Id);
        $Selected = isset($_GET['trayecto']) ? $_GET['trayecto'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.fk_carrera = :fk_carrera AND es_activo= true');
            $criteria->params = array(':fk_carrera' => $Id);
            $criteria->order = 't.fk_trayecto ASC';
            $data = CHtml::listData(VswSeccionCarreras::model()->findAll($criteria), 'fk_trayecto', 'trayecto');

            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }

    /**
     * FUNCION QUE MUESTRA TODOS LOS TRIEMESTRES DE ACUERDO A UN ID DEL TRAYECTO
     */
    public function actionBuscarTrimestre() {
        $Id = (isset($_POST['Materia']['trayecto']) ? $_POST['Materia']['trayecto'] : $_GET['trayecto']);
        Yii::app()->getSession()->add('trayecto', $Id);
        $Selected = isset($_GET['trimestre']) ? $_GET['trimestre'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.fk_trayecto= :fk_trayecto AND es_activo= true');
            $criteria->params = array(':fk_trayecto' => $Id);
            $criteria->order = 't.trimestre ASC';
            $data = CHtml::listData(VswSeccionCarreras::model()->findAll($criteria), 'fk_trimestre', 'trimestre');

            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }

    /**
     * FUNCION QUE MUESTRA TODOS LOS TRIEMESTRES DE ACUERDO A UN ID DEL TRAYECTO
     */
    public function actionBuscarSeccion() {
        $Id = (isset($_POST['Materia']['trimestre']) ? $_POST['Materia']['trimestre'] : $_GET['trimestre']);
        $Selected = isset($_GET['fk_seccion']) ? $_GET['fk_seccion'] : '';
        $carrera = Yii::app()->getSession()->get('carrera'); // id_carrera
        $trayecto = Yii::app()->getSession()->get('trayecto'); //id_trayecto
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.fk_trimestre= :fk_trimestre AND t.fk_carrera= :fk_carrera AND t.fk_trayecto= :fk_trayecto');
            $criteria->params = array(':fk_trimestre' => $Id, ':fk_carrera' => $carrera, ':fk_trayecto' => $trayecto);

            $criteria->order = 't.seccion ASC';
            $data = CHtml::listData(VswSeccionCarreras::model()->findAll($criteria), 'id_seccion', 'seccion');

            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Materia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'materia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
