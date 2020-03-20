<?php
/**
 * ContactAction class
 * 
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2019 OMMU (www.ommu.id)
 * @created date 9 September 2019, 20:05 WIB
 * @link https://github.com/ommu/theme-arnica
 */

namespace themes\arnica\actions;

use Yii;
use ommu\support\models\SupportFeedbacks;

class ContactAction extends \yii\base\Action
{
	/**
	 * {@inheritdoc}
	 */
	public $view;

	/**
	 * {@inheritdoc}
	 */
	public $layout;

	/**
	 * {@inheritdoc}
	 */
	protected function beforeRun()
	{
		if (parent::beforeRun()) {
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			Yii::$app->response->charset = 'UTF-8';
		}
		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function run()
	{
		$model = new SupportFeedbacks();
		$feedbackSubject = Yii::$app->params['arnica']['feedbackSubject'];
		if(isset($feedbackSubject))
			$model->subject_id = $feedbackSubject;
		$feedbackMessage = Yii::$app->params['arnica']['feedbackMessage'];
		if(isset($feedbackMessage))
			$model->message = $feedbackMessage;

		if(Yii::$app->request->isPost) {
			$model->load(Yii::$app->request->post());
			// $postData = Yii::$app->request->post();
			// $model->load($postData);
			// $model->order = $postData['order'] ? $postData['order'] : 0;

			if($model->save()) {
				return [
					'status' => 'success',
				];

			} else {
				if(Yii::$app->request->isAjax)
					return \yii\widgets\ActiveForm::validate($model);
			}
		}
	}
}