<?php
namespace themes\arnica\assets;

class AnimatedHeadlinePluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/ommu--animated-headline';
	
	public $css = [
		'css/style.css',
	];
	
	public $js = [
		'js/main.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}