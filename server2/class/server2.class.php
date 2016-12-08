<?php
/*
FILE NAME : server2.class.php
LOCATION : class/server2.class.php
BASIC DETAILS : This file includes functions of the database synchronization for server 2.
AUTHOR : Bharat Parmar
VERSION : 1.0
CREATED DATE : 08-12-2016 

*/

@include("includes/config.php");
class server2{

	public function __construct(){
		$this->dbconnection();
	}

	private function dbconnection(){
		$this->con = mysqli_connect(HOST,DBUSER,DBPASSWORD,DBNAME) or mysqli_connect_error();
	}

	public function table_update(array $post_array){

		$table_name = @$post_array['table_name'];
		$table_structure = @$post_array['table_structure'];
		$table_data = @$post_array['table_data'];

		//DROP CURRENT TABLE
		mysqli_query($this->con,"drop table `".$table_name."`");

		//CREATE TABLE WITH NEW STRUCTURE
		mysqli_query($this->con,$table_structure);

		//INSERT TABALE DATA

		if(count($table_data)>0){
			$collumn_query = mysqli_query($this->con,"SHOW COLUMNS FROM `".$table_name."`");
			if(mysqli_num_rows($collumn_query)>0){
				$data_insert_query = "INSERT INTO `".$table_name."` ( ";

				while($collumn_data = mysqli_fetch_assoc($collumn_query)){
					$data_insert_query.="`".$collumn_data['Field']."`, ";
				}
				$data_insert_query=trim($data_insert_query,", ")." ) VALUES ";
				$insert_query = $data_insert_query;

				foreach ($table_data as $key => $value) {
					$insert_query.=" ('".implode("', '",$value)."'),";

					if($key>0 && $key%QUERY_LIMIT==0){
						$insert_query = trim($insert_query,",");
						mysqli_query($this->con,$insert_query);		
						$insert_query=$data_insert_query;
					}
				}
				
				if($insert_query!=""){
					$insert_query = trim($insert_query,",");
					mysqli_query($this->con,$insert_query);	
				}
				return "Table Created. ".mysqli_affected_rows($this->con)." Rows Inserted.";exit;

			} else {
				return "Table Collumn Not Found.";exit;
			}
		} else {
			return "Table Created.";exit;
		}
	}

	public function __destruct(){
		mysqli_close($this->con);
	}
}
?>
