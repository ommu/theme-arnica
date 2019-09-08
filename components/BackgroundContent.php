<?php
namespace themes\arnica\components;

use Yii;

class BackgroundContent extends \yii\base\Widget
{
	public $backgroundType;
	public $backgroundBaseUrl;
	public $backgroundSlide = [];
	public $videoParams = [];

	public function init()
	{
		if(!$this->backgroundType)
			$this->backgroundType = 'image';

		if(!$this->backgroundSlide) {
			if($this->backgroundType == 'image') {
				$this->backgroundSlide = [
					['src' => join('/', [$this->backgroundBaseUrl, 'demo/images/bg/image.jpg'])],
				];
			} else if($this->backgroundType == 'slide') {
				$this->backgroundSlide = [
					['src' => join('/', [$this->backgroundBaseUrl, 'demo/images/bg/slide-1.jpg'])],
					['src' => join('/', [$this->backgroundBaseUrl, 'demo/images/bg/slide-2.jpg'])],
					['src' => join('/', [$this->backgroundBaseUrl, 'demo/images/bg/slide-3.jpg'])],
				];
			}
		}

		if(!$this->videoParams) {
			$this->videoParams = [
				'videoURL' => 'https://youtu.be/kn-1D5z3-Cs',
				'mobileFallbackImage' => join('/', [$this->backgroundBaseUrl, 'demo/images/bg/video.jpg']),
				'containment' => 'body',
				'autoPlay' => true,
				'showControls' => false,
				'mute' => false,
				'startAt' => 0,
				'stopAt' => 0,
				'opacity' => 1,
			];
		}
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$bgType = Yii::$app->params['arnica']['bgType'];
			if(isset($bgType))
				$this->backgroundType = $bgType;

			if(isset(Yii::$app->params['arnica']['videoParam']))
				$this->videoParams = Yii::$app->params['arnica']['videoParam'];
		}

		if($this->backgroundType == 'image')
			$render = 'background_image';
		else if($this->backgroundType == 'slide')
			$render = 'background_slide';
		else if($this->backgroundType == 'video')
			$render = 'background_video';

		return $this->render($render, [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}