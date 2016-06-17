<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cells\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Cells\Model\CellsTable;

class CellsController extends AbstractRestfulController
{
	protected $_cellsTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(CellsTable $cellsTable = null) {
		if (!is_null($cellsTable)) {
			$this->_cellsTable = $cellsTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $cellId parameter from the router
		$cellId = $this->params()->fromRoute('cellId', null);

		if ($cellId === null) {
			$cellData = $this->_cellsTable->getDonorCells($id);
		}
		else {
			$cellData = $this->_cellsTable->getDonorCellID($id, $cellId);
		}

		if ($cellData !== null && !empty($cellData)) {
			return new JsonModel($cellData);
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
