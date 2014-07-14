<?php
echo "<br><br><br><br><br>";
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Sección', 'active' => false, 'url' => $this->createUrl('/seccion/create')),
        array('label' => 'Administrar Secciones', 'active' => false, 'url' => $this->createUrl('/seccion/admin')),
        array('label' => 'Gestionar Horario', 'active' => true),
        array('label' => 'Ver Horario', 'active' => false, 'url' => $this->createUrl('/horario/view', array('id'=>$seccion->id_seccion))),
    ),
        )
);
?>

<h1 align="center"><i>Gestionar Horario</i></h1><br>

<?php
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Carrera',
    'content' => $this->renderPartial('_carrera', array('seccion' => $seccion), true)
        )
);
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Agregar Horario',
    'content' => $this->renderPartial('_form', array('model' => $model,'seccion' => $seccion), true)
        )
);
?>
