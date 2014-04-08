<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
  array('label'=>Yii::t('app', 'Add Charge') . ' ' . $model->label(), 'url'=>array('roomCharge/create','pid'=>$model->id)),
  array('label'=>Yii::t('app', 'Add Option') . ' ' . $model->label(), 'url'=>array('roomOption/create','pid'=>$model->id)),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'person',
array(
			'name' => 'place',
			'type' => 'raw',
			'value' => $model->place !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->place)), array('place/view', 'id' => GxActiveRecord::extractPkValue($model->place, true))) : null,
			),
'area',
'areatype',
'contactnumber',
'workstart',
'workto',
	),
)); ?>

<br />
<h1>Room Charges</h1>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$roomChargeDataProvider,
'itemView'=>'/roomCharge/_view',
)); ?>

<br />
<h1>Room Options</h1>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$roomOptionDataProvider,
'itemView'=>'/roomOption/_view',
)); ?>
