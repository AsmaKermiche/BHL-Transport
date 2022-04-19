<?php
require_once("config/config.php");
require_once("config/database.php");


class homeModel
{
	public function get_annonces_model()
	{
		$DB = new Database();
					//add where status= true
		$query = "select * from annonces ORDER BY RAND() LIMIT 8";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_annonce_complete_model($id_annonce)
	{
		$DB = new Database();
		$query = "select * from annonces where id_annonce = $id_annonce";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_annonces_search_model($POST)
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		if (isset($POST['adrsrc']) && isset($POST['adrdest'])) {

			$arr['adrsrc'] = $POST['adrsrc'];
			$arr['adrdest'] = $POST['adrdest'];
			//add where status= true
			$query = "select * from annonces where src = :adrsrc && dest = :adrdest";
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
				return $data;
				die;
			}
		}
	}
	public function get_news_model()
	{
		$DB = new Database();

			$query = "select * from news";
			$data = $DB->read($query, $arr=[]);
			if (is_array($data)) {
			
				return $data;
				die;
			}
	}

}
