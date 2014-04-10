<?php

$this->breadcrumbs = array(
	Place::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Place::label(). ' ' . Yii::t('app', '등록하기'), 'url' => array('create')),
	array('label'=>Place::label(2). ' ' .  Yii::t('app', '관리하기'), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Place::label()); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 