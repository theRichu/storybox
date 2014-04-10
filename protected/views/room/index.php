<?php

$this->breadcrumbs = array(
	Room::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Room::label() . ' ' . Yii::t('app', '등록하기') , 'url' => array('create')),
	array('label'=>Room::label(2) . ' ' . Yii::t('app', '관리하기') , 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Room::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 