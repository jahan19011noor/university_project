<?php

	class Validation
	{
		private $_passed = false,
				$_errors = array(),
				$_db = null;
				
		public function __construct()
		{
			$this->_db = DB::singleton();
		}
		
		public function check($source, $items = array())
		{
			foreach($items as $item => $rules)
			{
				foreach($rules as $rule => $rule_value)
				{
					//echo "{$item} {$rule} must be {$rule_value} <br>";
					$value = trim($source[$item]);
					$name = $rules['name'];
					//$item = trim($item);
					
					if($rule === 'required' && empty($value))
					{
						$this->addError("'{$name}' is required");
					}
					else if(!empty($value))
					{
						switch($rule)
						{
							case 'min':
								if(strlen($value) < $rule_value)
								{
									$this->addError("{$name} must be at least {$rule_value} characters.");
								}
								break;
							
							case 'max':
								if(strlen($value) > $rule_value)
								{
									$this->addError("{$name} must be less than {$rule_value} characters.");
								}
								break;
							
							case 'matches':
								if($value !== $source[$rule_value])
								{
									$this->addError("'{$name}' must match '{$rule_value}'");
								}
								break;
								
							case 'unique':
								if($this->_db->get($rule_value, array($item, "=", $value))->count())
								{
									$this->addError("the {$item} '{$value}' already exists in table {$rule_value} in the database.");
								}
								break;
								
							case 'valid':
								if(filter_var($value, FILTER_VALIDATE_EMAIL) === false)
								{
									$this->addError("This {$name} is not {$rule_value}");
								}
								break;
							
							case 'exists':
								if(!$this->_db->get($rule_value, array($item, "=", $value))->count())
								{
									$this->addError("{$name} does not exist.");
								}
								break;
							case 'same_as':
								if(Hash::make($value, $this->_db->first()->salt) === $this->_db->first()->password)
								{
									$this->addError("Your current password is invalid.");
								}
								break;
							case 'found':
								if(!$this->_db->get($rule_value, array($item, "=", $value))->count())
								{
									$this->addError("the {$item} '{$value}' does not exists in table {$rule_value} in the database.");
								}
								break;
							case 'in_array':
								if(!in_array($value, array('gif','png','jpg','jpeg')))
								{
									$this->addError("The file is not a valid image file.");
								}
								break;
							case 'maximum':
								if($value > $rule_value)
								{
									$this->addError("The file size should be within 2mb.");
								}
								break;
							case 'equal':
								if(strlen($value) > $rule_value || strlen($value) < $rule_value)
								{
									$this->addError("The {$item} is not valid.");
								}
								break;
							case 'numeric':
								if(!is_numeric($value))
								{
									$this->addError("The {$item} is not valid.");
								}
								break;
							case 'equal_to':
								if($array = explode(", ", $rule_value))
								{
									if(!in_array($value, $array))
									{
										$this->addError("The {$item} is not valid.");
									}
								}
							case 'smaller_than':
								if($value > $rule_value)
								{
									$this->addError("The {$name} is not valid.");
								}
						}
					}
				}
			}
			if(empty($this->errors()))
			{
				$this->_passed = true;
			}
			return $this;
		}
		
		private function addError($error)
		{
			$this->_errors[] = $error;
		}
		
		public function errors()
		{
			return $this->_errors;
		}
		
		public function passed()
		{
			return $this->_passed;
		}
	}

?>