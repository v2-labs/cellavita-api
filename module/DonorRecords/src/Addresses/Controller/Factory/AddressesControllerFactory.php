<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Addresses\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Addresses\Controller\AddressesController;

class AddressesControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $addressesTable = $sm->get('Addresses\Model\AddressesTable');
        } catch (ServiceNotCreatedException $e) {
            $addressesTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $addressesTable = null;
        }

        $controller = new AddressesController($addressesTable);
        return $controller;
    }
}
