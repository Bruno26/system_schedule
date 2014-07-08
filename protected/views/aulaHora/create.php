<?php
$this->breadcrumbs = array(
    'Aula Horas' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List AulaHora', 'url' => array('index')),
    array('label' => 'Manage AulaHora', 'url' => array('admin')),
);
?>

<h1>Create AulaHora</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>