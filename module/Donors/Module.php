<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Donors;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\Controller\ControllerManager;

class Module
{
	public function getControllerConfig() {
		return array(
			'factories' => array(
				'Donors\Controller\Index' => function(ControllerManager $cm) {
					$sm = $cm->getServiceLocator();
					$donorModel = $sm->get('Donors\Model\DonorsTable');
					$controller = new Donors\Controller\IndexController($donorModel);
					return $controller;
				},
			),
		);
	}

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}
}