<?php
require_once("config/config.php");
require_once("config/database.php");


class adminModel
{
	public function get_categories_model()
	{
		$DB = new Database();

		$query = "select * from admin_categories";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}
	public function get_all_users_model()
	{
		$DB = new Database();

		$query = "select * from user";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}
	public function get_user_by_id_model()
	{
		$DB = new Database();
		$_SESSION['error'] = "";
		if (isset($_GET['id_user'])) {

			$arr['id'] = $_GET['id_user'];

			$query = "select * from user where id_user = :id limit 1";
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
	public function get_all_transporteurs_model()
	{
		$DB = new Database();

		$query = "select * from user where role = 'transporteur'";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}
	public function get_all_clients_model()
	{
		$DB = new Database();

		$query = "select * from user where role = 'client'";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}

	public function update_transporteur_status_model($id_transporteur)
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		$check = false;
		if (isset($_POST['status']) && ($_POST['documents'] != "")) {
			$status = $_POST['status'];
			$documents = $_POST['documents'];
			$query = 'UPDATE user SET liste_documents = :documents, status1 = :status1 WHERE id_user = :id';
			$statement = $DB->prepare($query);
			$statement->bindValue(':documents', $documents);
			$statement->bindValue(':status1', $status);
			$statement->bindValue(':id', $id_transporteur);
			if ($statement->execute()) {
				$check = true;
			};
		} elseif (isset($_POST['status']) && ($_POST['justificatif'] != "")) {
			$status = $_POST['status'];
			$justificatif = $_POST['justificatif'];
			$query = 'UPDATE user SET justificatif = :justificatif, status1 = :status1 WHERE id_user = :id';
			$statement = $DB->prepare($query);
			$statement->bindValue(':justificatif', $justificatif);
			$statement->bindValue(':status1', $status);
			$statement->bindValue(':id', $id_transporteur);
			if ($statement->execute()) {
				$check = true;
			};
		}
		return $check;
	}

	public function get_transporteur_status_model($id_transporteur)
	{
		$DB = new Database();
		$query = "select status1, status2 from user where id_user = $id_transporteur";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {
			return $data;
			die;
		}
	}
	public function get_all_annonces_model()
	{
		$DB = new Database();

		$query = "select * from annonces";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}
	public function get_all_annonces_non_validees_model()
	{
		$DB = new Database();

		$query = "select * from annonces where status1 = 'Non validée'";
		$data = $DB->read($query, $arr = []);
		if (is_array($data)) {

			return $data;
			die;
		}
	}
	public function valider_annonce_model($id_annonce)
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		$check = false;
		print_r($id_annonce);
		if (isset($_POST['valider'])) {
			$status = "Validée";
			$query = 'UPDATE annonces SET status1 = :status WHERE id_annonce = :id';
			$statement = $DB->prepare($query);
			$statement->bindValue(':status', $status);
			$statement->bindValue(':id', $id_annonce);
			if ($statement->execute()) {
				$check = true;
				print_r("done");
			};
		}
		return $check;
	}
	public function login_admin_model()
	{
		$DB = new Database();
		if (isset($_POST['username_admin']) && isset($_POST['password_admin'])) {

			$arr['username_admin'] = $_POST['username_admin'];
			$arr['password_admin'] = $_POST['password_admin'];

			$query = "select * from admin_login where username_admin = :username_admin && password_admin = :password_admin limit 1";
			$data = $DB->read($query, $arr);
			if (is_array($data)) {
				return $data;
				die;
			}
		}
	}
	public function get_all_news_model()
	{
		$DB = new Database();
		$query = "select * from news";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}
	public function add_news_model(){
		$DB = new Database();
		$date = date("d-m-Y");
		if(isset($_POST['titre']) && isset($_POST['content']) && isset($_POST['file'])){
			$arr['titre'] = $_POST['titre'];
			$arr['content'] = $_POST['content'];
			$arr['image'] = $_POST['file'];
			$arr['date'] = $date;
			print_r($arr);
			$query = "insert into news (titre, image_path, texte, date) values (:titre, :image, :content, :date)";
			$data = $DB->write($query, $arr);
			if ($data) {
				return $data;
			}
		}
	}
	function update_presentation_model()
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		if (isset($_POST['presentation'])) {
			$content = $_POST['content'];
			$image = $_POST['image'];
			$video = $_POST['video'];
			$query = 'UPDATE presentation  SET texte = :content, image_path = :image, video_path = :video';
			$statement = $DB->prepare($query);
			$statement->bindValue(':content', $content);
			$statement->bindValue(':image', $image);
			$statement->bindValue(':video', $video);
			if ($statement->execute()) {
				$check = true;
			};
			$statement->closeCursor();
			return $check;
		}
	}
	function update_contact_model()
	{
		$DB = new Database();
		$DB = $DB->db_connect();
		if (isset($_POST['contact'])) {
			$phone_number = $_POST['phone_number'];
			$email = $_POST['email'];
			$adress = $_POST['adress'];
			$query = 'UPDATE contact  SET numero_telephone = :phone_number, email_admin = :email, address_admin = :adress';
			$statement = $DB->prepare($query);
			$statement->bindValue(':phone_number', $phone_number);
			$statement->bindValue(':email', $email);
			$statement->bindValue(':adress', $adress);
			if ($statement->execute()) {
				$check = true;
			};
			$statement->closeCursor();
			return $check;
		}
	}
	public function get_all_signalements_model()
	{
		$DB = new Database();
		$query = "select * from signalements";
		$arr = [];
		$data = $DB->read($query, $arr);
		if (is_array($data)) {
			return $data;
		}
	}

}
