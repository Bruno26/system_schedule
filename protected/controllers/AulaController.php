<?php

class AulaController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
//public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','borrar'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Aula;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Aula']))
{
	$consulta = Aula::model()->findByAttributes(array(
                'str_piso' =>$_POST['Aula']['str_piso'],
                'nu_aula' =>$_POST['Aula']['nu_aula'],
                'es_activo' => 1));
                //var_dump($consulta);die;
if (!empty($consulta)) {
                $this->render('create', array('model' => $model, 'error' => 'error'));
            } else {
                $model->str_piso = strtoupper($_POST['Aula']['str_piso']);
                $model->nu_aula = strtoupper($_POST['Aula']['nu_aula']);
                $model->piso_aula = strtoupper($_POST['Aula']['str_piso'].$_POST['Aula']['nu_aula']);
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id_aula));
            }
}
$this->render('create',array('model'=>$model));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Aula']))
{
	$model->str_piso = strtoupper($_POST['Aula']['str_piso']);
    $model->nu_aula = strtoupper($_POST['Aula']['nu_aula']);
    $model->piso_aula = strtoupper($_POST['Aula']['str_piso'].$_POST['Aula']['nu_aula']);
if($model->save())
$this->redirect(array('view','id'=>$model->id_aula));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}


public function actionBorrar($id)
{
	Aula::model()->updateByPk($id, array('es_activo' => 0));
    $this->actionAdmin();
}

/**
* Lists all models.
*/
public function actionIndex()
{
$model=new Aula;
$this->render('index',array(
'aula'=>$model,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	//echo "llego aqui";
$model=new Aula('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Aula']))
$model->attributes=$_GET['Aula'];


$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Aula::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='aula-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
