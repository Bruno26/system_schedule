<?php 
echo "<br><br><br><br><br>";
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Sección', 'active' => false,'url' => $this->createUrl('/seccion/create')),
        array('label' => 'Administrar Secciones', 'active' => false, 'url' => $this->createUrl('/seccion/admin')),
        array('label' => 'Gestionar Horario', 'active' => false, 'url' => $this->createUrl('index', array('id'=>$seccion->id_seccion))),
        array('label' => 'Horario de clases', 'active' => true),
    ),
        )
);
?>

<h1 align="center"><i>Horario de Clases - <?= $seccion->fkCarrera->descripcion; ?></i></h1><br>

<?php 

$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Horario de clases',
    'content' => $this->renderPartial('_carrera', array('seccion'=>$seccion), true)
        )
);
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Horario de clases',
    'content' => $this->renderPartial('_view', array('html' => $html), true)
        )
);

//
//echo '<div align="center">'.$html.'</div>';
//
//$html.='carrera: ' . $carrera->carrera;
//$html.='trayecto: ' . str_replace('-', '', $carrera->trayecto);
//$html.='seccion: ' . $carrera->seccion;

?>
