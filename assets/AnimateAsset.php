<?php
namespace themes\arnica\assets;

class AnimateAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@npm/animate.css';
	
	public $css = [
		'animate.min.css',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG ? true : false,
	];
}