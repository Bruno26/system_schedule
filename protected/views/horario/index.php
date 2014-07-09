<?php
$this->breadcrumbs=array(
	'Horarios',
);

$this->menu=array(
array('label'=>'Create Horario','url'=>array('create')),
array('label'=>'Manage Horario','url'=>array('admin')),
);
?>

<h1>Horarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
