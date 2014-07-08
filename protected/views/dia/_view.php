<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_dia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dia),array('view','id'=>$data->id_dia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_dia')); ?>:</b>
	<?php echo CHtml::encode($data->str_dia); ?>
	<br />


</div>