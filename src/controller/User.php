<?php
namespace User;

use DataJson\DataJson;
use Validator\Validator;

class User
{
    private $data;
	private $validator;

	/**
	 * User constructor.
	 */
    public function __construct()
    {
		$this->validator = new Validator();
		$this->data = new DataJson();
    }

	/**
	 * @return mixed
	 */
    public function all()
	{
		return $this->data->getData();
    }

	/**
	 * @param $id
	 * @return array|\Exception
	 */
    public function get($id)
    {
       try
	   {
	   		$id = $this->validator->validateId($id);
			$data = $this->data->getData();

			foreach($data as $key => $node)
			{
				if(in_array($id, $node))
					return $node;
			}

			return ['Error' => 'User not found!'];
	   }
	   catch (\Exception $e)
	   {
		   return ["Error" => $e->getMessage()];
	   }
    }

	/**
	 * @param $user
	 * @return array|\Exception
	 */
    public function post($user)
	{
		try
		{
			$user = $this->validator->validate($user);
			$data = $this->data->getData();
			$user['id'] = random_int(100000, 999999) + time();
			$data[] = $user;

			if($this->data->putData($data))
				return ["Success" => "User added!"];
		}
		catch (\Exception $e)
		{
			return ["Error" => $e->getMessage()];
		}
	}

	/**
	 * @param $user
	 * @return array|\Exception
	 */
    public function put($user)
    {
		try
		{
			$user['id'] = $this->validator->validateId($user['id']);
			$user = $this->validator->validate($user);
			$data = $this->data->getData();

			foreach ($data as $key => $node)
			{
				if($node["id"] == $user["id"])
				{
					$data[$key] = $user;

					if ($this->data->putData($data))
						return ["Success" => "User updated!"];
					else
						return ["Error" => "Error with update user!"];
				}
			}

			return ["Error" => "User not found!"];
		}
		catch (\Exception $e)
		{
			return ["Error" => $e->getMessage()];
		}
    }

	/**
	 * @param $id
	 * @return array|\Exception
	 */
    public function delete($id)
    {
		try
		{
			$id = $this->validator->validateId($id);
			$data = $this->data->getData();

			foreach ($data as $key => $node)
			{
				if(in_array($id, $node))
				{
					unset($data[$key]);

					if($this->data->putData($data))
						return ["Success" => "User deleted!"];
					else
						return ["Error" => "Error with delete user!"];
				}
			}

			return ["Error" => "Error with delete user - Not found!"];
		}
		catch (\Exception $e)
		{
			return ["Error" => $e->getMessage()];
		}
    }
}