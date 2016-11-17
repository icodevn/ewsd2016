<?php
namespace App\Models;

use Core\Model;

class Files extends Model
{

	function __construct()
	{	
		parent::__construct();
	}

	function getAll(){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."file order by id desc ");
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function add($data){
		try {
			$this->db->insert(PREFIX.'file',$data);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}


	function delete($id){
		try {
			$this->db->delete(PREFIX.'file',array('id' => $id));
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

	function get($id){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."file WHERE id =:id",array(':id' => $id));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function getFacultiesByYear($year){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."file WHERE year =:year ORDER BY description ",array(':year' => $year));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function getFacultyByCode($code){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."file WHERE code =:code ",array(':code' => $code));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data[0];
	}

	function getFacultiesByCoordinator($mktCoor){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."file WHERE mkt_coor =:mktCoor",array(':mktCoor' => $mktCoor));
			if(count($data) >= 1){
				return false;
			}else{
				return true;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return true;
		}
	}

	function update($data,$where){
		try {
			$this->db->update(PREFIX."file",$data,$where);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

}