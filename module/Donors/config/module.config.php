<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Donors;

return array(
	'router' => array(
		'routes' => array(
			'donors' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/api/donors[/:id]',
					'constrains' => array(
						'id' => '\w+',
					),
					'defaults' => array(
						'controller' => 'Donors\Controller\Index',
					),
				),
			),
		),
	),
	'service_manager' => array(
		'invokables' => array(
			'Donors\Model\DonorsTable'
				=> 'Donors\Model\DonorsTable',
		),
	),
	'controllers' => array(
		'factories' => array(
			'Donors\Controller\Index'
				=> 'Donors\Controller\Factory\IndexControllerFactory',
		),
	),
);
