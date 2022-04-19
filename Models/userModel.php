<?php
require_once("config/config.php");
require_once("config/database.php");


class UserModel
{
	public function login($POST)
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		if (isset($POST['username']) && isset($POST['password'])) {

			$arr['username'] = $POST['username'];
			$arr['password'] = $POST['password'];

			$query = "select * from user where username = :username && mot_de_passe = :password limit 1";
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
			
				return $data;
				die;
			} else {

				$_SESSION['error'] = "wrong username or password";
			}
		} else {

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}
	public function logout(){
		session_destroy();
		echo 'Vous a été déconnectés, <a href="loginRouter.php">Connectez à nouveau</a>';
	}
	
	function signup()
	{

		$DB = new Database();

		$_SESSION['error'] = "";
		if (isset($_POST['username']) && isset($_POST['checkbox-1']) && isset($_POST['adrsrc']) && isset($_POST['adrdest']) && isset($_POST['checkbox-2'])) {
			$arr['nom'] = $_POST['nom'];
			$arr['prenom'] = $_POST['prenom'];
			$arr['email'] = $_POST['email'];
			$arr['phonenumber'] = $_POST['phonenumber'];
			$arr['username'] = $_POST['username'];
			$arr['address'] = $_POST['address'];
			$arr['password'] = $_POST['password'];
			$arr['adrsrc'] = $_POST['adrsrc'];
			$arr['adrdest'] = $_POST['adrdest'];
			$query = "insert into user (username,nom,prenom,email,numero_telephone,adresse_principale,mot_de_passe,role,adrsrc,adrdest,status1) values (:username,:nom,:prenom,:email,:phonenumber,:address,:password,'transporteur',:adrsrc,:adrdest,'En attente')";
			$data = $DB->write($query, $arr);
			if ($data) {
				$role = 'transporteur';
				return $role;
				die;
			}
		}
		elseif (isset($_POST['username']) && isset($_POST['checkbox-1']) && isset($_POST['adrsrc']) && isset($_POST['adrdest']) && !isset($_POST['checkbox-2'])) {
			$arr['nom'] = $_POST['nom'];
			$arr['prenom'] = $_POST['prenom'];
			$arr['email'] = $_POST['email'];
			$arr['phonenumber'] = $_POST['phonenumber'];
			$arr['username'] = $_POST['username'];
			$arr['address'] = $_POST['address'];
			$arr['password'] = $_POST['password'];
			$arr['adrsrc'] = $_POST['adrsrc'];
			$arr['adrdest'] = $_POST['adrdest'];
			$query = "insert into user (username,nom,prenom,email,numero_telephone,adresse_principale,mot_de_passe,role,adrsrc,adrdest,status2) values (:username,:nom,:prenom,:email,:phonenumber,:address,:password,'transporteur',:adrsrc,:adrdest,'En attente')";
			$data = $DB->write($query, $arr);
			if ($data) {
				$role = 'transporteur';
				return $role;
				die;
			}
		}
		elseif (isset($_POST['username']) && !isset($_POST['checkbox-1'])) {
			$arr['nom'] = $_POST['nom'];
			$arr['prenom'] = $_POST['prenom'];
			$arr['email'] = $_POST['email'];
			$arr['phonenumber'] = $_POST['phonenumber'];
			$arr['username'] = $_POST['username'];
			$arr['address'] = $_POST['address'];
			$arr['password'] = $_POST['password'];
			$query = "insert into user (username,nom,prenom,email,numero_telephone,adresse_principale,mot_de_passe,role,adrsrc,adrdest) values (:username,:nom,:prenom,:email,:phonenumber,:address,:password,'client','','')";
			$data = $DB->write($query, $arr);
			if ($data) {
				$role = 'client';
				return $role;
				die;
			}
		}
	}
	public function get_user_by_id_model()
	{
		$DB = new Database();
		$_SESSION['error'] = "";
		if (isset($_SESSION['id_connected_user'])) {

			$arr['id'] = $_SESSION['id_connected_user'];
			$query = "select * from user where id_user = :id limit 1";
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
				return $data;
				die;
			}
		}
	}
	public function get_user_by_id_modell($id_user)
	{
		$DB = new Database();
		$arr['id'] = $id_user;
		$query = "select * from user where id_user = :id limit 1";
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
			die;
		}
	}
	public function signaler_user_model(){

		$DB = new Database();
		if (isset($_GET['id_annonce']) && isset($_GET['id_signale']) && isset($_SESSION['id_connected_user']) && isset($_POST['signaler'])) {
			$arr['id_annonce'] = $_GET['id_annonce'];
			$arr['id_signaleur'] = $_SESSION['id_connected_user']; 
			$arr['id_signale'] = $_GET['id_signale']; 
			$signaleur = $this->get_user_by_id_modell($arr['id_signaleur']);
			$arr['username_signaleur'] = $signaleur[0]->username;
			$signale = $this->get_user_by_id_modell($arr['id_signale']);
			$arr['username_signale'] = $signale[0]->username;
			$arr['texte'] = $_POST['texte'];
			$user = $this->get_user_by_id_model();
			$arr['role'] = $user[0]->role;
			$query = "insert into signalements (id_signaleur, username_signaleur, id_signale, username_signale, id_annonce,role_signaleur,texte_signalement) values (:id_signaleur, :username_signaleur, :id_signale, :username_signale,:id_annonce,:role,:texte)";
			$data = $DB->write($query, $arr);
			if ($data) {
				return $data;
				die;
			}
		}

	}
}