<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_materi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_materi),array('view','id'=>$data->id_materi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_materi')); ?>:</b>
	<?php echo CHtml::encode($data->nama_materi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>