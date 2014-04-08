<?php
/* @var $this RoomChargeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Charges',
);

$this->menu=array(
	array('label'=>'Create RoomCharge', 'url'=>array('create')),
	array('label'=>'Manage RoomCharge', 'url'=>array('admin')),
);
?>

<h1>Room Charges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
