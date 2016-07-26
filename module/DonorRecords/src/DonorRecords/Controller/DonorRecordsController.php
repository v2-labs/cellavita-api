<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DonorRecords\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Exams\Model\ExamsTable;
use Donors\Model\DonorsTable;
use Travels\Model\TravelsTable;
use Vaccines\Model\VaccinesTable;
use Addresses\Model\AddressesTable;
use Telephones\Model\TelephonesTable;


class DonorRecordsController extends AbstractRestfulController
{
	protected $_examsTable,
              $_donorsTable,
              $_travelsTable,
              $_vaccinesTable,
              $_addressesTable,
              $_telephonesTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(array $donorrecordTables = null) {
		if (!is_null($donorrecordTables)) {
			$this->_examsTable = $donorrecordTables['examsTable'];
			$this->_donorsTable = $donorrecordTables['donorsTable'];
			$this->_travelsTable = $donorrecordTables['travelsTable'];
			$this->_vaccinesTable = $donorrecordTables['vaccinesTable'];
			$this->_addressesTable = $donorrecordTables['addressesTable'];
			$this->_telephonesTable = $donorrecordTables['telephonesTable'];
		}
	}

	public function get($id) {
		$donorData = $this->_donorsTable->getById($id);

		if ($donorData !== null && !empty($donorData)) {
			$donorrecordData = array('donorsData' => $donorData);
			// Add remaining info from complementary tables
			$donorrecordData['examsTable'] = $this->_examsTable->getDonorExams($id);
			$donorrecordData['travelsTable'] = $this->_travelsTable->getDonorTravels($id);
			$donorrecordData['vaccinesTable'] = $this->_vaccinesTable->getDonorVaccines($id);
			$donorrecordData['addressesTable'] = $this->_addressesTable->getDonorAddresses($id);
			$donorrecordData['telephonesTable'] = $this->_telephonesTable->getDonorTelephones($id);
			// Return all on a single JSON response
			return new JsonModel($donorrecordData);
		}
		else {
			throw new \Exception('User not found', 404);
		}
	}

	public function getList() {
		$this->methodNotAllowed();
	}

	public function create($data) {
		$this->methodNotAllowed();
	}

	public function update($id, $data) {
		$this->methodNotAllowed();
	}

	public function delete($id) {
		$this->methodNotAllowed();
	}
}
