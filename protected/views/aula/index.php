<?php
$this->breadcrumbs=array(
	'Aulas',
);

$this->menu=array(
array('label'=>'Create Aula','url'=>array('create')),
array('label'=>'Manage Aula','url'=>array('admin')),
);
?>

<h1>Aulas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
