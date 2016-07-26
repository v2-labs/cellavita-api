<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cultures\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Cultures\Controller\CulturesController;

class CulturesControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $culturesTable = $sm->get('Cultures\Model\CulturesTable');
        } catch (ServiceNotCreatedException $e) {
            $culturesTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $culturesTable = null;
        }

        $controller = new CulturesController($culturesTable);
        return $controller;
    }
}
