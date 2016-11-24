<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Authentication\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Crypt\Password\Bcrypt;
use Authentication\Model\AuthTable;

class AuthController extends AbstractRestfulController
{
	protected $_authTable;

	public function __construct(AuthTable $authTable = null) {
		if (!is_null($authTable)) {
			$this->_authTable = $authTable;
		}
	}

	public function create($data) {
		$auth = $this->_authTable->getByLogin($data['login']);

		$bcrypt = new Bcrypt();
		if (!empty($auth) && $bcrypt->verify($data['password'],
											 $auth['password'])) {
			$result = new JsonModel(array('result' => true,
										  'errors' => null));
		}
		else {
			$result = new JsonModel(array('result' => false,
										  'errors' => 'Invalid login or password'));
		}

		return $result;
	}


}