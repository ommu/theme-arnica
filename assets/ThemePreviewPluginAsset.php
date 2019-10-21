<?php
namespace themes\arnica\assets;

class ThemePreviewPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/arnica';

	public $css = [
		"demo/css/preview/style.css",
		"https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic",
	];

	public $js = [
		"demo/js/preview/main.js",
	];

	public $depends = [
		'yii\web\JqueryAsset',
		"yii\bootstrap\BootstrapPluginAsset",
		"themes\arnica\assets\FontAwesomeAsset",
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