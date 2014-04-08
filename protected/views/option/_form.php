<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'option-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model, 'description', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('roomOptions')); ?></label>
		<?php echo $form->checkBoxList($model, 'roomOptions', GxHtml::encodeEx(GxHtml::listDataEx(RoomOption::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->