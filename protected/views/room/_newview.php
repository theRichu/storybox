<div class="view">


	<?php 
$images = array();
foreach($data->roomImages as $record) {
  $images[] = array(
  'image' => Yii::app()->request->baseUrl.'/upload/room/'.$record->filename,
  'label' => $record->caption,
  'caption' => $record->content,
  );
}
if(count($images)){
    $this->widget('bootstrap.widgets.TbCarousel',
    array(
        'id'=>'Mycarouse1',//id of Carousel
        'slide'=>array(true,2000),//to slide after 2seconds   
        'items'=>$images,
    ));
}
?>
<div>
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->name) , array('room/view', 'id' => $data->id));?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('person')); ?>:
	<?php echo GxHtml::encode($data->person); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('place_id')); ?>:
	<?php echo GxHtml::encode(GxHtml::valueEx($data->place)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('area')); ?>:
	<?php echo GxHtml::encode($data->area); ?>
	<?php echo GxHtml::encode($data->areatype); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('contactnumber')); ?>:
	<?php echo GxHtml::encode($data->contactnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('workstart')); ?>:
	<?php echo GxHtml::encode($data->workstart); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('workto')); ?>:
	<?php echo GxHtml::encode($data->workto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
	<?php echo isset($data->create_user_id)?CHtml::encode($data->creater->name):"unknown"	?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_user_id')); ?>:
	<?php echo isset($data->update_user_id)?CHtml::encode($data->updater->name):"unknown"	?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
</div>
<div>
<?php 
$this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => '예약하기',
        'type' => 'primary',
        'htmlOptions' => array(
            'onclick' => 'js:bootbox.alert("준비중")'
        ),
    )
);
?>
</div>
	

	
		

</div>