<?php

namespace Vaccines\Model\Entity;

class Vaccine
{
	protected $_id;

	public function __construct(array $options = null) {
		# ..
		if (is_array($options)) {
			$this->setOptions($options);
		}
	}

	public function __set($name, $value) {
		$method = 'set' . $name;
		if (!method_exists($this, $method)) {
			throw new Exception('Invalid Method ' . $method);
		}
		$this->$method($value);
	}

	public function __get($name) {
		$method = 'get' . $name;
		if (!method_exists($this, $method)) {
			throw new Exception('Invalid Method ' . $method);
		}
		$this->$method();
	}

	public function setOptions(array $options) {
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}

	public function getId() {
		return $this->_id;
	}

	public function setId($id) {
		$this->_id = $id;
		return $this;
	}
}