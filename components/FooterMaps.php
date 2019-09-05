<?php
namespace themes\arnica\components;

use Yii;
use ommu\core\models\CoreZoneCity;
use ommu\core\models\CoreZoneProvince;
use ommu\core\models\CoreZoneCountry;

class FooterMaps extends \yii\base\Widget
{
	use \ommu\traits\FileTrait;

	public $subLayout;
	public $office;
	public $latitude;
	public $longitude;

	public function init()
	{
		if(!$this->office)
			$this->office = 'Arnica Main Office';

		if(!$this->latitude)
			$this->latitude = '37.800976';

		if(!$this->longitude)
			$this->longitude = '-122.428502';
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$office_name = Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_name']));
			$office_location = Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_location']));

			$this->office = $office_name ? $office_name : '';
			if($office_location) {
				$latLong = $this->formatFileType($office_location);
				$this->latitude = $latLong[0] ? $latLong[0] : '';
				$this->longitude = $latLong[1] ? $latLong[1] : '';
			}
		}

		return $this->render('footer_maps', [
			'isDemoTheme' => $isDemoTheme,
			'subLayout' => $this->subLayout,
		]);
	}
}