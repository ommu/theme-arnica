<?php
namespace themes\arnica\assets;

class ThemeAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/arnica';
	
	public $css = [
		"css/style.css",
		"css/media.css",
		["css/colors/green.css", ['class'=>'colors']],
		"https://fonts.googleapis.com/css?family=Poppins:300,400,400italic,600,700,700italic,800",
	];

	public $depends = [
		"yii\bootstrap\BootstrapAsset",
		"themes\arnica\assets\FontAwesomeAsset",
		"themes\arnica\assets\AnimateAsset",
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