<?php

class HorarioController extends Controller {
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
                'actions' => array('index', 'view', 'BuscarDisponibilidad', 'RegistrarHorario'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
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
        $criteria = new CDbCriteria;
        $criteria->addColumnCondition(array('t.fk_seccion' => $id));
        $seccion = SeccionController::loadmodel($id);
        $busquedaHorario = VswHorarioSeccion::model()->findAll($criteria);
        if (empty($busquedaHorario)) {
            $this->redirect(array('seccion/admin', 'error' => 'error'));
            Yii:app()->end();
        } else {
            $carrera = VswSeccionCarreras::model()->findByAttributes(array('id_seccion' => $id, 'es_activo' => 1));

            $listaDias = array();
            $listaHora = array();

//        listado de horas
            $horas = Maestro::ConsultaPadre(9);
            foreach ($horas as $valor):
                array_push($listaHora, $valor->descripcion);
            endforeach;
//        listado de dias        
            $dias = Maestro::ConsultaPadre(1);
            foreach ($dias as $valor):
                array_push($listaDias, $valor->id_maestro);
            endforeach;

            $html = '<table border="1" class="table responsive">'
                    . '<tr>'
                    . '<th>HORA</th><th>Lunes</th>'
                    . '<th>Martes</th><th>Miercoles</th>'
                    . '<th>Jueves</th><th>Viernes</th>'
                    . '<th>Sabado</th><th>Domingo</th></tr>';
            for ($i = 1; $i <= count($listaHora); $i++) {

                $html.='<tr>';
                $horaTable = $listaHora[$i - 1];
                $html.='<td>' . $horaTable . '</td>';
                for ($j = 1; $j <= count($listaDias); $j++) {
                    $diaArray = $listaDias[$j - 1];
                    $band = 0;
                    foreach ($busquedaHorario as $valor):
                        if ($valor->hora == $horaTable && $valor->fk_dia == $diaArray) {
                            $html.='<td>' . $valor->materia . '</td>';
                            $band++;
                        }
                    endforeach;
                    if ($band == 0) {$html.='<td></td>';}
                }
                $html.='</tr>';
            }
            $html.='</table>';
//            $this->render('pdf', array('html' => $html, 'carrera' => $carrera,'listaHora'=>$listaHora,'listaDias'=>$listaDias,'busquedaHorario'=>$busquedaHorario));
            $this->render('view', array('html' => $html, 'seccion' => $seccion));
        }
    }

    /**
     * METODO QUE BUSCA SI EL AULA ESTA DISPONIBLE O NO 
     */
    public function actionBuscarDisponibilidad() {
        if (isset($_POST)) {
            $hora = (int) $_POST['horaPost'];
            $dia = (int) $_POST['diaPost'];
            $aula = (int) $_POST['aulaPost'];
            $consulta = AulaHora::model()->findByAttributes(array('fk_aula' => $aula, 'fk_dia' => $dia, 'fk_hora' => $hora, 'es_activo' => 1));
            if (empty($consulta))
                echo json_encode(1); //si el aula esta acopada en caso que sea NULL
            else
                echo json_encode(0); //si el aula esta disponible
        }
    }

    /**
     * METODO PARA REGISTRAR HORARIO A UNA SECCION
     */
    public function actionRegistrarHorario() {
        if (isset($_POST)) {
            $horario = new Horario; //modelo Horario 
            $aulaHora = new AulaHora; //modelo Horario 

            $hora = (int) $_POST['horaPost'];
            $dia = (int) $_POST['diaPost'];
            $aula = (int) $_POST['aulaPost'];
            $materia = (int) $_POST['materiaPost'];
            $seccion = (int) $_POST['seccionPost'];

            $aulaHora->fk_aula = $aula;
            $aulaHora->fk_hora = $hora;
            $aulaHora->fk_dia = $dia;
            $aulaHora->es_activo = 1;
            if ($aulaHora->save()) {
                $horario->fk_aula = $aula;
                $horario->fk_dia = $dia;
                $horario->fk_hora = $hora;
                $horario->fk_materia = $materia;
                $horario->fk_seccion = $seccion;
                if ($horario->save()) {
                    echo json_encode(1); //si el aula esta acopada en caso que sea NULL
                } else {
                    echo json_encode(0); //si el aula esta disponible
                }
            } else {
                echo json_encode(0); //si el aula esta disponible
            }
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Horario'])) {
            $model->attributes = $_POST['Horario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_horario));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $consulta = $this->loadModel($id);
            $liberar_aula = AulaHora::model()->findByAttributes(array('fk_aula' => $consulta->fk_aula, 'fk_dia' => $consulta->fk_dia, 'fk_hora' => $consulta->fk_hora));
            $liberar_aula->updateByPk($liberar_aula->id_aula_hora, array('es_activo' => 0));
            Horario::model()->updateByPk($id, array('es_activo' => 0));
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($id) {
        $seccion = SeccionController::loadmodel($id);
        $model = new Horario;

        $this->render('index', array('seccion' => $seccion, 'model' => $model));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Horario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Horario']))
            $model->attributes = $_GET['Horario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Horario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'horario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
