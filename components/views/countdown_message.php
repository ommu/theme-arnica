<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
$context = $this->context;
$js = <<<JS
	var countdownDate = '{$context->countdown}';
JS;
$this->registerJs($js, \app\components\View::POS_HEAD);
?>

<h2 class="wow fadeInUp cd-headline clip" data-wow-delay="0.3s">
	<?php echo $context->headline; ?>
</h2>

<p class="wow fadeInUp" data-wow-delay="0.6s">
	<?php echo $context->message; ?>
</p>