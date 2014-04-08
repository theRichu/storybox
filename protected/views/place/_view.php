<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address')); ?>:
	<?php echo GxHtml::encode($data->address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
	<?php echo isset($data->create_user_id)?CHtml::encode($data->creater->username):"unknown"	?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_user_id')); ?>:
	<?php echo isset($data->update_user_id)?CHtml::encode($data->updater->username):"unknown"	?>
	<br />	
	<?php echo GxHtml::encode($data->getAttributeLabel('map_lat')); ?>:
	<?php echo GxHtml::encode($data->map_lat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('map_lag')); ?>:
	<?php echo GxHtml::encode($data->map_lag); ?>
	<br />

</div>