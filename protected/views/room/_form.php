<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'room-form',
	'enableAjaxValidation' => true,
  'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
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
		<?php echo $form->labelEx($model,'person'); ?>
		<?php echo $form->textField($model, 'person'); ?>
		<?php echo $form->error($model,'person'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model, 'area'); ?>
		<?php echo $form->error($model,'area'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'areatype'); ?>
		<?php echo $form->textField($model, 'areatype'); ?>
		<?php echo $form->error($model,'areatype'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'contactnumber'); ?>
		<?php echo $form->textField($model, 'contactnumber', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'contactnumber'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'workstart'); ?>
		<?php echo $form->textField($model, 'workstart'); ?>
		<?php echo $form->error($model,'workstart'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'workto'); ?>
		<?php echo $form->textField($model, 'workto'); ?>
		<?php echo $form->error($model,'workto'); ?>
		</div><!-- row -->


		<label><?php echo GxHtml::encode($model->getRelationLabel('roomCharges')); ?></label>
		<?php echo $form->checkBoxList($model, 'roomCharges', GxHtml::encodeEx(GxHtml::listDataEx(RoomCharge::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('roomOptions')); ?></label>
		<?php echo $form->checkBoxList($model, 'roomOptions', GxHtml::encodeEx(GxHtml::listDataEx(RoomOption::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->