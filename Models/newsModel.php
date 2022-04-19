<?php
require_once("config/config.php");
require_once("config/database.php");
Class newsModel {

    public function get_news_model($id_news)
	{
		$DB = new Database();
		$query = "select * from news where id_news = $id_news";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}




}