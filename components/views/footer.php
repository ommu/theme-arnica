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

<?php //begin.footer address
echo \themes\arnica\components\FooterAddress::widget(); ?>

<?php //begin.footer maps
echo \themes\arnica\components\FooterMaps::widget([
	'subLayout' => $subLayout,
]); ?>

<?php //begin.footer copyright ?>
<div class="copyright">
	<?php echo Yii::t('app', 'Copyright &copy; {year} <strong>{siteName}</strong>', ['year'=>date("Y"), 'siteName'=>$context->siteName]);?>
</div>