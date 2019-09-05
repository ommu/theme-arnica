<?php
namespace themes\arnica\assets;

class WowPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/wowjs/dist';
	
	public $js = [
		'wow.min.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}