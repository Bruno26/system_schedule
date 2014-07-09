<?php
$this->breadcrumbs = array(
    'Aulas' => array('index'),
    $model->id_aula,
);

$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aula', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Aula', 'active' => false, 'url' => $this->createUrl('admin')),
        array('label' => 'Ver Aula', 'active' => true, 'url' => $this->createUrl('view')),
        array('label' => 'Modificar Aula', 'url' => array('update', 'id' => $model->id_aula)),
    ),
        )
);
?>

<h1 align='center'>Aula <?php echo $model->str_piso . $model->nu_aula; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'str_piso',
        'nu_aula',
    ),
));
?>
<div style="margin-bottom:50px"></div>
