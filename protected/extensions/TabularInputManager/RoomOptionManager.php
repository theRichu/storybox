<?php 
yii::import('application.extensions.TabularInputManager.TabularInputManager');

class RoomOptionManager extends TabularInputManager
{
  
    protected $class='RoomOption';

    /**
     * Retrieve the list of Students
     * @return array of Student objects
     */
    public function getItems()
    {
        if (is_array($this->_items))
            return $this->_items;
        else {
            return array(
                'n0' => new RoomOption,
            );
        }
    }

    /**
     * Deletes the uneeded Students
     * @param $model ClassRoom - the parent model
     * @param $itemsPk array - an array of the primary keys of the child models which we want to keep
     */
    public function deleteOldItems($model, $itemsPk) {
        $criteria = new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        //Student has a attribute classroom_id: indicates which classroom s/he is in.
        $criteria->addCondition("room_id = {$model->primaryKey}");

        Student::model()->deleteAll($criteria);
    }


    /**
     * Create a new TabularInputManager and loads the current child items
     * @param $model ClassRoom - the parent model
     * @return TabularInputManager the newly created TabularInputManager object
     */
    public static function load($model) {
        $return = new RoomOptionManager;
        foreach($model->RoomOptions as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }

    /**
     * Set the unsafe attributes for the child items, usually the primary key of the parent model
     * @param $item Student - the child item
     * @param $model ClassRoom - the parent model
     */
    public function setUnsafeAttribute($item, $model) {
        $item->room_id = $model->primaryKey;
    }
}

?>