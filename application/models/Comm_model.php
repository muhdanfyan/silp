<?php

class Comm_model  extends CI_Model  {

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

    function get_santri($id){
        $this->db->where('id_santri', $id);
        $table = $this->db->get('tb_santri');
        return $table->row(); 
    }

    function get_datasingle($nama_table, $nama_id, $id){
        $this->db->where($nama_id, $id);
        $table = $this->db->get($nama_table);
        return $table->row(); 
    }

    function jumlah_kas(){
    //   $sqlDebet = "SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Debet'";
    //   $resultDebet = $this->db->query($sqlDebet)->result();
    //   $sqlKredit = "SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Kredit'";
    //   $resultKredit = $this->db->query($sqlKredit);

      $this->db->select_sum('nominal_keuangan');
      $this->db->where('jenis_keuangan', 'Debet');
      $query = $this->db->get('tb_keuangan');
      $result = $query->result();
      $debet = $result[0]->nominal_keuangan;
  
      $this->db->select_sum('nominal_keuangan');
      $this->db->where('jenis_keuangan', 'Kredit');
      $query = $this->db->get('tb_keuangan');
      $result = $query->result();
      $kredit = $result[0]->nominal_keuangan;

      return $debet - $kredit;
    }

    function get_wktnyetor(){
        $table = $this->db->get('tb_wktnyetor');
        return $table->result_array();
    }

    function get_data_table($table_name){
      $table = $this->db->get($table_name);
      return $table->result_array();
  }

}
