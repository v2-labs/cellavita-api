<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DonorRecords\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use DonorRecords\Controller\DonorRecordsController;

class DonorRecordsControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        try {
        	$donorrecordTables = array(
                'examsTable' => $sm->get('Exams\Model\ExamsTable'),
                'donorsTable' => $sm->get('Donors\Model\DonorsTable'),
                'travelsTable' => $sm->get('Travels\Model\TravelsTable'),
                'vaccinesTable' => $sm->get('Vaccines\Model\VaccinesTable'),
                'addressesTable' => $sm->get('Addresses\Model\AddressesTable'),
                'telephonesTable' => $sm->get('Telephones\Model\TelephonesTable'),
        	);
        } catch (ServiceNotCreatedException $e) {
            $donorrecordTables = null;
        } catch (ExtensionNotLoadedException $e) {
            $donorrecordTables = null;
        }

        $controller = new DonorRecordsController($donorrecordTables);
        return $controller;
    }
}
