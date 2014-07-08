<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_hora')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_hora),array('view','id'=>$data->id_hora)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_hora')); ?>:</b>
	<?php echo CHtml::encode($data->str_hora); ?>
	<br />


</div>