<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'room-image-form',
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
		<?php echo $form->labelEx($model,'caption'); ?>
		<?php echo $form->textField($model, 'caption', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'caption'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		
		
		<div class="row">
        <?php echo $form->labelEx($model,'filename'); ?>
        <?php echo CHtml::activeFileField($model, 'filename'); ?>  
        <?php echo $form->error($model,'filename'); ?>
    </div>
    
    <?php if($model->isNewRecord!='1'){ ?>
    <div class="row">
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/upload/room/'.$model->filename,"filename",array("width"=>200)); ?>
    </div>
		<?php }?>
		<?php /*
		<div class="row">
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php echo $form->dropDownList($model, 'room_id', GxHtml::listDataEx(Room::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'room_id'); ?>
		</div><!-- row -->
*/?>


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->