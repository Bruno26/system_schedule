<?php
$this->breadcrumbs=array(
	'Horases'=>array('index'),
	$model->id_hora,
);

$this->menu=array(
array('label'=>'List Horas','url'=>array('index')),
array('label'=>'Create Horas','url'=>array('create')),
array('label'=>'Update Horas','url'=>array('update','id'=>$model->id_hora)),
array('label'=>'Delete Horas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_hora),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Horas','url'=>array('admin')),
);
?>

<h1>View Horas #<?php echo $model->id_hora; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_hora',
		'str_hora',
),
)); ?>
