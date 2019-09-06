<?php
namespace themes\arnica\components;

use Yii;

class BackgroundContent extends \yii\base\Widget
{
	public $backgroundType;

	public function init()
	{

	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			
		}

		$render = 'background_image';

		if($this->backgroundType == 'image')
			$render = 'background_image';
		else if($this->backgroundType == 'two')
			$render = 'background_slide';
		else if($this->backgroundType == 'three')
			$render = 'background_video';

		return $this->render($render, [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}