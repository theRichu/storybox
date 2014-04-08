<?php
/* @var $this RoomOptionController */
/* @var $model RoomOption */

$this->breadcrumbs=array(
	'Room Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomOption', 'url'=>array('index')),
	array('label'=>'Manage RoomOption', 'url'=>array('admin')),
);
?>

<h1>Create RoomOption</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>