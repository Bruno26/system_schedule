<?php
$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->id_aula=>array('view','id'=>$model->id_aula),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Aula','url'=>array('index')),
	array('label'=>'Create Aula','url'=>array('create')),
	array('label'=>'View Aula','url'=>array('view','id'=>$model->id_aula)),
	array('label'=>'Manage Aula','url'=>array('admin')),
	);
	?>

	<h1>Update Aula <?php echo $model->id_aula; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>