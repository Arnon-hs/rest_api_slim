<?php
namespace User;

use DataJson\DataJson;
use Validator\Validator;

class User
{
    private $data;
	private $validator;

    public function __construct()
    {
		$this->validator = new Validator();
		$this->data = new DataJson();
    }

    public function all()
	{
		return $this->data->getData();
    }

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
	   		return $e; //todo
	   }
    }
//todo validate
    public function post($user)
	{
		try
		{
			$user = $this->validator->validate($user);
			$data = $this->data->getData();
			$data[] = $user;
			if($this->data->putData($data))
				return ["Success" => "User added!"];
		}
		catch (\Exception $e)
		{
			return $e; //todo
		}
	}

    public function put()
    {

    }

    public function delete()
    {

    }
}