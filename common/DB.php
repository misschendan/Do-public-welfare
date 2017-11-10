<?php
	$dblink=new mysqli('localhost','root','168168','ourdata');
	$dblink->query('SET NAMES UTF8');

	//添加数据
	$sql=' ';
	function addnews($table,$data){	
		//获取出入的数据的键
		$key=array();
		foreach ($data as $k => &$v) {
			$key[]=$k;
			if(is_string($v)){
				$v='"'.$v.'"';
			}
		}
		global $sql;
		$sql='INSERT INTO '.$table.' ('.implode(',',$key).') VALUES('.implode(',',$data).')';
	}

	//查找所有的一级分类
	function selectdata($table,$where,$field=' * '){
		global $sql;
		$sql='SELECT '. $field.' FROM '. $table.' WHERE '. $where;
	}


	//删除分类
	function deletedata($table,$where){
		global $sql;
		$sql='DELETE FROM '.$table.' WHERE '.$where;
	}

	//修改数据
	function updatedata($table,$set,$where){
		global $sql;
		$sql='UPDATE '.$table.' SET '.$set.' WHERE '.$where;
	}


?>