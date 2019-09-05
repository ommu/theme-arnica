<?php
namespace themes\arnica\assets;

class YTPlayerPluginAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/jquery.mb.ytplayer/dist';
	
	public $css = [
		'css/jquery.mb.YTPlayer.min.css',
	];
	
	public $js = [
		'jquery.mb.YTPlayer.min.js',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}