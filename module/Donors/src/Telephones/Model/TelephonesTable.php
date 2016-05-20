<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Telephones\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

class TelephonesTable extends AbstractTableGateway implements AdapterAwareInterface
{
	protected $table = 'telephones';

	public function setDbAdapter(Adapter $adapter) {
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function getById($id) {
		$rowset = $this->select(array('donor_id' => $id));

		return $rowset->current();
	}

	//public function getByName($name) {
	//	$rowset = $this->select(array('donor_name' => $name));

	//	return $rowset->current();
	//}
}