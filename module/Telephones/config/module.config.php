<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Telephones;

return array(
	'router' => array(
		'routes' => array(
			'telephones' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/api/1.0/telephones[/:id]',
					'constrains' => array(
						'id' => '\w+',
					),
					'defaults' => array(
						'controller' => 'Telephones\Controller\Index',
					),
				),
			),
		),
	),
	'service_manager' => array(
		'invokables' => array(
			'Telephones\Model\TelephonesTable'
				=> 'Telephones\Model\TelephonesTable',
		),
	),
	'controllers' => array(
		'factories' => array(
			'Telephones\Controller\Index'
				=> 'Telephones\Controller\Factory\IndexControllerFactory',
		),
	),
);
