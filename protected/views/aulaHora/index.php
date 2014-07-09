<?php
$this->breadcrumbs = array(
    'Aula Horas',
);

$this->menu = array(
    array('label' => 'Create AulaHora', 'url' => array('create')),
    array('label' => 'Manage AulaHora', 'url' => array('admin')),
);
?>

<h1>Aula Horas</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
