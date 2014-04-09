<?php

class RoomImageController extends GxController {

public function filters() {
	return array(
			'accessControl', 
	    'roomContext + create', //check to ensure valid project context
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
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RoomImage'),
		));
	}

	public function actionCreate() {
		$model = new RoomImage;

		$this->performAjaxValidation($model, 'room-image-form');

		if (isset($_POST['RoomImage'])) {
		  $model->room_id = $this->_room->id;
		  
		  $rnd = $random = date(time());
			$model->setAttributes($_POST['RoomImage']);
			
			$uploadedFile=CUploadedFile::getInstance($model,'filename');
						
			$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
			$model->filename = $fileName;
			
			if ($model->save()) {
			  $uploadedFile->saveAs(Yii::app()->basePath.'/../upload/room/'.$fileName);  // image will uplode to rootDirectory/banner/
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'RoomImage');

		$this->performAjaxValidation($model, 'room-image-form');

		if (isset($_POST['RoomImage'])) {
			$model->setAttributes($_POST['RoomImage']);

			$uploadedFile=CUploadedFile::getInstance($model,'filename');
			if ($model->save()) {
			  if(!empty($uploadedFile))  // check if uploaded file is set or not
			  {
			    $uploadedFile->saveAs(Yii::app()->basePath.'/../upload/room/'.$model->image);
			  }
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'RoomImage')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('RoomImage');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	/**
	 * @var private property containing the associated Project model instance.
	 */
	private $_room = null;
	/**
	 * Protected method to load the associated Project model class
	 * @param integer placeId the primary identifier of the associated Place
	 * @return object the Place data model based on the primary key
	 */
	protected function loadRoom($roomId)
	{
	  //if the project property is null, create it based on input id
	  if($this->_room===null)
	  {
	    $this->_room=Room::model()->findByPk($roomId);
	
	    if($this->_room===null)
	    {
	      throw new CHttpException(404,'The requested room does not exist.');
	    }
	  }
	  return $this->_room;
	}
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper project context
	 */
	public function filterRoomContext($filterChain)
	{
	  //set the project identifier based on GET input request variables
	  if(isset($_GET['pid']))
	    $this->loadRoom($_GET['pid']);
	  else
	    throw new CHttpException(403,'Must specify a room before performing this action.');
	  //complete the running of other filters and execute the requested action
	  $filterChain->run();
	}
	
	public function actionAdmin() {
		$model = new RoomImage('search');
		$model->unsetAttributes();

		if (isset($_GET['RoomImage']))
			$model->setAttributes($_GET['RoomImage']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}