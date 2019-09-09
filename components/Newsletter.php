<?php
namespace themes\arnica\components;

use Yii;
use yii\helpers\Html;
use ommu\support\models\SupportFeedbacks;

class Newsletter extends \yii\base\Widget
{
	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		$model = new SupportFeedbacks();

		return $this->render('newsletter', [
			'isDemoTheme' => $isDemoTheme,
			'model' => $model,
		]);
	}
}