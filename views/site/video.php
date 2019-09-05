<?php
/**
 * @var $this app\components\View
 * @var $this themes\arnica\controllers\SiteController
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2019 OMMU (www.ommu.co)
 * @created date 5 September 2019, 12:20 WIB
 * @link https://github.com/ommu/theme-arnica
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
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