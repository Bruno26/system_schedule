<?php
$this->breadcrumbs=array(
	'Horases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Horas','url'=>array('index')),
array('label'=>'Manage Horas','url'=>array('admin')),
);
?>

<h1>Create Horas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>