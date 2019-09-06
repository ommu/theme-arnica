<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
$context = $this->context;
?>

<a id="bgndVideo" class="player" data-property="{
	videoURL:'https://youtu.be/kn-1D5z3-Cs',
	mobileFallbackImage:'<?php echo $themeAsset->baseUrl;?>/demo/images/bg/video.jpg',
	containment:'body',
	autoPlay:true, 
	showControls:false,
	mute:false, 
	startAt:0, 
	stopAt:0, 
	opacity:1
}">
</a>