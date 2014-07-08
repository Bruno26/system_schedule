<?php
$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->id_aula,
);

$this->menu=array(
array('label'=>'List Aula','url'=>array('index')),
array('label'=>'Create Aula','url'=>array('create')),
array('label'=>'Update Aula','url'=>array('update','id'=>$model->id_aula)),
array('label'=>'Delete Aula','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aula),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Aula','url'=>array('admin')),
);
?>

<h1>View Aula #<?php echo $model->id_aula; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_aula',
		'str_piso',
		'nu_aula',
),
)); ?>
