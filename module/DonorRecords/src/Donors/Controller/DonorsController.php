<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Donors\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Donors\Model\DonorsTable;

class DonorsController extends AbstractRestfulController
{
	protected $_donorsTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(DonorsTable $donorsTable = null) {
		if (!is_null($donorsTable)) {
			$this->_donorsTable = $donorsTable;
		}
	}

	public function get($id) {
		$donorData = $this->_donorsTable->getById($id);

		if ($donorData !== null && !empty($donorData)) {
			return new JsonModel($donorData);
		}
		else {
			throw new \Exception('User not found', 404);
		}
	}

	public function getList() {
		$donorData = $this->_donorsTable->getAll();

		if ($donorData !== null && !empty($donorData)) {
			return new JsonModel($donorData);
		}
		else {
			throw new \Exception('No data found', 404);
		}
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

	// Custom methods for searching
	public function searchcpfAction() {
		// Get the $cpf parameter from route if available
		$cpf = $this->params()->fromRoute('cpf', null);

		if ($cpf !== null) {
			$donorData = $this->_donorsTable->searchCpf($cpf);

			if ($donorData !== null && !empty($donorData)) {
				return new JsonModel($donorData);
			}
			else {
				throw new \Exception('No entries found', 404);
			}
		}
		else {
			throw new \Exception('Missing API parameter', 501);
		}
	}

	public function searchnameAction() {
		// Get the $name parameter from route if available
		$name = $this->params()->fromRoute('name', null);

		if ($name !== null) {
			$donorData = $this->_donorsTable->searchName($name);

			if ($donorData !== null && !empty($donorData)) {
				return new JsonModel($donorData);
			}
			else {
				throw new \Exception('No entries found', 404);
			}
		}
		else {
			throw new \Exception('Missing API parameter', 502);
		}
	}
}
