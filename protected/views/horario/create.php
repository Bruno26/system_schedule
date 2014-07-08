<?php
$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Horario','url'=>array('index')),
array('label'=>'Manage Horario','url'=>array('admin')),
);
?>

<h1>Create Horario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>