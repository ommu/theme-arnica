<?php
namespace themes\arnica\assets;

class ThemeSettingPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/arnica';

	public $css = [
		"demo/css/settings.css",
	];

	public $js = [
		"demo/js/settings.js",
	];

	public $depends = [
		'themes\arnica\assets\JaauldeCookiesPluginAsset',
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