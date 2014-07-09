<?php
$this->breadcrumbs = array(
    'Aulas' => array('index'),
    $model->id_aula => array('view', 'id' => $model->id_aula),
    'Update',
);

$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aula', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Aula', 'active' => false, 'url' => $this->createUrl('admin')),
        array('label' => 'Ver Aula', 'active' => false, 'url' => $this->createUrl('view',array('id' => $model->id_aula))),
        array('label' => 'Modificar Aula', 'active' => true,'url' => array('update', 'id' => $model->id_aula)),
    ),
        )
);
?>
<h1 align='center'>Actualizar Aula <?php echo $model->str_piso . $model->nu_aula; ?></h1><br>



<?php
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Actualización de Aula',
    'headerIcon' => 'icon-user',
    'content' => $this->renderPartial('_form', array('model' => $model), TRUE),
        )
);
?>