<?php
require_once("config/config.php");
require_once("config/database.php");


class profilModel
{
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
	function update_user_profil_model()
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		$src = "";
		$dest = "";
		if (isset($_POST['username'])) {
			$id_user = $_SESSION['id_connected_user'];
			$username = $_POST['username'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$email = $_POST['email'];
			$phone_number = $_POST['phone_number'];
			$adress = $_POST['adress'];
			$password = $_POST['password'];
			if(isset($_POST['src']) && isset($_POST['src'])){
			$src = $_POST['src'];
			$dest = $_POST['dest'];
		}
			$query = 'UPDATE user  SET username = :username, prenom = :prenom, nom = :nom, email = :email, numero_telephone= :phone_number, adresse_principale = :adress, mot_de_passe = :motdepass, adrsrc = :adrsrc, adrdest = :adrdest WHERE id_user = :id';
			$statement = $DB->prepare($query);
			$statement->bindValue(':id', $id_user);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':prenom', $prenom);
			$statement->bindValue(':nom', $nom);
			$statement->bindValue(':email', $email);
			$statement->bindValue(':phone_number', $phone_number);
			$statement->bindValue(':adress', $adress);
			$statement->bindValue(':motdepass', $password);
			$statement->bindValue(':adrsrc', $src);
			$statement->bindValue(':adrdest', $dest);
			if ($statement->execute()) {
				$check = true;
			};
			$statement->closeCursor();
			return $check;
		}
	}
	

}
