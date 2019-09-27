<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
use themes\arnica\assets\ThemeAsset;
use themes\arnica\assets\ThemePluginAsset;
use themes\arnica\assets\ThemeSettingPluginAsset;

$themeAsset = ThemePluginAsset::register($this);
$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;
$subLayout = $this->subLayout == 'default' ? 'green' : $this->subLayout;
if($isDemoTheme)
	ThemeSettingPluginAsset::register($this);

if($subLayout == 'green')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/green.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);
else if($subLayout == 'blue')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/blue.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);
else if($subLayout == 'orange')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/orange.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);
else if($subLayout == 'purple')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/purple.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);
else if($subLayout == 'yellow')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/yellow.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);
else if($subLayout == 'grey')
	$this->registerCssFile($themeAsset->baseUrl . '/css/colors/grey.css', ['depends' => [ThemeAsset::className()], 'class'=>'colors']);

$this->beginPage();?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
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
if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register(baseUrl + '/service-worker.js');
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

<?php //begin.background
if($isDemoTheme)
	echo $content;
else
	echo \themes\arnica\components\BackgroundContent::widget(); ?>

<?php //begin.Page content ?>
<div class="page modal-effect">

	<?php //begin.Logo ?>
	<section class="logo wow fadeInUp">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<img src="<?php echo $themeAsset->baseUrl;?>/demo/images/logo.png" alt="">
				</div>
			</div>
		</div>
	</section>

	<?php //begin.Table ?>
	<div class="tbl">
		<div class="tbl-cell">

			<?php //begin.Welcome ?>
			<section class="welcome">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php //begin.countdown and message
							echo \themes\arnica\components\CountdownAndMessage::widget(); ?>
						</div>
					</div>
				</div>
			</section>

			<?php //begin.Countdown ?>
			<section class="countdown">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div id="countdown" class="wow fadeInUp" data-wow-delay="0.9s"></div>
						</div>
					</div>
				</div>
			</section>

			<?php //begin.Buttons ?>
			<section class="buttons">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">

							<?php //begin.Subscribe
							if($isDemoTheme || (!$isDemoTheme && isset(Yii::$app->params['arnica']['subscribe']) && Yii::$app->params['arnica']['subscribe'])) {?>
							<div class="action-btn white wow fadeInUp" data-wow-delay="1.2s" data-dialog="newsletter">
								<i class="fas fa-envelope"></i> Subscribe
							</div>
							<?php }?>

							<div class="action-btn more-info wow fadeInUp" data-wow-delay="1.5s" data-toggle="modal" data-target="#about">
								More Info
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>
	</div>

	<?php //begin.Social ?>
	<section class="social">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<ul>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

</div>

<?php //begin.Info nav ?>
<a class="info-nav wow fadeInUp" data-wow-delay="0.3s" href="#" data-toggle="modal" data-target="#about">
	<span></span>
</a>

<?php //begin.About us ?>
<div id="about" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
	<div class="tbl">
		<div class="tbl-cell">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="tbl-top">
						<div class="modal-body">
							<?php //begin.about us
							echo \themes\arnica\components\AboutUs::widget(); ?>

							<?php //begin.footer
							echo \themes\arnica\components\Footer::widget([
								'subLayout' => $subLayout,
							]); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php //begin.Newsletter popup
echo \themes\arnica\components\Newsletter::widget(); ?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
