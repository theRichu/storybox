<?php

class RoomController extends GxController {

public function filters() {
	return array(
			'accessControl', 
	    'placeContext + create', //check to ensure valid project context
			);
}



public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
	/* 	$this->render('view', array(
			'model' => $this->loadModel($id, 'Room'),
		)); */
		
		
		$roomOptionDataProvider=new CActiveDataProvider('RoomOption',array(
		    'criteria'=>array(
		      'condition'=>'room_id=:roomId',
		      'params'=>array(':roomId'=>$this->loadModel($id,'Room')->id),
		    ),
		    'pagination'=>array(
		      'pageSize'=>10,
		    ),
		  ));
		$roomChargeDataProvider=new CActiveDataProvider('RoomCharge',array(
		  'criteria'=>array(
		    'condition'=>'room_id=:roomId',
		    'params'=>array(':roomId'=>$this->loadModel($id,'Room')->id),
		  ),
		  'pagination'=>array(
		    'pageSize'=>10,
		  ),
		));
		$roomImageDataProvider=new CActiveDataProvider('RoomImage',array(
		  'criteria'=>array(
		    'condition'=>'room_id=:roomId',
		    'params'=>array(':roomId'=>$this->loadModel($id,'Room')->id),
		  ),
		  'pagination'=>array(
		    'pageSize'=>10,
		  ),
		));
		
		$this->render('view',array(
		  'model'=>$this->loadModel($id, 'Room'),
		  'roomOptionDataProvider'=>$roomOptionDataProvider,
		  'roomChargeDataProvider'=>$roomChargeDataProvider,
		  'roomImageDataProvider'=>$roomImageDataProvider,
		));
		
	}

	public function actionCreate() {
	   
		$model = new Room;	
		$model->place_id = $this->_place->id;

		$this->performAjaxValidation($model, 'room-form');
		
		if (isset($_POST['Room'])) {
			$model->setAttributes($_POST['Room']);
			fb(isset($_POST['RoomCharge']));
			if (isset($_POST['RoomCharge'])) {
			  $model->roomCharges = $_POST['RoomCharge'];
//			  fb($model->roomCharges);  
			  $model->saveWithRelated('roomCharges');
			}
			
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
			//$roomOptionManager->save($application);
			
		}
		$this->render('create', array(
		 // 'roomOptionManager' => $roomOptionManager, 
		  'model' => $model,
		));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Room');

		$this->performAjaxValidation($model, 'room-form');

		if (isset($_POST['Room'])) {
			$model->setAttributes($_POST['Room']);
			if (isset($_POST['RoomCharge'])) {
			  $model->roomCharges = $_POST['RoomCharge'];
			  fb($model->roomCharges);
			  	
			  $model->saveWithRelated('roomCharges');
			}
			
			//fb($model->getAttributes());
			
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if(isset($_POST['RoomOption'])){
		  foreach($_POST['RoomOption'] as $roomOption)
		  {
		 //   $model_option = $this->loadModel($roomOption->)
		    //do something with $item
		  }
		  
		  $model->setAttributes($_POST['RoomOption']);
		  
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Room')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Room',array(
			
		  'sort'=>array(
                    'defaultOrder'=>'create_time DESC',
                ),
		  'pagination' => array('pageSize' => 6),
		  
		)
		);
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Room('search');
		$model->unsetAttributes();

		if (isset($_GET['Room']))
			$model->setAttributes($_GET['Room']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	
	
	/**
	 * @var private property containing the associated Project model instance.
	 */
	private $_place = null;
	/**
	 * Protected method to load the associated Project model class
	 * @param integer placeId the primary identifier of the associated Place
	 * @return object the Place data model based on the primary key
	 */
	protected function loadPlace($placeId)
	{
	  //if the project property is null, create it based on input id
	  if($this->_place===null)
	  {
	    $this->_place=Place::model()->findByPk($placeId);
	
	    if($this->_place===null)
	    {
	      throw new CHttpException(404,'The requested place does not exist.');
	    }
	  }
	    return $this->_place;
	 }
	    /**
	     * In-class defined filter method, configured for use in the above filters()
	     * method. It is called before the actionCreate() action method is run in
	     * order to ensure a proper project context
	     */
	    public function filterPlaceContext($filterChain)
	    {
	      //set the project identifier based on GET input request variables
	      if(isset($_GET['pid']))
	        $this->loadPlace($_GET['pid']);
	      else
	        throw new CHttpException(403,'Must specify a place before performing this action.');
	      //complete the running of other filters and execute the requested action
	      $filterChain->run();
	    }	     
}