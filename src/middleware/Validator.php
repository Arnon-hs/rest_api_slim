<?php
namespace Validator;

use DataJson\DataJson;

class Validator
{
	private $first_name;
	private $email;
	private $phone;
	public $error;
	private $data;

	public function  __construct()
	{
		$this->error = false;
		$this->data = new DataJson();
	}

	public function validate($data)
	{
		$this->validateEmail($data['email']);
		$this->validateName($data['first_name']);
		$this->validatePhone($data['phone']);

		return $data;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function validateId($id)
	{
		if(!is_numeric($id))
			$this->error_message(1);//custom code
		else
			return $id;
	}
	//todo на поля проверка

	/**
	 * @param $email
	 * @return mixed
	 */
	private function validateEmail($email)
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			$this->error_message(3);
		else
			return $this->validateUnique($email);
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	private function validateName($name)
	{
		if(!is_string($name) || strlen($name) <= 2)
			$this->error_message(4);
		else
			return $name;
	}

	/**
	 * @param $phone
	 * @return mixed
	 */
	private function validatePhone($phone)
	{
		if(!preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $phone))
			$this->error_message(5);
		else
			return $phone;
	}

	private function validateUnique($email)
	{
		foreach($this->data->getData() as $key => $node)
		{
			if(!in_array($email, $node))
				return $email;
			else
				$this->error_message(6);
		}
	}

	/**
	 * @param $code
	 * @return string
	 */
	private function error_message($code)
	{
		http_response_code(400);
		switch ($code)
		{//not exit use todo
			case 1 :
				exit ('{ "error" : "Invalid id! Please check it." } ');
			break;

			case 2 :
				exit ('{ "error" : "Invalid request form! Please check it." } ');
			break;

			case 3 :
				exit('{ "error" : "Invalid email! Please check it." } ');
			break;

			case 4 :
				exit('{ "error" : "Invalid name! Please check it." } ');
			break;

			case 5 :
				exit('{ "error" : "Invalid phone! Please check it." } ');
			break;

			case 6 :
				exit('{ "error" : "Email is not unique! Please check it." } ');
			break;
		}
	}

}