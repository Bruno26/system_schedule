<?php
$this->breadcrumbs=array(
	'Horases',
);

$this->menu=array(
array('label'=>'Create Horas','url'=>array('create')),
array('label'=>'Manage Horas','url'=>array('admin')),
);
?>

<h1>Horases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
