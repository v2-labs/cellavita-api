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

class IndexController extends AbstractRestfulController
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
		$telephonesData = $this->_telephonesTable->getById($id);

		if ($telephonesData !== null) {
			return new JsonModel($telephonesData->getArrayCopy());
		}
		else {
			throw new \Exception('Telephone not found', 404);
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
