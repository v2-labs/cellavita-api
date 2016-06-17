<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DonorRecords;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\Controller\ControllerManager;

class Module
{
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					'Cells'      => __DIR__ . '/src/Cells',
					'Exams'      => __DIR__ . '/src/Exams',
					'Donors'     => __DIR__ . '/src/Donors',
					'Travels'    => __DIR__ . '/src/Travels',
					'Vaccines'   => __DIR__ . '/src/Vaccines',
					'Addresses'  => __DIR__ . '/src/Addresses',
					'Telephones' => __DIR__ . '/src/Telephones',
				),
			),
		);
	}

	public function getServiceConfig() {
		return array(
			'initializers' => array(
				function($instance, $sm) {
					if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
						$instance->setDbAdapter($sm->get('\Zend\Db\Adapter\Adapter'));
					}
				}
			)
		);
	}
}