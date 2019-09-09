<?php
/**
 * @var string $content
 * @var $this app\components\View
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$themeAsset = \themes\arnica\assets\ThemePluginAsset::register($this);
$context = $this->context;
?>

<?php //begin.Newsletter popup ?>
<div id="newsletter" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<div class="dialog-inner">
			<h4>Stay Tuned</h4>
			<p class="hidden-xs">We launch our new website soon.
				<br>Please stay updated and follow!</p>

			<?php //begin.Newsletter form ?>
			<div id="subscribe">
				<?php $form = ActiveForm::begin([
					'action' => Url::to(['/site/contact']),
					'id' => 'notifyMe',
					'enableClientValidation' => false,
					'enableAjaxValidation' => false,
					//'enableClientScript' => true,
				]); ?>

				<?php echo $form->field($model, 'displayname', ['template' => '{input}{error}'])
					->textInput(['maxlength'=>true, 'placeholder'=>'Enter your name'])
					->label($model->getAttributeLabel('displayname')); ?>

				<?php echo $form->field($model, 'email', ['template' => '{input}{error}'])
					->textInput(['type'=>'email', 'placeholder'=>'Enter your email address'])
					->label($model->getAttributeLabel('email')); ?>

				<?php echo $form->field($model, 'phone', ['template' => '{input}{error}'])
					->textInput(['type'=>'number', 'maxlength'=>true, 'placeholder'=>'Enter your phone number'])
					->label($model->getAttributeLabel('phone')); ?>

				<?php //begin.Spinner top left during the submission ?>
				<i class="fas fa-spinner opacity-0"></i>

				<?php echo Html::submitButton('Get Notified', ['class' => 'action-btn submit']); ?>
				<div class="clear"></div>

				<?php ActiveForm::end(); ?>

				<?php //begin.Answer for the newsletter form is displayed in the next div, do not remove it. ?>
				<div class="block-message">
					<div class="message">
						<p class="notify-valid"></p>
					</div>
				</div>
			</div>
		</div>

		<?php //begin.Popup close button ?>
		<button class="close-newsletter" data-dialog-close><i class="fas fa-times"></i></button>
	</div>
</div>