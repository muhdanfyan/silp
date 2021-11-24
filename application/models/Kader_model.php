<?php

class Kader_model  extends CI_Model  {

	function __construct()
    {
        parent::__construct();
    }

    function jumlah_baris($table_name, $where=null)
    {
		if (empty($where))
			$result = $this->db->query("select * from $table_name");
		else
			$result = $this->db->query("select * from $table_name where $where");
		return $result->num_rows();
    }

    function get_kader_single($id){
        $this->db->where('id_kader', $id);
        $table = $this->db->get('tb_kader');
        return $table->row(); 
    }

    function get_kader($marhalah=null, $unit=null){
      $this->db->join('tb_halaqah', 'tb_kader.halaqah = tb_halaqah.id_halaqah', 'left');
      $this->db->join('tb_marhalah', 'tb_halaqah.marhalah_halaqah = tb_marhalah.id', 'left');
      $this->db->join('tb_unit', 'tb_halaqah.unit_halaqah = tb_unit.id_unit', 'left');
      if (isset($marhalah))
        $this->db->where('tb_marhalah.id', $marhalah);
      if (isset($unit))
        $this->db->where('tb_unit.id_unit', $unit);
      
      return $this->db->get('tb_kader');
    }

    function get_jumlah_kader($marhalah=null, $unit=null, $jenis_unit=null){
      $this->db->join('tb_halaqah', 'tb_kader.halaqah = tb_halaqah.id_halaqah', 'left');
      $this->db->join('tb_marhalah', 'tb_halaqah.marhalah_halaqah = tb_marhalah.id', 'left');
      $this->db->join('tb_unit', 'tb_halaqah.unit_halaqah = tb_unit.id_unit', 'left');
        if (isset($marhalah))
            $this->db->where('tb_marhalah.id', $marhalah);
        if (isset($unit))
            $this->db->where('unit', $unit);
        if (isset($jenis_unit))
            $this->db->where('jenis_unit', $jenis_unit);

      $table = $this->db->get('tb_kader');
      
      return $table->num_rows(); 
    }
}
