<?php
require_once("config/config.php");
require_once("config/database.php");


class contactModel
{
	public function get_contact_model()
	{
		$DB = new Database();

			$query = "select * from contact";
			$data = $DB->read($query, $arr=[]);
			if (is_array($data)) {
			
				return $data;
				die;
			}
        }

}
