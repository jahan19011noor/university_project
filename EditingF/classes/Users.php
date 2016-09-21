<?php

	class Users
	{
		private $_db, //we need the DB object;
				$_data,
				$_sessionName,
				$_cookieName,
				$_isLoggedIn;
		
		public function __construct($user = null)
		{
			$this->_db = DB::singleton();
			//about the null string
			/*
				we may want to grab the db info about a 
				specific user or may want to grab it for
				all users in the db.
				if we want to do the first, then we may 
				only send the user's specific info, like
				username, to grab the data from the table
					otherwise we may send nothing for the argument.
						keeps space for the specific info grabing.
			*/
			
			$this->_sessionName = Config::get('session/session_name');
			$this->_cookieName = Config::get('remember/cookie_name');
			
			if(!$user)
			{
				if(Session::exists($this->_sessionName))
				{
					$user = Session::get($this->_sessionName);
					if($this->find($user))
					{
						$this->_isLoggedIn = true;
					}
					else
					{
						$this->logout();
					}
				}
			}
			else
			{
				if($this->find($user))
				{
					return $this;
				}
			}
		}
		
		public function update($fields = array(), $id = null)
		{
			if(!$id && $this->isLoggedIn())
			{
				$id = $this->data()->id;
			}
			if(!$this->_db->update('users', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function updatestudent($fields = array(), $id = null)
		{
			if(!$this->_db->update('students', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function updateteacher($fields = array(), $id = null)
		{
			if(!$this->_db->update('teachers', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function updatestaff($fields = array(), $id = null)
		{
			if(!$this->_db->update('staffs', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function updategroup($fields = array(), $id = null)
		{
			if(!$this->_db->update('groups', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function updatepicnic($fields = array(), $id = null)
		{
			if(!$this->_db->update('picnic_img', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function update11result($fields = array(), $id = null)
		{
			if(!$this->_db->update('11_result', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function update12result($fields = array(), $id = null)
		{
			if(!$this->_db->update('12_result', $id, $fields))
			{
				throw new Exception('There was problem updating.');
			}
		}
		
		public function logout()
		{
			$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
			Session::delete($this->_sessionName);
			Cookie::delete($this->_cookieName);
		}
		
		public function create($fields)
		{
			if(!$this->_db->insert('users', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function teachers($fields)
		{
			if(!$this->_db->insert('teachers', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function students($fields)
		{
			if(!$this->_db->insert('students', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function staffs($fields)
		{
			if(!$this->_db->insert('staffs', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function groups($fields)
		{
			if(!$this->_db->insert('groups', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function ffstudents($fields)
		{
			if(!$this->_db->insert('11_students', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function fsstudents($fields)
		{
			if(!$this->_db->insert('12_students', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function ffresult($fields)
		{
			if(!$this->_db->insert('11_result', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function post($fields)
		{
			if(!$this->_db->insert('post', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function fsresult($fields)
		{
			if(!$this->_db->insert('12_result', $fields))
			{
				throw new Exception('There was a problem creating the account.');
			}
		}
		
		public function find($user = null)
		{
			if($user)
			{
				$field = (is_numeric($user)) ? 'id' : 'username';
				$data = $this->_db->get('users', array($field, '=', $user));
				
				if($data->count())
				{
					$this->_data = $data->first();
					return true;
				}
			}
			return false;
		}
		
		public function login($username = null, $password = null, $remember = false)
		{
			if(is_numeric($username))
			{
				Session::put($this->_sessionName, $username);
				return true;
			}
			else
			{
				$user = $this->find($username);
				if($user)
				{
					if($this->data()->password === Hash::make($password, $this->data()->salt))
					{
						Session::put($this->_sessionName, $this->data()->id);
						
						if($remember)
						{
							$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
							
							if(!$hashCheck->count())
							{
								$hash = Hash::unique();
							
								$this->_db->insert('users_session', array
								(
									'user_id' => $this->data()->id,
									'hash' => $hash
								));
							}
							else
							{
								$hash = $hashCheck->first()->hash;
							}
							
							Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
						}
						return true;
					}
					else
					{
						throw new Exception("Invalid Password!");
					}
				}
			}
			return false;
		}
		
		public function exists()
		{
			return (!empty($this->_data)) ? true : false;
		}
		
		public function hasPermission()
		{
			$group = $this->_db->get('groups', array('user_id', '=', $this->data()->id));
			if($group->count())
			{
				$permission = $group->first()->permission;
				
				/*if($key == array_keys($permissions)[0] && $permissions[$key] == true)
				{
					//echo 'ok';
					return true;
				}*/
			}
			return false;
		}
		
		public function data()
		{
			return $this->_data;
		}
		
		public function isLoggedIn()
		{
			return $this->_isLoggedIn;
		}
	}

?>