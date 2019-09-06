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

<?php //begin.About ?>
<div class="about-dsc">
	<?php //begin.Title ?>
	<div class="row section-title">
		<div class="col-lg-12">
			<h3><?php echo $context->title; ?></h3>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<?php echo $context->description; ?>
		</div>
	</div>
</div>