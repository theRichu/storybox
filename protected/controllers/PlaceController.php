<?php

class PlaceController extends GxController {

public function filters() {
	return array(
			'accessControl', 
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
			'model' => $this->loadModel($id, 'Place'),
		));
	}

	public function actionCreate() {
		$model = new Place;

		$this->performAjaxValidation($model, 'place-form');

		if (isset($_POST['Place'])) {
			$model->setAttributes($_POST['Place']);
			$relatedData = array(
				'tblUsers' => $_POST['Place']['tblUsers'] === '' ? null : $_POST['Place']['tblUsers'],
				);

			Yii::import('application.extensions.navergeocode.NaverGeocode');
			$geocode = new NaverGeocode;
			$result=$geocode->getGeocode($model->address);
			$model->map_lat=$result->item->point->x;
			$model->map_lag=$result->item->point->y;
			
			
			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Place');

		$this->performAjaxValidation($model, 'place-form');

		if (isset($_POST['Place'])) {
			$model->setAttributes($_POST['Place']);
			$relatedData = array(
				'tblUsers' => $_POST['Place']['tblUsers'] === '' ? null : $_POST['Place']['tblUsers'],
				);
			
			Yii::import('application.extensions.navergeocode.NaverGeocode');
			$geocode = new NaverGeocode;
			$result=$geocode->getGeocode($model->address);
			$model->map_lat=$result->item->point->x;
			$model->map_lag=$result->item->point->y;
			
			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Place')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Place' ,array(
    'criteria'=>array(
        'order'=>'create_time DESC',
    ),
    ));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Place('search');
		$model->unsetAttributes();

		if (isset($_GET['Place']))
			$model->setAttributes($_GET['Place']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}