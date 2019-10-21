<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;
use themes\arnica\assets\ThemePreviewPluginAsset;

$themeAsset = ThemePreviewPluginAsset::register($this);

$this->beginPage();?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>" dir="ltr">
<head>
	<meta charset="<?php echo Yii::$app->charset ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php echo Html::csrfMetaTags() ?>
	<title><?php echo Html::encode($this->pageTitle) ?></title>
	<?php $this->head();
	$baseUrl = Yii::getAlias('@web');
$js = <<<JS
	const baseUrl = '{$baseUrl}';
	const themeAssetUrl = '{$themeAsset->baseUrl}';
	const version = '1';
if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register(baseUrl + '/service-worker.js?v='+version+'&bu='+baseUrl+'&tu='+themeAssetUrl);
	});
}
JS;
$this->registerJs($js, $this::POS_HEAD); ?>
</head>

<body>
<?php $this->beginBody();?>

<?php //begin.Loader ?>
<div class="page-loader">
	<div class="progress"></div>
</div>

<?php //begin.Header ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
				<h1>Arnica</h1>
				<h2>Creative Coming Soon Template</h2>
			</div>
		</div>
	</div>
</header>

<?php //begin.content
echo $content; ?>

<?php //begin.Footer ?>
<footer id="footer">
	<span class="copyright">Copyright © <a href="#" target="_blank">Arnica</a><br>
	<span class="social">
		<a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
		<a href="#" title="DeviantArt" target="_blank"><i class="fab fa-deviantart"></i></a>
		<a href="#" title="Behance" target="_blank"><i class="fab fa-behance"></i></a>
		<a href="#" title="Dribbble" target="_blank"><i class="fab fa-dribbble"></i></a>
		<a href="#" title="Flickr" target="_blank"><i class="fab fa-flickr"></i></a>
		<a href="#" title="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
	</span>
	</span>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
