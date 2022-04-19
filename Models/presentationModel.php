<?php
require_once("config/config.php");
require_once("config/database.php");

class presentationModel
{
	public function get_presentation_model()
	{
		$DB = new Database();
		$query = "select * from presentation";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
}