<?php
$this->breadcrumbs=array(
	'Aula Horas'=>array('index'),
	$model->id_aula_hora=>array('view','id'=>$model->id_aula_hora),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AulaHora','url'=>array('index')),
	array('label'=>'Create AulaHora','url'=>array('create')),
	array('label'=>'View AulaHora','url'=>array('view','id'=>$model->id_aula_hora)),
	array('label'=>'Manage AulaHora','url'=>array('admin')),
	);
	?>

	<h1>Update AulaHora <?php echo $model->id_aula_hora; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>