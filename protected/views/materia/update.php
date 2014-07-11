<?php
$this->breadcrumbs=array(
	'Materias'=>array('index'),
	$model->id_materia=>array('view','id'=>$model->id_materia),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Materia','url'=>array('index')),
	array('label'=>'Create Materia','url'=>array('create')),
	array('label'=>'View Materia','url'=>array('view','id'=>$model->id_materia)),
	array('label'=>'Manage Materia','url'=>array('admin')),
	);
	?>

	<h1>Update Materia <?php echo $model->id_materia; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>