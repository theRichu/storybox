<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('roomImage/view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('caption')); ?>:
	<?php echo GxHtml::encode($data->caption); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('content')); ?>:
	<?php echo GxHtml::encode($data->content); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('filename')); ?>:
	<?php echo GxHtml::encode($data->filename); ?>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/upload/room/'.$data->filename,"filename",array("width"=>200)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('room_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->room)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
	<?php echo GxHtml::encode($data->create_user_id); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_user_id')); ?>:
	<?php echo GxHtml::encode($data->update_user_id); ?>
	<br />

</div>