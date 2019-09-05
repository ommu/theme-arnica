<?php
/**
 * @var $this app\components\View
 * @var $this themes\carservx\controllers\SiteController
 *
 * @author Putra Sudaryanto <putra@ommu.co>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2019 OMMU (www.ommu.co)
 * @created date 20 February 2019, 15:35 WIB
 * @link https://github.com/ommu/theme-carservx
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\arnica\assets\ThemePreviewPluginAsset::register($this);
?>


<section class="demo">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12 text-intro">
				<h2>Select your Favorite Demo</h2>
				<h3>Fully Responsive &bull; 24/7 Support &bull; Well documented</h3>
			</div>
		</div>

		<div class="row">
			<div class="item col-xs-12 col-sm-4 col-lg-4">
				<a href="<?php echo Url::to(['/arnica-site/image']);?>" target="_blank" title="Single Image">
					<img src="<?php echo $themeAsset->baseUrl;?>/demo/images/preview/01.jpg" alt="Single Image" class="img-responsive" />
					<h3>01. Single Image</h3>
				</a>
			</div>
			<div class="item col-xs-12 col-sm-4 col-lg-4">
				<a href="<?php echo Url::to(['/arnica-site/slide']);?>" target="_blank" title="Image Slideshow">
					<img src="<?php echo $themeAsset->baseUrl;?>/demo/images/preview/02.jpg" alt="Image Slideshow" class="img-responsive" />
					<h3>02. Image Slideshow</h3>
				</a>
			</div>
			<div class="item col-xs-12 col-sm-4 col-lg-4">
				<a href="<?php echo Url::to(['/arnica-site/video']);?>" target="_blank" title="Youtube Background">
					<img src="<?php echo $themeAsset->baseUrl;?>/demo/images/preview/03.jpg" alt=" Youtube Background" class="img-responsive" />
					<h3>03. Youtube Background</h3>
				</a>
			</div>

		</div>

	</div>
</section>