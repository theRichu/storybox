<?php

class UserController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete', 'index'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'User'),
		));
	}

	public function actionCreate() {
		$model = new User;

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);
			$relatedData = array(
				'tblPlaces' => $_POST['User']['tblPlaces'] === '' ? null : $_POST['User']['tblPlaces'],
				);

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
		$model = $this->loadModel($id, 'User');

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);
			$relatedData = array(
				'tblPlaces' => $_POST['User']['tblPlaces'] === '' ? null : $_POST['User']['tblPlaces'],
				);

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
			$this->loadModel($id, 'User')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new User('search');
		$model->unsetAttributes();

		if (isset($_GET['User']))
			$model->setAttributes($_GET['User']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
}