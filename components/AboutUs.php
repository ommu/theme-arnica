<?php
namespace themes\arnica\components;

use Yii;
use ommu\core\models\CorePages;

class AboutUs extends \yii\base\Widget
{
	use \ommu\traits\UtilityTrait;

	public $title;
	public $description;

	public $pageId;

	public function init()
	{
		if(!$this->title)
			$this->title = 'About';

		if(!$this->description)
			$this->description = '<p>Curabitur ac <strong>fringilla mauris</strong>, vitae luctus orci. Pellentesque eu placerat nunc. <strong>Vivamus</strong> tellus nec semper. Etiam ex felis, maximus id commodo sit amet, <strong>congue vitae ipsum</strong>. Aliquam at nisl nulla. Fusce quis purus nec lacus laoreet luctus at vitae libero.</p>';
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$this->pageId = Yii::$app->params['arnica']['aboutPageId'];
			if($this->pageId) {
				$model = CorePages::find()
					->alias('t')
					->select(['name','desc'])
					->andWhere(['t.page_id' => $this->pageId])
					->andWhere(['t.publish' => 1])
					->one();

				if($model) {
					$this->title = $model->title->message;
					$this->description = $model->description->message;
				}
			}
		}

		return $this->render('about_us', [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}