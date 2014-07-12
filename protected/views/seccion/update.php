<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Regista', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Ver', 'url' => array('view', 'id' => $model->id_seccion)),
        array('label' => 'Actualizar', 'active' => true),
        array('label' => 'Administrar Sección', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<h1 align="center"><i>Actualizar Sección</i></h1><br>
<?php
if (isset($error)) {
    Yii::app()->user->setFlash('error', '<strong>Error</strong> Ya se registro esta sección.');
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
    'title' => 'Actualizar Sección',
    'content' => $this->renderPartial('_form', array('model' => $model), true)
        )
);
?>