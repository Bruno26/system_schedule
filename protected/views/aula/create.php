<?php
$this->breadcrumbs = array(
    'Aulas' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Aula', 'url' => array('index')),
    array('label' => 'Manage Aula', 'url' => array('admin')),
);
?>

<h1>Create Aula</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>