<div class="view">
<?php 
if(($data->map_lat) && ($data->map_lag)){
  Yii::import('ext.EGMAP.*');
  
  $gMap = new EGMap();
  $gMap->setJsName('test_map');
  $gMap->width = '200';
  $gMap->height = '200';
  $gMap->zoom = 13;
  $gMap->setCenter($data->map_lat, $data->map_lag);
  
  $info_box = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">'.$data->name.'<br/>'.$data->address.'</div>');
  
  // set the properties
  $info_box->pixelOffset = new EGMapSize('0','-140');
  $info_box->maxWidth = 0;
  $info_box->boxStyle = array(
    'width'=>'"280px"',
    'height'=>'"120px"',
    'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
  );
  $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
  $info_box->infoBoxClearance = new EGMapSize(1,1);
  $info_box->enableEventPropagation ='"floatPane"';
  
  // with the second info box, we don't need to
  // set its properties as we are sharing a global
  // Create marker
  $marker = new EGMapMarker($data->map_lat, $data->map_lag, array('title' => $data->name));
  $marker->addHtmlInfoBox($info_box);
  
  $gMap->addMarker($marker);
  
  $gMap->renderMap();
}
?>
	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address')); ?>:
	<?php echo GxHtml::encode($data->address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
	<?php echo GxHtml::encode($data->create_user_id);	?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_user_id')); ?>:
	<?php echo GxHtml::encode($data->update_user_id);	?>
	<br />	
	<?php echo GxHtml::encode($data->getAttributeLabel('map_lat')); ?>:
	<?php echo GxHtml::encode($data->map_lat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('map_lag')); ?>:
	<?php echo GxHtml::encode($data->map_lag); ?>
	<br />

</div>