<?php
namespace themes\arnica\assets;

class KbwCountdownPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/kbw-countdown/dist';
	
	public $js = [
		'js/jquery.plugin.min.js',
		'js/jquery.countdown.min.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}