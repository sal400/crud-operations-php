<h2>Database: Crud function file</h2><hr><br>
<?php
class database{
	private $host = 'localhost';
	private $dbusername = 'root';
	private $dbpassword = '';
	private $dbname = 'crud';
	
	protected function connect(){	
		$con = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
		
		return $con;
	}
}

class queryz extends database{
	//select
	public function getData($table, $field='*', $condition_arr='', $order_by_field='', $order_by_type='desc', $limit=''){
		$sql = "select $field from $table ";
		if($condition_arr !=''){
			$sql .=' where ';
			$c = count($condition_arr);
			$i = 1;
			foreach($condition_arr as $key => $val){
				if($i==$c){
					$sql .= " $key = '$val'";
				}else{
					$sql .= " $key = '$val' and ";
				}
				$i++;
			}
		}
		if($order_by_field !=''){
			$sql .= " order by $order_by_field $order_by_type ";
		}
		if($limit !=''){
			$sql .= "limit $limit";
		}
		
		$result = $this->connect()->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$arr[] = $row;			//pushing data to multidimensional array.
			}
			return $arr;
		}else{
			return 0;
		}
	}
	//insert
	public function insertData($table, $condition_arr=''){
		if($condition_arr !=''){
			foreach($condition_arr as $key => $val){
					$fieldArr[] = $key;
					$valueArr[] = $val;
			}
			$field = implode(", ", $fieldArr);
			$value = implode("','", $valueArr);
			$value = "'".$value."'"; 

			$sql = "insert into $table($field) values($value)";
			
			$this->connect()->query($sql);
				
		}
	}
	//delete
	public function deleteData($table, $condition_arr=''){
		if($condition_arr !=''){
			$sql = "delete from $table where ";
			
			if($condition_arr !=''){
				$c = count($condition_arr);
				$i = 1;
				foreach($condition_arr as $key => $val){
					if($i==$c){
						$sql .= " $key = '$val'";
					}else{
						$sql .= " $key = '$val' and ";
					}
					$i++;
				}
			}
			
			$this->connect()->query($sql);
				
		}
	}
	//Update
	public function updateData($table, $condition_arr='', $where_field, $where_value){
		if($condition_arr !=''){
			$sql = "update $table set ";
			
			if($condition_arr !=''){
				$c = count($condition_arr);
				$i = 1;
				foreach($condition_arr as $key => $val){
					if($i==$c){
						$sql .= " $key = '$val'";
					}else{
						$sql .= " $key = '$val', ";
					}
					$i++;
				}
			}
			$sql .= " where $where_field = $where_value ";
			$this->connect()->query($sql);
				
		}
	}
	
	//safe str- to avoid sql injection Example: )'asdf'") drop table;
	public function get_safe_str($str){
		if($str !=''){
			return mysqli_real_escape_string($this->connect(), $str);
		}
	}
}
//--------Test Functions-----------//
$obj = new queryz();

//Remove comment below for testing getData() function.
/* 
$condition_arr = array('id'=>1, 'name' => 'Abdus');
$result = $obj->getData('user');	//'user', '*', $condition_arr, 'id', 'asc', 7
echo '<pre>';
print_r($result);
*/

//Remove comment below for testing insertData() function.
/*
$condition_arr = array('name' => 'Sumit', 'email' => 'sumit@gmail.com', 'mobile' => '3434');
$obj->insertData('user', $condition_arr);
*/

//Remove comment below for testing deleteData() function.
/*
$condition_arr = array('id' => 4);
$obj->deleteData('user', $condition_arr);
*/

//Remove comment below for testing updateData() function.
/*
$condition_arr = array('name' => 'Abc', 'email' => 'abc@gmail.com');
$result = $obj->updateData('user', $condition_arr, 'id', 3);
*/

?>