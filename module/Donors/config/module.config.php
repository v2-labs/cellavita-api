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
	'controllers' => array(
		'factories' => array(
			'Donors\Controller\Index'
				=> 'Donors\Controller\Factory\DonorsControllerFactory',
			'Donors\Controller\Telephones'
				=> 'Donors\Controller\Factory\TelephonesControllerFactory',
			'Donors\Controller\Vaccines'
				=> 'Donors\Controller\Factory\VaccinesControllerFactory',
			'Donors\Controller\Travels'
				=> 'Donors\Controller\Factory\TravelsControllerFactory',
			'Donors\Controller\Addresses'
				=> 'Donors\Controller\Factory\AddressesControllerFactory',
			'Donors\Controller\Cells'
				=> 'Donors\Controller\Factory\CellsControllerFactory',
		),
	),
	'router' => array(
		'routes' => array(
			// Root route base entry
			'donors' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/v1/donors[/:id]',
					'constrains' => array(
						'id' => '\w+',
					),
					'defaults' => array(
						'controller' => 'Donors\Controller\Index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'telephones' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/telephones[/:id]',
							'constrains' => array(
								'id' => '\w+',
							),
							'defaults' => array(
								'controller' => 'Donors\Controller\Telephones',
							),
						),
					),
					'vaccines' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/vaccines[/:id]',
							'constrains' => array(
								'id' => '\w+',
							),
							'defaults' => array(
								'controller' => 'Donors\Controller\Vaccines',
							),
						),
					),
					'travels' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/travels[/:id]',
							'constrains' => array(
								'id' => '\w+',
							),
							'defaults' => array(
								'controller' => 'Donors\Controller\Travels',
							),
						),
					),
					'addresses' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => 'addresses[/:id]',
							'constrains' => array(
								'id' => '\w+',
							),
							'defaults' => array(
								'controller' => 'Donors\Controller\Addresses',
							),
						),
					),
					'cells' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/cells[/:id]',
							'constrains' => array(
								'id' => '\w+',
							),
							'defaults' => array(
								'controller' => 'Donors\Controller\Cells',
							),
						),
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
