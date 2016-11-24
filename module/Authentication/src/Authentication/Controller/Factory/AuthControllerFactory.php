<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Authentication\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Authentication\Controller\AuthController;

class AuthControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $authTable = $sm->get('Authentication\Model\AuthTable');
        } catch (ServiceNotCreatedException $e) {
            $authTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $authTable = null;
        }

        $controller = new AuthController($authTable);
        return $controller;
    }
}
