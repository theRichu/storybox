<?php
/*@var $roomOptionManager StudentManager */
/*@var $form CActiveForm */
/*@var $this ApplicationController */
?>

<script type="text/javascript">
    // initializiation of counters for new elements
    var lastRoomOption=<?php echo $roomOptionManager->lastNew ?>;

    // the subviews rendered with placeholders
    var trRoomOption=new String(<?php echo CJSON::encode($this->renderPartial('_formRoomOptionDetail', array('id' => 'idRep', 'model' => new RoomOption, 'form' => $form, 'this' => $this), true, false)); ?>);


    function addRoomOption(button)
    {
        lastRoomOption++;
        button.parents('table').children('tbody').append(trRoomOption.replace(/idRep/g,'n'+lastRoomOption));
    }


    function deleteRoomOption(button)
    {
        button.parents('tr').detach();
    }

</script>