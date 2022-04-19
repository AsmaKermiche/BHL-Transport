<?php
require_once("config/config.php");
require_once("config/database.php");

class annonceModel
{
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
	public function get_annonce_poids_model(){
		$DB = new Database();
		$query = "select poids from poids_annonce";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_annonce_volume_model(){
		$DB = new Database();
		$query = "select volume from volume_annonce";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_annonce_moyen_model(){
		$DB = new Database();
		$query = "select moyen from moyen_annonce";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	function ajouter_annonce_model()
	{

		$DB = new Database();
		$date = date("d-m-Y");
		if(isset($_SESSION['id_connected_user']) && isset($_POST['depart']) && isset($_POST['arrivee']) && isset($_POST['type_transport']) && isset($_POST['poids']) && isset($_POST['volume']) && isset($_POST['moyen']) && isset($_POST['titre']) && isset($_POST['file']) && isset($_POST['content']) ){
			$arr['id_user'] = $_SESSION['id_connected_user'];
			$arr['depart'] = $_POST['depart'];
			$arr['arrivee'] = $_POST['arrivee'];
			$arr['type_transport'] = $_POST['type_transport'];
			$arr['poids'] = $_POST['poids'];
			$arr['volume'] = $_POST['volume'];
			$arr['moyen'] = $_POST['moyen'];
			$arr['titre'] = $_POST['titre'];
			$arr['content'] = $_POST['content'];
			$arr['file'] = $_POST['file'];
			$arr['date'] = $date; 
			$arr['status1'] = 'Non validée';
			$arr['status2'] = 'En cours';
			$query = "insert into annonces (id_user,titre,texte,image_path,src,dest,poids,volume,type,moyen, status1, status2, date) values (:id_user, :titre,:content,:file,:depart,:arrivee,:poids,:volume,:type_transport,:moyen,:status1, :status2, :date)";
			$data = $DB->write($query, $arr);
			if ($data) {
				return $data;
			}
		}
	}
	public function get_annonces_user_model($id_user)
	{
		$DB = new Database();
		$query = "select * from annonces where id_user = $id_user";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_list_model()
	{
		$src = $_GET['src'];
		$dest = $_GET['dest'];
		if (isset($src) && isset($dest)) {
			$DB = new Database();
			$DB = $DB->db_connect();
			$query = "SELECT * FROM user WHERE adrsrc LIKE '%$src%' && adrdest LIKE '%$dest%' ";
			$statement = $DB->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;
		}
	}

	public function get_list_trasnporteurs_postules_model()
	{
		$id_annonce = $_GET['id_annonce'];
		if (isset($id_annonce)) {
			$DB = new Database();
			$DB = $DB->db_connect();
			$query = "SELECT u.*
					FROM user u
					INNER JOIN trasporteurs_postules tp
					ON(u.id_user = tp.id_transporteur)
					WHERE tp.id_annonce = $id_annonce ";
			$statement = $DB->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;
		}
	}

	public function envoyer_confirmation_transporteur_model()
	{
		$DB = new Database();
		$arr['id_client'] = "";
		$arr['id_annonce'] = "";
		$arr['id_transporteur'] = "";
		$arr['cas'] = "";
		if (isset($_POST['accepter']) || isset($_POST['contacter'])) {
			$arr['id_client'] = $_SESSION['id_connected_user'];
			$arr['id_annonce'] = $_GET['id_annonce'];
			if (isset($_POST['accepter'])) {
				$arr['id_transporteur'] = $_GET['id_transporteur_postule'];
				$arr['cas'] = "postule";
			}
			if (isset($_POST['contacter'])) {
				$arr['id_transporteur'] = $_GET['id_transporteur_contact'];
				$arr['cas'] = "contact";
			}
		}
		$query = "insert into demande (id_transporteur, id_annonce, id_client, cas) values (:id_transporteur, :id_annonce, :id_client, :cas)";
		$data = $DB->write($query, $arr);
		if ($data) {
			return $data;
		}
	}
	public function get_demandes_confirmation_transporteurs_postule_model()
	{
		$DB = new Database();
		if (isset($_SESSION['id_connected_user'])) {
			$arr['id_transporteur'] = $_SESSION['id_connected_user'];
			$query = "SELECT ann.*
			FROM annonces ann
			INNER JOIN demande dmd
			ON(ann.id_annonce = dmd.id_annonce)
			WHERE dmd.id_transporteur = :id_transporteur && cas='postule' ";			
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
				return $data;
				die;
			}
		}
	}
	public function get_demandes_confirmation_transporteurs_contact_model()
	{
		$DB = new Database();
		if (isset($_SESSION['id_connected_user'])) {
			$arr['id_transporteur'] = $_SESSION['id_connected_user'];
			$query = "SELECT ann.*
			FROM annonces ann
			INNER JOIN demande dmd
			ON(ann.id_annonce = dmd.id_annonce)
			WHERE dmd.id_transporteur = :id_transporteur && cas='contact' ";			
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
				return $data;
				die;
			}
		}
	}
	public function inserer_transaction_model()
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		$check = false; 
		if (isset($_POST['transporter']) && isset($_SESSION['id_connected_user'])) {
			$status = "Terminée";
			$id_transporteur = $_SESSION['id_connected_user'];
			$id_annonce = $_GET['id_annonce'];
			$query = 'UPDATE annonces SET status2 = :status, id_transporteur = :id_transporteur WHERE id_annonce = :id_annonce';
			$statement = $DB->prepare($query);
			$statement->bindValue(':status', $status);
			$statement->bindValue(':id_annonce', $id_annonce);
			$statement->bindValue(':id_transporteur', $id_transporteur);
			if ($statement->execute()) {
				$check = true;
			};
		}
		return $check;
	}
	public function get_transactions_client_model()
	{
		$id_user = $_SESSION['id_connected_user'];
		$DB = new Database();
		$query = "select * from annonces where id_user = $id_user && status2 = 'Terminée'";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function get_transactions_transporteur_model()
	{
		$id_user = $_SESSION['id_connected_user'];
		$DB = new Database();
		$query = "select * from annonces where (id_user = $id_user || id_transporteur = $id_user)  && status2 = 'Terminée'";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function noter_transport_model(){
		$DB = new Database();
		$DB = $DB->db_connect();
		$check = false; 
		if (isset($_POST['noter']) && isset($_POST['note']) ) {
			$note = $_POST['note'];
			$id_annonce = $_GET['id_annonce'];
			$query = 'UPDATE annonces SET note = :note WHERE id_annonce = :id_annonce';
			$statement = $DB->prepare($query);
			$statement->bindValue(':note', $note);
			$statement->bindValue(':id_annonce', $id_annonce);
			if ($statement->execute()) {
				$check = true;
			};
		}
		return $check;
	}
	
}