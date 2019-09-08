<?php
namespace themes\arnica\components;

use Yii;
use yii\helpers\StringHelper;
use yii\helpers\Inflector;
use ommu\core\models\CorePages;

class CountdownAndMessage extends \yii\base\Widget
{
	public $countdown;
	public $message;
	public $headline;

	public $pageId;

	public function init()
	{
		if(!$this->countdown) {
			$now = new \DateTime();
			$this->countdown = $now->modify('+1 month')->format('Y-m-d');
		}

		if(!$this->message)
			$this->message = 'Our website is under construction, we are working very hard to give you the best experience.
			<br class="hidden-xs"> You will love <strong>Arnica</strong> as much as we do. <span class="hidden-xs">It will morph perfectly on your needs!</span>';

		if(!$this->headline)
			$this->headline = '
			<span class="blc"><strong>Arnica</strong> Is </span>
			<span class="cd-words-wrapper">
				<b class="is-visible">Coming Soon</b>
				<b>Creative</b>
				<b>Launching</b>
			</span>';
	}

	public function getQuoteParams($quote)
	{
		$a = StringHelper::explode($quote, PHP_EOL);
		$params = [];
		foreach ($a as $val) {
			$b = StringHelper::explode($val, '#');
			$params[Inflector::slug($b[0])] = count($b) > 1 ? $b[1] : $b[0];
		}

		return $params;
	}

	public function parseTitle($title)
	{
		$message = '';
		$i=0;
		foreach ($title as $value) {
			$i++;
			if($i == 1)
				$message .= '<strong>'.$value.'</strong> ';
			else
				$message .= $value.' ';
		}

		return $message;
	}

	public function parseQuote($quote)
	{
		$message = '';
		$i=0;
		foreach ($quote as $value) {
			$i++;
			if($i == 1)
				$message .= '<b class="is-visible">'.$value.'</b>';
			else
				$message .= '<b>'.$value.'</b>';
		}

		return $message;
	}

	public function parseHeadline($attribute)
	{
		$message = '<span class="blc">{title}</span>
		<span class="cd-words-wrapper">{quote}</span>';

		foreach ($attribute as $key => $value) {
			$message = strtr($message, [
				'{'.$key.'}' => $value,
			]);
		}

		return $message;
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$online = Yii::$app->setting->get(join('_', [Yii::$app->id, 'online']));
			$construction_date = Yii::$app->setting->get(join('_', [Yii::$app->id, 'construction_date']));
			$construction_text = unserialize(Yii::$app->setting->get(join('_', [Yii::$app->id, 'construction_text'])));

			Yii::$app->formatter->locale = 'en-US';
			$this->countdown = $construction_date ? Yii::$app->formatter->asDate($construction_date, 'long') : '';
			if($online != 1)
				$this->message = $online == 0 ? $construction_text['maintenance'] : $construction_text['comingsoon'];

			if($this->pageId) {
				$this->pageId = Yii::$app->params['arnica']['headlinePageId'];
	
				$model = CorePages::find()
					->alias('t')
					->select(['name','desc','quote'])
					->andWhere(['t.page_id' => $this->pageId])
					->andWhere(['t.publish' => 1])
					->one();

				if($model) {
					$title = explode('#', $model->title->message);
					$description = $model->description->message;
					$quote = $this->getQuoteParams($model->quoteRltn->message);

					$this->headline = $this->parseHeadline(['title'=>$this->parseTitle($title), 'quote'=>$this->parseQuote($quote)]);
				}
			}
		}

		return $this->render('countdown_message', [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}