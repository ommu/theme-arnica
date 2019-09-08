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

$videoParams = Json::encode($context->videoParams);
$js = <<<JS
	var videoParams = $videoParams;
JS;
$this->registerJs($js, \app\components\View::POS_HEAD);
?>

<a id="bgndVideo" class="player"></a>