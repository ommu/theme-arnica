<?php
namespace themes\arnica\components;

use Yii;
use ommu\core\models\CoreZoneCity;
use ommu\core\models\CoreZoneProvince;
use ommu\core\models\CoreZoneCountry;

class FooterAddress extends \yii\base\Widget
{
	use \ommu\traits\FileTrait;

	public $address;
	public $email;
	public $phone;
	public $fax;

	public function init()
	{
		if(!$this->address)
			$this->address = 'San Francisco, CA 94123, US';

		if(!$this->email)
			$this->email = 'info@example.com, support@example.com';

		if(!$this->phone)
			$this->phone = '(866) 496-3250';

		if(!$this->fax)
			$this->fax = '(866) 496-3251';
	}

	public function getAdressStatus($address): bool
	{
		if($address['place'] || $address['village'] || $address['city'] || $address['province'] || $address['country'] || $address['zipcode'])
			return true;

		return false;
	}

	public function getAdressMeta($address)
	{
		$office_name = Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_name']));

		if($address['city'])
			$address['city'] = CoreZoneCity::getInfo($address['city'], 'city_name');
		if($address['province'])
			$address['province'] = CoreZoneProvince::getInfo($address['province'], 'province_name');
		if($address['country'])
			$address['country'] = CoreZoneCountry::getInfo($address['country'], 'country_name');

		if($office_name)
			return join('<br/>', [$office_name, join(', ', $address)]);
		return join(', ', $address);
	}

	public function parseEmails($emails)
	{
		if(!is_array($emails))
			$emails = $this->formatFileType($emails);

		if(is_array($emails) && empty($emails))
			return;

		if(count($emails) == 1)
			return Yii::$app->formatter->asEmail(implode('<br/>', $emails));
		
		$items = [];
		foreach ($emails as $email) {
			$items[] = Yii::$app->formatter->asEmail($email);
		}

		return implode('<br/>', $items);
	}

	public function run() 
	{
		$isDemoTheme = Yii::$app->isDemoTheme() ? true : false;

		if(!$isDemoTheme) {
			$office_address = unserialize(Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_address'])));
			$office_contact = unserialize(Yii::$app->meta->get(join('_', [Yii::$app->id, 'office_contact'])));

			$this->address = $this->getAdressStatus($office_address) ? $this->getAdressMeta($office_address) : '';
			$this->email = $office_contact['email'] ? $this->parseEmails($office_contact['email']) : '';
			$this->phone = $office_contact['phone'] ? $office_contact['phone'] : '';
			$this->fax = $office_contact['fax'] ? $office_contact['fax'] : '';

		} else
			$this->email = $this->parseEmails($this->email);

		return $this->render('footer_address', [
			'isDemoTheme' => $isDemoTheme,
		]);
	}
}