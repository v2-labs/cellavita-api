<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CultureRecords;

return array(
	'controllers' => array(
		'factories' => array(
			'Cells\Controller\Cells'
				=> 'Cells\Controller\Factory\CellsControllerFactory',
			'Cultures\Controller\Cultures'
				=> 'Cultures\Controller\Factory\CulturesControllerFactory',
			'CultureRecords\Controller\Index'
				=> 'CultureRecords\Controller\Factory\CultureRecordControllerFactory',
		),
	),
	'router' => array(
		'routes' => array(
			// Root route base entry
			'donors' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/v1/donors',
					'defaults' => array(
						'controller' => 'Donors\Controller\Index',
					),
				),
				'may_terminate' => false,
				'child_routes' => array(
					'searchCPF' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/searchcpf/:cpf',
							'constrains' => array(
								'cpf' => '[0-9]+',
							),
							'defaults' => array(
								'action' => 'searchcpf',
							),
						),
					),
					'searchName' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '/searchname/:name',
							'constrains' => array(
								'name' => '[a-zA-Z ]+',
							),
							'defaults' => array(
								'action' => 'searchname',
							),
						),
					),
					'data' => array(
						'type' => 'Zend\Mvc\Router\Http\Segment',
						'options' => array(
							'route' => '[/:id]',
							'constrains' => array(
								'id' => '[0-9]+',
							),
						),
						'may_terminate' => true,
						'child_routes' => array(
							'telephones' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/telephones[/:phoneId]',
									'constrains' => array(
										'phoneId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Telephones\Controller\Telephones',
									),
								),
							),
							'vaccines' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/vaccines[/:vaccineId]',
									'constrains' => array(
										'vaccineId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Vaccines\Controller\Vaccines',
									),
								),
							),
							'travels' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/travels[/:travelId]',
									'constrains' => array(
										'travelId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Travels\Controller\Travels',
									),
								),
							),
							'addresses' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/addresses[/:addressId]',
									'constrains' => array(
										'addressId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Addresses\Controller\Addresses',
									),
								),
							),
							'cells' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/cells[/:cellId]',
									'constrains' => array(
										'cellId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Cells\Controller\Cells',
									),
								),
							),
							'exams' => array(
								'type' => 'Zend\Mvc\Router\Http\Segment',
								'options' => array(
									'route' => '/exams[/:examId]',
									'constrains' => array(
										'examId' => '[0-9]+',
									),
									'defaults' => array(
										'controller' => 'Exams\Controller\Exams',
									),
								),
							),
						),
					),
				),
			),
		),
	),
	'service_manager' => array(
		'invokables' => array(
			'Cells\Model\CellsTable'
				=> 'Cells\Model\CellsTable',
			'Cultures\Model\CulturesTable'
				=> 'Cultures\Model\CulturesTable',
		),
	),
);



