<?php
$this->breadcrumbs=array(
	'Dias',
);

$this->menu=array(
array('label'=>'Create Dia','url'=>array('create')),
array('label'=>'Manage Dia','url'=>array('admin')),
);
?>

<h1>Dias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
