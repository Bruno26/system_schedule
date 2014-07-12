<?php
$this->breadcrumbs=array(
	'Aulas',
);
?>
<div class="row-fluid">  
   <div class="span12">
<?php $this->widget(
    'bootstrap.widgets.TbBox',
    array(
    'title' => 'Listado de Aulas',
    'content' => $this->renderPartial('_view', array('model'=>$aula), TRUE),
    )
);?>
</div>
</div>
