<?php
$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	$model->id_seccion=>array('view','id'=>$model->id_seccion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Seccion','url'=>array('index')),
	array('label'=>'Create Seccion','url'=>array('create')),
	array('label'=>'View Seccion','url'=>array('view','id'=>$model->id_seccion)),
	array('label'=>'Manage Seccion','url'=>array('admin')),
	);
	?>

	<h1>Update Seccion <?php echo $model->id_seccion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>