<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'person'); ?>
		<?php echo $form->textField($model, 'person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'place_id'); ?>
		<?php echo $form->dropDownList($model, 'place_id', GxHtml::listDataEx(Place::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'area'); ?>
		<?php echo $form->textField($model, 'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'areatype'); ?>
		<?php echo $form->textField($model, 'areatype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'contactnumber'); ?>
		<?php echo $form->textField($model, 'contactnumber', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'workstart'); ?>
		<?php echo $form->textField($model, 'workstart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'workto'); ?>
		<?php echo $form->textField($model, 'workto'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
