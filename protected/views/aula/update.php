<?php
//$this->breadcrumbs = array(
//    'Registrar',
//);

$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aulas', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Ver Aulas Registradas', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

	<h1>Actualizar Aula: <?php echo $model->nu_aula; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
