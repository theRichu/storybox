<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'place-form',
	'enableAjaxValidation' => true,
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
		<?php echo $form->labelEx($model,'address'); ?>
		<?php 
		$this->widget('ext.RGmapPicker.RGmapPicker',
                array(
                    'title' => 'Address',
                    'element_id' => 'Place',
                    'map_width' => 670,
                    'map_height' => 300,
                    'map_latitude' => '37.54', # Your default position
                    'map_longitude' => '126.96', # Your default position
                    'map_location_name' => '대한민국 서울특별시 용산구',
                )
            );
    ?>
		<?php echo $form->error($model,'address'); ?>
   <?php /* echo $form->textField($model, 'address', array('maxlength' => 255)); */ ?> 
		</div><!-- row -->
 		
 		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('tblUsers')); ?></label>
		<?php echo $form->checkBoxList($model, 'tblUsers', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->