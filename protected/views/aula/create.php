<?php
//$this->breadcrumbs = array(
//    'Registrar',
//);
echo "<br><br><br><br><br>";
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aulas', 'active' => true, 'url' => $this->createUrl('create')),
        array('label' => 'Ver Aulas Registradas', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>
<?php
if (isset($error)) {
    Yii::app()->user->setFlash('error', '<strong>Error</strong> Ya existe un aula registrada con esos datos!!.');
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => 'x', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        ),
    ));
}
?>
<h1>Registrar Aula</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
