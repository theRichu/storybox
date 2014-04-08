<?php
/* @var $this RoomOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Options',
);

$this->menu=array(
	array('label'=>'Create RoomOption', 'url'=>array('create')),
	array('label'=>'Manage RoomOption', 'url'=>array('admin')),
);
?>

<h1>Room Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
