<?php
	class model{
		public $conn;
		public function __construct(){
			$localhost = "localhost";
			$user = "root";
			$pass = "";
			$db = "thamgiada";

			$this->conn = new mysqli($localhost, $user, $pass, $db);
			//var_dump($this->conn);exit;
			if($this->conn->connect_error){
				exit("co loi".$this->conn->connect_error);
			}
			else{
				//echo "ket noi thanh cong";
			}
		}
		public function getList1()
		{
			$sql = "SELECT * FROM nhanvien";
			$result = $this->conn->query($sql);
			//var_dump($result);exit;
			if($result->num_rows > 0){
				return $result;
			} 
			else{
				return NULL;
			}
		}
		public function getList2()
		{//in danh sach nhan vien tham gia it nhat mot du an
			$sql = "SELECT * FROM nhanvien WHERE manv IN (SELECT manv FROM thamgia)";
			$result = $this->conn->query($sql);
			//var_dump($result);exit;
			if($result->num_rows > 0){
				return $result;
			} 
			else{
				return NULL;
			}
		}
		public function getList3()
		{//in danh sach nhan vien khong tham gia du an nao
			// $sql = "SELECT * FROM nhanvien WHERE NOT EXISTS (SELECT * FROM thamgia WHERE thamgia.manv = nhanvien.manv)";
			$sql = "SELECT * FROM nhanvien WHERE manv NOT IN (SELECT manv FROM thamgia)";
			$result = $this->conn->query($sql);
			//var_dump($result);exit;
			if($result->num_rows > 0){
				return $result;
			} 
			else{
				return NULL;
			}
		}
	}
?>