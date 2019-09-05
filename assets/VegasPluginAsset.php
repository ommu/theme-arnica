<?php
namespace themes\arnica\assets;

class VegasPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/vegas/dist';
	
	public $css = [
		'vegas.min.css',
	];
	
	public $js = [
		'vegas.min.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}