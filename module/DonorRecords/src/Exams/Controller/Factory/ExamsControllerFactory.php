<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Exams\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Exams\Controller\ExamsController;

class ExamsControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
            $examsTable = $sm->get('Exams\Model\ExamsTable');
        } catch (ServiceNotCreatedException $e) {
            $examsTable = null;
        } catch (ExtensionNotLoadedException $e) {
            $examsTable = null;
        }

        $controller = new ExamsController($examsTable);
        return $controller;
    }
}
