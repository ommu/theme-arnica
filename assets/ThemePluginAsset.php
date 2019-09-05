<?php
namespace themes\arnica\assets;

class ThemePluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/arnica';

	public $js = [
		"js/plugin/notifyme.js",
		"js/main.js",
	];

	public $depends = [
		'yii\web\JqueryAsset',
		"yii\bootstrap\BootstrapPluginAsset",
		'themes\arnica\assets\WowPluginAsset',
		'themes\arnica\assets\KbwCountdownPluginAsset',
		'themes\arnica\assets\AnimatedHeadlinePluginAsset',
		'themes\arnica\assets\DialogFxPluginAsset',
		'themes\arnica\assets\MalihuCustomScrollbarPluginAsset',
		'themes\arnica\assets\VegasPluginAsset',
		'themes\arnica\assets\YTPlayerPluginAsset',
		'themes\arnica\assets\ThemeAsset',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
		'except' => [
			'assets/',
			'components/',
			'controllers/',
			'layouts/',
			'modules/',
			'site/',
			'views/',
		],
	];
}