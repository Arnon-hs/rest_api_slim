<?php
namespace DataJson;

class DataJson
{
	private $fileName;

	public function __construct()
	{
		$this->fileName = $_SERVER['DOCUMENT_ROOT'] . '/data/data.json';
	}

	public function getData()
	{
		try {
			$file = file_get_contents($this->fileName);         // Открыть файл data.json
			return json_decode($file, TRUE);               // Декодировать в массив
		}
		catch (\Exception $e)//maybe return code
		{
			return json_decode('Error with read a file: '. $e);//todo json
		}
	}

	public function putData($data)
	{
		try{
			file_put_contents($this->fileName, json_encode($data));
			return true;
		}
		catch (\Exception $e)
		{
			return 'Error with write to file: '. $e;
		}
	}

}