<?php
namespace Validator;

use DataJson\DataJson;

class Validator
{
	private $data;

	/**
	 * Validator constructor.
	 */
	public function  __construct()
	{
		$this->data = new DataJson();
	}

	/**
	 * @param $data
	 * @return mixed
	 */
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
		if(!preg_match("/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/", $phone) || strlen($phone) > 15)
			$this->error_message(5);
		else
			return $phone;
	}

	/**
	 * @param $email
	 * @return mixed
	 */
	private function validateUnique($email)
	{
		$data = $this->data->getData();
		foreach($data as $key => $node)
		{
			if(!in_array($email, $node))
				return $email;
			else
				$this->error_message(6);
		}
	}

	/**
	 * @param $code
	 * @param $error = null
	 */
	private function error_message($code, $error = null)
	{
		switch ($code)
		{
			case 1 :
				$error = ["error" => "Invalid id! Please check it."];
			break;

			case 2 :
				$error = ["error" => "Invalid request form! Please check it." ];
			break;

			case 3 :
				$error = ["error" => "Invalid email! Please check it."];
			break;

			case 4 :
				$error = ["error" => "Invalid name! Please check it."];
			break;

			case 5 :
				$error = ["error" => "Invalid phone! Please check it."];
			break;

			case 6 :
				$error = ["error" => "Email is not unique! Please check it."];
			break;
		}

		header("Content-type: application/json; charset=utf-8");
		http_response_code(400);
		exit(json_encode($error));
	}

}