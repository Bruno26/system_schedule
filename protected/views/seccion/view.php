<?php
$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	$model->id_seccion,
);

$this->menu=array(
array('label'=>'List Seccion','url'=>array('index')),
array('label'=>'Create Seccion','url'=>array('create')),
array('label'=>'Update Seccion','url'=>array('update','id'=>$model->id_seccion)),
array('label'=>'Delete Seccion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_seccion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Seccion','url'=>array('admin')),
);
?>

<h1>View Seccion #<?php echo $model->id_seccion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_seccion',
		'fk_carrera',
		'fk_trayecto',
		'fk_trimestre',
		'nu_seccion',
),
)); ?>
