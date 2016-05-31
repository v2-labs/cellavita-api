<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Telephones\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Telephones\Model\TelephonesTable;

class TelephonesController extends AbstractRestfulController
{
	protected $_telephonesTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(TelephonesTable $telephonesTable = null) {
		if (!is_null($telephonesTable)) {
			$this->_telephonesTable = $telephonesTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $phoneId parameter from the router
		$phoneId = $this->params()->fromRoute('phoneId', null);

		if ($phoneId === null) {
			$telephoneData = $this->_telephonesTable->getDonorPhones($id);
		}
		else {
			$telephoneData = $this->_telephonesTable->getDonorPhoneID($id, $phoneId);
		}

		if ($telephoneData !== null && !empty($telephoneData)) {
			return new JsonModel($telephoneData);
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
