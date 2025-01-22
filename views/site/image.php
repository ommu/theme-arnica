<?php
/**
 * @var $this app\components\View
 * @var $this themes\arnica\controllers\SiteController
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2019 OMMU (www.ommu.id)
 * @created date 5 September 2019, 12:20 WIB
 * @link https://github.com/ommu/theme-arnica
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
?>

<?php //begin.background
echo \themes\arnica\components\BackgroundContent::widget([
	'backgroundType' => 'image',
	'backgroundBaseUrl' => $themeAsset->baseUrl,
]); ?>