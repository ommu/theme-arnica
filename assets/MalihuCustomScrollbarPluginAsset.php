<?php
namespace themes\arnica\assets;

class MalihuCustomScrollbarPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/malihu-custom-scrollbar-plugin';
	
	public $css = [
		'jquery.mCustomScrollbar.css',
	];
	
	public $js = [
		'jquery.mCustomScrollbar.concat.min.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}