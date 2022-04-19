<?php
require_once("config/config.php");
require_once("config/database.php");


class statsModel
{
	public function get_users_number_model()
	{
		$DB = new Database();
		$query = "select * from user";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return count($data);
		}
	}
	public function get_annonces_number_model()
	{
		$DB = new Database();
		$query = "select * from annonces";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return count($data);
		}
	}

}
