<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;
use themes\arnica\assets\ThemePluginAsset;

$themeAsset = ThemePluginAsset::register($this);
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyBe0RCo4fOUaDr412OzLvKt0KInk0CtUsw');
$context = $this->context;
?>

<?php //begin.Google Maps ?>
<div class="google-map">
	<div id="google-container" 
		ata-title="<?php echo $context->office;?>" 
		data-latitude="<?php echo $context->latitude;?>" 
		data-longitude="<?php echo $context->longitude;?>" 
		data-zoom="12" 
		data-marker="<?php echo $themeAsset->baseUrl;?>/images/map-marker-<?php echo $subLayout;?>.png" data-color="#0fe0ba">
	</div>
	<div id="zoom-in"></div>
	<div id="zoom-out"></div>
</div>