<?php
require_once("config/config.php");
require_once("config/database.php");


class tranporteurModel
{
	public function insert_demande_postuler_model()
	{
		$DB = new Database();
		if(isset($_GET['id_annonce']) && isset($_GET['id_transporteur']) && isset($_GET['id_client'])){
		$arr['id_annonce'] = $_GET['id_annonce'];
		$arr['id_client'] = $_GET['id_client'];
		$arr['id_transporteur'] = $_GET['id_transporteur'];
		$query = "insert into trasporteurs_postules (id_annonce,id_client,id_transporteur) values (:id_annonce,:id_client,:id_transporteur)";
		$data = $DB->write($query, $arr);
		if ($data) {
			return $data;
			die;
		}
	}
	}
}
