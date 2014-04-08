<?php
/* @var $this RoomChargeController */
/* @var $model RoomCharge */

$this->breadcrumbs=array(
	'Room Charges'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomCharge', 'url'=>array('index')),
	array('label'=>'Create RoomCharge', 'url'=>array('create')),
	array('label'=>'Update RoomCharge', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomCharge', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomCharge', 'url'=>array('admin')),
);
?>

<h1>View RoomCharge #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'price',
		'description',
	),
)); ?>
