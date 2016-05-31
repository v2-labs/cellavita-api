<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Donors\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

class DonorsTable extends AbstractTableGateway implements AdapterAwareInterface
{
	protected $table = 'donors';

	public function setDbAdapter(Adapter $adapter) {
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function getAll() {
		return $this->select()->toArray();
	}

	public function getById($id) {
		$rowset = $this->select(array('donor_id' => $id));

		return $rowset->toArray();
	}

	public function searchCpf($cpf) {
		$rowset = $this->select(function(Select $select) use (&$cpf) {
			$select->where->like('donor_cpf_num', $cpf . '%');
			$select->order('donor_id')->limit(20);
		});

		return $rowset->toArray();
	}

	public function searchName($name) {
		$rowset = $this->select(function(Select $select) use (&$name) {
			$select->where->like('donor_name', $name . '%');
			$select->order('donor_name')->limit(20);
		});

		return $rowset->toArray();
	}
}