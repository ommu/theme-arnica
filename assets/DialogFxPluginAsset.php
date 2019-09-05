<?php
namespace themes\arnica\assets;

class DialogFxPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/dialog-fx';
	
	public $js = [
		'js/modernizr.custom.js',
		'js/classie.js',
		'js/dialogFx.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}