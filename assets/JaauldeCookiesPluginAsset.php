<?php
namespace themes\arnica\assets;

class JaauldeCookiesPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/jaaulde-cookies/lib';
	
	public $js = [
		'jaaulde-cookies.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}