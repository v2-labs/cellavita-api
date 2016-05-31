<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Telephones\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Telephones\Controller\TelephonesController;

class TelephonesControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $telephonesTable = $sm->get('Telephones\Model\TelephonesTable');
        } catch (ServiceNotCreatedException $e) {
            $telephonesTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $telephonesTable = null;
        }

        $controller = new TelephonesController($telephonesTable);
        return $controller;
    }
}
