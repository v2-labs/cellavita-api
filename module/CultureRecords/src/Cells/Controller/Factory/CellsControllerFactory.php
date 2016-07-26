<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cells\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Cells\Controller\CellsController;

class CellsControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $cellsTable = $sm->get('Cells\Model\CellsTable');
        } catch (ServiceNotCreatedException $e) {
            $cellsTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $cellsTable = null;
        }

        $controller = new CellsController($cellsTable);
        return $controller;
    }
}
