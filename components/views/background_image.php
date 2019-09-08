<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
$context = $this->context;

$backgroundSlide = Json::encode($context->backgroundSlide);
$js = <<<JS
	var backgroundSlide = $backgroundSlide;
JS;
$this->registerJs($js, \app\components\View::POS_HEAD);
?>

<div class="bg modal-effect image"></div>