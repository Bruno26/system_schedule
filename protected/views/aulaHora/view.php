<?php
$this->breadcrumbs = array(
    'Aula Horas' => array('index'),
    $model->id_aula_hora,
);

$this->menu = array(
    array('label' => 'List AulaHora', 'url' => array('index')),
    array('label' => 'Create AulaHora', 'url' => array('create')),
    array('label' => 'Update AulaHora', 'url' => array('update', 'id' => $model->id_aula_hora)),
    array('label' => 'Delete AulaHora', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_aula_hora), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage AulaHora', 'url' => array('admin')),
);
?>

<h1>View AulaHora #<?php echo $model->id_aula_hora; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_aula_hora',
        'fk_dia',
        'fk_aula',
        'fk_hora',
        'es_activo',
    ),
));
?>
