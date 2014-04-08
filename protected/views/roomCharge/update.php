<?php
/* @var $this RoomChargeController */
/* @var $model RoomCharge */

$this->breadcrumbs=array(
	'Room Charges'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomCharge', 'url'=>array('index')),
	array('label'=>'Create RoomCharge', 'url'=>array('create')),
	array('label'=>'View RoomCharge', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomCharge', 'url'=>array('admin')),
);
?>

<h1>Update RoomCharge <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>