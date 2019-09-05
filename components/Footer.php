<?php
namespace themes\arnica\components;

use Yii;
use yii\helpers\Html;

class Footer extends \yii\base\Widget
{
	public $subLayout;
	public $siteName;

	public function init()
	{
		if(!$this->siteName)
			$this->siteName = 'Arnica';
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$copyright = unserialize(Yii::$app->setting->get(join('_', [Yii::$app->id, 'copyright'])));
			$this->siteName = Html::a($copyright['name'], $copyright['url'] ? $copyright['url'] : ['/site/index'], ['title'=>$copyright['name']]);
		}

		return $this->render('footer', [
			'isDemoTheme' => $isDemoTheme,
			'subLayout' => $this->subLayout,
		]);
	}
}