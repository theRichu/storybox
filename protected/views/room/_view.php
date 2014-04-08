<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('person')); ?>:
	<?php echo GxHtml::encode($data->person); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('place_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->place)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('area')); ?>:
	<?php echo GxHtml::encode($data->area); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('areatype')); ?>:
	<?php echo GxHtml::encode($data->areatype); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('contactnumber')); ?>:
	<?php echo GxHtml::encode($data->contactnumber); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('workstart')); ?>:
	<?php echo GxHtml::encode($data->workstart); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('workto')); ?>:
	<?php echo GxHtml::encode($data->workto); ?>
	<br />
	*/ ?>

</div>