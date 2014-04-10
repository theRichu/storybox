<?php
/* @var $id int */
/* @var $model RoomOptionManager */
/* @var $form CActiveForm */
/* @var $this ApplicationController */
?>

<tr>
     <td>
          <?php echo $form->textField($model, "[$id]option_id"); ?>
     </td>
     <td>
          <?php echo $form->textField($model, "[$id]price"); ?>
     </td>
     <td>
          <?php echo $form->textField($model, "[$id]description"); ?>
     </td>
     
     <td>
          <?php echo CHtml::link('Delete', '#', array('onClick' => 'deleteRoomOption($(this));return false;')); ?>
     </td>
</tr>