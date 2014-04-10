<td>
	<?php echo CHtml::activeDropDownList($model,"[$index]option_id", GxHtml::listDataEx(Option::model()->findAllAttributes(null, true))); ?>
	<?php echo CHtml::error($model,"[$index]option_id"); ?>
</td>
<td>
	<?php echo CHtml::activeTextField($model,"[$index]price"); ?>
	<?php echo CHtml::error($model,"[$index]price"); ?>
</td>
<td>
	<?php $this->widget('ext.widgets.autocomplete.XJuiAutoComplete', array(
		'model'=>$model,
		'attribute'=>"[$index]description",
		'source'=>$this->createUrl('request/create'),

	)); ?>
	<?php echo CHtml::error($model,"[$index]description"); ?>
</td>
