<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registra', 'active' => true, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Materias', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<h1 align="center"><i>Asignar Materias</i></h1><br>

<?php

if (isset($error)) {
    Yii::app()->user->setFlash('error', '<strong>Error</strong> La Carrera ya tiene asignada esta materia.');
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => 'x', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        ),
    ));
}

$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Registro de Materia',
    'content' => $this->renderPartial('_form', array('model' => $model), true)
        )
);
?>