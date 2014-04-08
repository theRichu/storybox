<?php
/* @var $this RoomOptionController */
/* @var $model RoomOption */

$this->breadcrumbs=array(
	'Room Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomOption', 'url'=>array('index')),
	array('label'=>'Create RoomOption', 'url'=>array('create')),
	array('label'=>'View RoomOption', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomOption', 'url'=>array('admin')),
);
?>

<h1>Update RoomOption <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>