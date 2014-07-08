<?php
$this->breadcrumbs=array(
	'Dias'=>array('index'),
	$model->id_dia,
);

$this->menu=array(
array('label'=>'List Dia','url'=>array('index')),
array('label'=>'Create Dia','url'=>array('create')),
array('label'=>'Update Dia','url'=>array('update','id'=>$model->id_dia)),
array('label'=>'Delete Dia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dia),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Dia','url'=>array('admin')),
);
?>

<h1>View Dia #<?php echo $model->id_dia; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_dia',
		'str_dia',
),
)); ?>
