<?php
$this->breadcrumbs=array(
	'Materias'=>array('index'),
	$model->id_materia,
);

$this->menu=array(
array('label'=>'List Materia','url'=>array('index')),
array('label'=>'Create Materia','url'=>array('create')),
array('label'=>'Update Materia','url'=>array('update','id'=>$model->id_materia)),
array('label'=>'Delete Materia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_materia),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Materia','url'=>array('admin')),
);
?>

<h1>View Materia #<?php echo $model->id_materia; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_materia',
		'fk_seccion',
		'str_materia',
		'str_corto_materia',
),
)); ?>
