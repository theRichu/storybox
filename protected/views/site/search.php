<?php 
$this->pageTitle=Yii::app()->name . ' - 검색';
$this->breadcrumbs=array(
  '검색',
);

?>

<label><?php echo GxHtml::encode($model->getRelationLabel('option')); ?></label>
<?php echo $form->checkBoxList($model, 'option', GxHtml::encodeEx(GxHtml::listDataEx(Option::model()->findAllAttributes(null, true)), false, true)); ?>
