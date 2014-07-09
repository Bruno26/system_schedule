<?php
$this->breadcrumbs=array(
	'Horases'=>array('index'),
	$model->id_hora=>array('view','id'=>$model->id_hora),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Horas','url'=>array('index')),
	array('label'=>'Create Horas','url'=>array('create')),
	array('label'=>'View Horas','url'=>array('view','id'=>$model->id_hora)),
	array('label'=>'Manage Horas','url'=>array('admin')),
	);
	?>

	<h1>Update Horas <?php echo $model->id_hora; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>