<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Travels\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Travels\Controller\TravelsController;

class TravelsControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $travelsTable = $sm->get('Travels\Model\TravelsTable');
        } catch (ServiceNotCreatedException $e) {
            $travelsTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $travelsTable = null;
        }

        $controller = new TravelsController($travelsTable);
        return $controller;
    }
}
