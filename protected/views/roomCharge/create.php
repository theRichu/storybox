<?php
/* @var $this RoomChargeController */
/* @var $model RoomCharge */

$this->breadcrumbs=array(
	'Room Charges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomCharge', 'url'=>array('index')),
	array('label'=>'Manage RoomCharge', 'url'=>array('admin')),
);
?>

<h1>Create RoomCharge</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>