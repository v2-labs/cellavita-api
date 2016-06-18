<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Addresses\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Addresses\Model\AddressesTable;

class AddressesController extends AbstractRestfulController
{
	protected $_addressesTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(AddressesTable $addressesTable = null) {
		if (!is_null($addressesTable)) {
			$this->_addressesTable = $addressesTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $addressId parameter from the router
		$addressId = $this->params()->fromRoute('addressId', null);

		if ($addressId === null) {
			$addressData = $this->_addressesTable->getDonorAddresses($id);
		}
		else {
			$addressData = $this->_addressesTable->getDonorAddressID($id, $addressId);
		}

		if ($addressData !== null && !empty($addressData)) {
			return new JsonModel($addressData);
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
