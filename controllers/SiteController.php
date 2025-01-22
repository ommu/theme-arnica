<?php
/**
 * SiteController
 * @var $this app\components\View
 *
 * Reference start
 * TOC :
 *	Index
 *	Image
 *	Slide
 *	Video
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2019 OMMU (www.ommu.id)
 * @created date 20 February 2019, 15:35 WIB
 * @link https://github.com/ommu/theme-arnica
 *
 */

namespace themes\arnica\controllers;

use Yii;
use app\components\Controller;

class SiteController extends Controller
{
	public static $backoffice = false;

	/**
	 * {@inheritdoc}
	 */
	public function init() 
	{
		parent::init();

		$this->view->theme('arnica');
	}

	/**
	 * {@inheritdoc}
	 */
	public function getViewPath()
	{
		return $this->view->theme->getBasePath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'site';
	}

	/**
	 * Index Action
	 */
	public function actionIndex()
	{
		$this->layout = 'maindemo';
		$this->view->title = Yii::t('app', 'Main');
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('index');
	}

	/**
	 * Image Action
	 */
	public function actionImage()
	{
		$this->view->title = Yii::t('app', 'Image');
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('image');
	}

	/**
	 * Slide Action
	 */
	public function actionSlide()
	{
		$this->view->title = Yii::t('app', 'Slide');
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('slide');
	}

	/**
	 * Video Action
	 */
	public function actionVideo()
	{
		$this->view->title = Yii::t('app', 'Video');
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('video');
	}
}
