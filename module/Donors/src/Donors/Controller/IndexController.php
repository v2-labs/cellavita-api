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

class IndexController extends AbstractRestfulController
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

	public function get($cpf) {
		$donorData = $this->_donorsTable->getByCpf($cpf);

		if ($donorData !== null) {
			return new JsonModel($donorData->getArrayCopy());
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
