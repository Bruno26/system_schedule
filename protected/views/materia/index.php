<?php
$this->breadcrumbs=array(
	'Materias',
);

$this->menu=array(
array('label'=>'Create Materia','url'=>array('create')),
array('label'=>'Manage Materia','url'=>array('admin')),
);
?>

<h1>Materias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
