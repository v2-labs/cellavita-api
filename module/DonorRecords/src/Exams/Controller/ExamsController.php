<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Exams\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Exams\Model\ExamsTable;

class ExamsController extends AbstractRestfulController
{
	protected $_examsTable;

	protected function methodNotAllowed() {
		$this->response->setStatusCode(
			\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405
		);
	}

	public function __construct(ExamsTable $examsTable = null) {
		if (!is_null($examsTable)) {
			$this->_examsTable = $examsTable;
		}
	}

	public function get($id) {
		// The $id here represents the Donor ID, as we should collect the
		// $cellId parameter from the router
		$examId = $this->params()->fromRoute('examId', null);

		if ($examId === null) {
			$examData = $this->_examsTable->getDonorExams($id);
		}
		else {
			$examData = $this->_examsTable->getDonorExamID($id, $examId);
		}

		if ($examData !== null && !empty($examData)) {
			return new JsonModel($examData);
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
