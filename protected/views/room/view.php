<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
  array('label'=>Yii::t('app', 'Add Image') . ' ' . $model->label(), 'url'=>array('roomImage/create','pid'=>$model->id)),
  array('label'=>Yii::t('app', 'Add Charge') . ' ' . $model->label(), 'url'=>array('roomCharge/create','pid'=>$model->id)),
  array('label'=>Yii::t('app', 'Add Option') . ' ' . $model->label(), 'url'=>array('roomOption/create','pid'=>$model->id)),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>
<br />
<h1>Room Images</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$roomImageDataProvider,
    'itemView'=>'/roomImage/_view',
)); ?>
<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
  'id',
  'name',
  'person',
  array(
  			'name' => 'place',
  			'type' => 'raw',
  			'value' => $model->place !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->place)), array('place/view', 'id' => GxActiveRecord::extractPkValue($model->place, true))) : null,
  			),
  'area',
  'areatype',
  'contactnumber',
  'workstart',
  'workto',
  	),
)); ?>

<br />
<h1>Room Charges</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>$roomChargeDataProvider
  , 'columns'=>array(
    'price'
    , 'description'
    , array(
      'class'=>'CButtonColumn'
      , 'viewButtonUrl'=>'Yii::app()->createUrl("/roomCharge/view", array("id"=>$data["id"]))'
      , 'updateButtonUrl'=>'Yii::app()->createUrl("/roomCharge/update", array("id"=>$data["id"]))'
      , 'deleteButtonUrl'=>'Yii::app()->createUrl("/roomCharge/delete", array("id"=>$data["id"]))'
    )
  )
//'itemView'=>'/roomCharge/_view',
)); ?>

<?php /*

$this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => 'Create',
        'type' => 'primary',
        'url'=>'#',
        'htmlOptions'=>array(
        'data-toggle' => 'modal',
        'data-target' => '#CView',
        'onclick'=>"{ CUrl='".Yii::app()->createUrl('roomCharge/create')."'; CHeader='Add new client'; CViewForm(); return false; }"
        ),
    )
);?>
<?php 
$this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'CView')); 
?>
<div>
<a data-dismiss="modal">&times;</a>
<h4 id="content_header"></h4>
</div>

<div>
</div>    
<?php $this->endWidget(); ?>

<script type="text/javascript">
var CUrl;
function CViewForm()
{
$('#content_header').html(CHeader);

    <?php echo CHtml::ajax(array(
      'url'=>  "js:CUrl",
      'data'=> "js:$(this).serialize()",
      'type'=>'post',
      'dataType'=>'json',
      'success'=>"function(data)
      {
          if (data.status == 'failure')
          {
              $('#CView div.modal-body').html(data.div);
              $('#CView div.modal-body form').submit(CViewForm);
          }
          else
          {
             $('#CView div.modal-body').html(data.div);
             setTimeout(\"$('#CView').modal('hide') \",2000);
             $.fn.yiiGridView.update('client-grid');
          }

      } ",
      ))?>;
    return false;
}
</script>


*/?>
<br />
<h1>Room Options</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$roomOptionDataProvider,
    'itemView'=>'/roomOption/_view',
)); ?>


