<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Vaccines\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Vaccines\Controller\VaccinesController;

class VaccinesControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $vaccinesTable = $sm->get('Vaccines\Model\VaccinesTable');
        } catch (ServiceNotCreatedException $e) {
            $vaccinesTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $vaccinesTable = null;
        }

        $controller = new VaccinesController($vaccinesTable);
        return $controller;
    }
}
