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

<?php //begin.Contact ?>
<div class="contact">
	<?php //begin.Title ?>
	<div class="row section-title">
		<div class="col-lg-12">
			<h3><?php echo Yii::t('app', 'Contact');?></h3>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<h5><i class="fas fa-phone"></i></h5>
			<p>
				<?php echo $context->phone ? 'P: '.$context->phone : '';?>
				<?php echo $context->fax ? '<br/>F: '.$context->fax : '';?>
			</p>
		</div>
		<div class="col-lg-4">
			<h5><i class="fas fa-map"></i></h5>
			<p><?php echo $context->address;?></p>
		</div>
		<div class="col-lg-4">
			<h5><i class="fas fa-envelope"></i></h5>
			<p><?php echo $context->email;?></p>
		</div>
	</div>
</div>