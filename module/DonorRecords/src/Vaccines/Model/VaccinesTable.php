<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Vaccines\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

class VaccinesTable extends AbstractTableGateway implements AdapterAwareInterface
{
	protected $table = 'vaccines';

	public function setDbAdapter(Adapter $adapter) {
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function getDonorVaccines($id) {
		$rowset = $this->select(array('donor_id' => $id));

		return $rowset->toArray();
	}

	public function getDonorVaccinesID($id, $vaccinesId) {
		$rowset = $this->select(array('donor_id' => $id,
									  'vaccines_id'  => $vaccinesId));

		return $rowset->toArray();
	}
}
