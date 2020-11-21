<?php
	if (!isset($_SESSION)) {
    session_start();
	}
	include "connectionController.php";
	if(isset($_POST['action'])){
		$CategoryController = new CategoryController();
		switch ($_POST['action']) {
			case 'store':
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$status = strip_tags($_POST['status']);
				$CategoryController->store($name, $description, $status);
			break;
			case 'update':
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$status = strip_tags($_POST['status']);
				$id = strip_tags($_POST['id']);
				$CategoryController->update($id, $name, $description, $status);
			break;
			case 'delete':
				$id = strip_tags($_POST['id']);
				$CategoryController->delete($id);
			break;
		}
	}

	class CategoryController{
		public function store($name, $description, $status){
			$conn = connect();
			if ($conn->connect_error==false){
				if($name!="" &&$description!=""&&$status!=""){
					$query="insert into categories (name,description,status) values(?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sss',$name, $description, $status);
					if($prepared_query->execute()){
						header("Location:".$_SERVER["HTTP_REFERER"]);
						$_SESSION['success'] ="Datos enviados correctaqmente";
					}
					else{
						$_SESSION['error'] ="verifica datos";
						header("Location:".$_SERVER["HTTP_REFERER"]);
					}

				}
			}
			else{
				$_SESSION['error'] ="COnexion MAl BD";
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}

		}
		public function update($id, $name, $description, $status){
			$conn = connect();
			if ($conn->connect_error==false){
				if($id!=""&&$name!="" &&$description!=""&&$status!=""){
					$query="update categories set name=?,description = ?, status=? where id=?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssi',$name, $description, $status, $id);
					if($prepared_query->execute()){
						header("Location:".$_SERVER["HTTP_REFERER"]);
					}
					else
						header("Location:".$_SERVER["HTTP_REFERER"]);

				}
			}
			else
				header("Location:".$_SERVER["HTTP_REFERER"]);
		}
		public function delete($id){
			$conn = connect();
			if ($conn->connect_error==false){
				if($id!=""){
					$query="delete from categories where id=?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('i',$id);
					if($prepared_query->execute()){
						header("Location:".$_SERVER["HTTP_REFERER"]);
					}
					else
						header("Location:".$_SERVER["HTTP_REFERER"]);

				}
			}
			else
				header("Location:".$_SERVER["HTTP_REFERER"]);
		}
		public function get(){
			$conn = connect();
			if ($conn->connect_error==false){
				$query = "select * from categories";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();

				$results = $prepared_query->get_result();
				$categories = $results->fetch_all(MYSQLI_ASSOC);

				if( count($categories)>0){
					return $categories;
				}else{
					return array();				
				}
			}else{
				echo "error";
			}
		}
	}
?>