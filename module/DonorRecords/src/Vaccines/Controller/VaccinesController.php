<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Vaccines\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Vaccines\Model\VaccinesTable;

class VaccinesController extends AbstractRestfulController
{
	protected $_vaccinesTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(VaccinesTable $vaccinesTable = null) {
		if (!is_null($vaccinesTable)) {
			$this->_vaccinesTable = $vaccinesTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $travelsId parameter from the router
		$vaccinesId = $this->params()->fromRoute('vaccinesId', null);

		if ($vaccinesId === null) {
			$vaccinesData = $this->_vaccinesTable->getDonorVaccines($id);
		}
		else {
			$vaccinesData = $this->_vaccinesTable->getDonorVaccinesID($id, $vaccinesId);
		}

		if ($vaccinesData !== null && !empty($vaccinesData)) {
			return new JsonModel($vaccinesData);
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
}
