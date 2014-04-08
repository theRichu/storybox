<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
  array('label'=>Yii::t('app', 'Add Room') . ' ' . $model->label(), 'url'=>array('room/create','pid'=>$model->id)),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'address',
'description',
'create_time',
'create_user_id',
'update_time',
'update_user_id',
'map_lat',
'map_lag',
	),
)); ?>
<?php 
if(($model->map_lat) && ($model->map_lag)){
  Yii::import('ext.EGMAP.*');
  
  $gMap = new EGMap();
  $gMap->setJsName('test_map');
  $gMap->width = '100%';
  $gMap->height = 300;
  $gMap->zoom = 13;
  $gMap->setCenter($model->map_lag, $model->map_lat);
  
  $info_box = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">'.$model->name.'<br/>'.$model->address.'</div>');
  
  // set the properties
  $info_box->pixelOffset = new EGMapSize('0','-140');
  $info_box->maxWidth = 0;
  $info_box->boxStyle = array(
    'width'=>'"280px"',
    'height'=>'"120px"',
    'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
  );
  $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
  $info_box->infoBoxClearance = new EGMapSize(1,1);
  $info_box->enableEventPropagation ='"floatPane"';
  
  // with the second info box, we don't need to
  // set its properties as we are sharing a global
  // Create marker
  $marker = new EGMapMarker($model->map_lag, $model->map_lat, array('title' => $model->name));
  $marker->addHtmlInfoBox($info_box);
  
  $gMap->addMarker($marker);
  
  $gMap->renderMap();
}
?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('rooms')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->rooms as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('room/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('tblUsers')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->tblUsers as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('user/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>