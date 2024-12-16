<?php

class model
{
	public $conn = "";
	function __construct()
	{
		$this->conn = new mysqli('localhost', 'root', '', 'practice_task');
	}

	function select($tbl)
	{
		$sel = "select * from $tbl";
		$run = $this->conn->query($sel);
		while ($data = $run->fetch_object()) {
			$arr[] = $data;
		};
		return $arr;
	}

	function insert($tbl, $arr)
	{
		$col_arr = array_keys($arr);
		$col = implode(",", $col_arr);

		$value_arr = array_values($arr);
		$value = implode("','", $value_arr);

		$ins = "insert into $tbl ($col) values ('$value')";
		$run = $this->conn->query($ins);
		return $run;
	}

	function delete_where($tbl, $where)
	{
		$col_w = array_keys($where);
		$value_w = array_values($where);

		echo $del = "delete from $tbl where 1=1";
		$i = 0;
		foreach ($where as $w) {
			$del .= " and $col_w[$i]='$value_w[$i]'";
			$i++;
		}
		$run = $this->conn->query($del);
		return $run;
	}

	function select_where($tbl, $where)
	{
		$coll_w = array_keys($where);
		$value_w = array_values($where);

		$sel = "select * from $tbl where 1=1";
		$i = 0;
		foreach ($where as $w) {
			$sel .= " and $coll_w[$i]='$value_w[$i]'";
			$i++;
		}
		$run = $this->conn->query($sel);
		return $run;
	}

	function update_where($tbl, $data, $where)
	{
		$upd = "update $tbl set";

		$col_d = array_keys($data);
		$value_d = array_values($data);
		$j = 0;

		$count = count($data);
		foreach ($data as $d) {
			if ($count == $j + 1) {
				$upd .= " $col_d[$j]='$value_d[$j]'";
			} else {
				$upd .= " $col_d[$j]='$value_d[$j]' , ";
				$j++;
			}
		}

		$upd .= " where 1=1";
		$col_w = array_keys($where);
		$value_w = array_values($where);
		$i = 0;
		foreach ($where as $w) {
			echo $upd .= " and $col_w[$i]='$value_w[$i]'";
			$i++;
		}
		$run = $this->conn->query($upd);
		return $run;
	}
}
