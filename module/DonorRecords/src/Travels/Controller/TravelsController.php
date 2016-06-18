<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Travels\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Travels\Model\TravelsTable;

class TravelsController extends AbstractRestfulController
{
	protected $_travelsTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(TravelsTable $travelsTable = null) {
		if (!is_null($travelsTable)) {
			$this->_travelsTable = $travelsTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $travelsId parameter from the router
		$travelsId = $this->params()->fromRoute('travelsId', null);

		if ($travelsId === null) {
			$travelsData = $this->_travelsTable->getDonorTravels($id);
		}
		else {
			$travelsData = $this->_travelsTable->getDonorTravelsID($id, $travelsId);
		}

		if ($travelsData !== null && !empty($travelsData)) {
			return new JsonModel($travelsData);
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
