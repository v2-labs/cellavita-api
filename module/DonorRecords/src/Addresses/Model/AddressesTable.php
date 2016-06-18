<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Addresses\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

class AddressesTable extends AbstractTableGateway implements AdapterAwareInterface
{
	protected $table = 'addresses';

	public function setDbAdapter(Adapter $adapter) {
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function getDonorAddresses($id) {
		$rowset = $this->select(array('donor_id' => $id));

		return $rowset->toArray();
	}

	public function getDonorAddressID($id, $addressId) {
		$rowset = $this->select(array('donor_id' => $id,
									  'address_id'  => $addressId));

		return $rowset->toArray();
	}
}
