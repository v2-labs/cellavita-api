<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cultures\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Cultures\Model\CulturesTable;

class DonorsController extends AbstractRestfulController
{
	protected $_culturesTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(CulturesTable $culturesTable = null) {
		if (!is_null($culturesTable)) {
			$this->_culturesTable = $culturesTable;
		}
	}

	public function get($id) {
		$cultureData = $this->_culturesTable->getById($id);

		if ($cultureData !== null && !empty($cultureData)) {
			return new JsonModel($cultureData);
		}
		else {
			throw new \Exception('Culture not found', 404);
		}
	}

	public function getList() {
		$cultureData = $this->_culturesTable->getAll();

		if ($cultureData !== null && !empty($cultureData)) {
			return new JsonModel($cultureData);
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
			$cultureData = $this->_culturesTable->searchCpf($cpf);

			if ($cultureData !== null && !empty($cultureData)) {
				return new JsonModel($cultureData);
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
			$cultureData = $this->_culturesTable->searchName($name);

			if ($cultureData !== null && !empty($cultureData)) {
				return new JsonModel($cultureData);
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
