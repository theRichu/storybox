<?php
/* @var $this RoomOptionController */
/* @var $model RoomOption */

$this->breadcrumbs=array(
	'Room Options'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomOption', 'url'=>array('index')),
	array('label'=>'Create RoomOption', 'url'=>array('create')),
	array('label'=>'Update RoomOption', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomOption', 'url'=>array('admin')),
);
?>

<h1>View RoomOption #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'description',
		'price',
		'option_id',
	),
)); ?>
