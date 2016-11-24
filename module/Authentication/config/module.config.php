<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Authentication;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/v1/auth/login',
                    'defaults' => array(
                        'controller' => 'Auth\Controller\Login',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Auth\Controller\Login'
                => 'Authentication\Controller\Factory\AuthControllerFactory',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Authentication\Model\AuthTable'
                => 'Authentication\Model\AuthTable',
        ),
    ),
);
