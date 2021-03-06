<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelurahan extends CI_Model {
	public function __construct()
	{
		parent::__construct();

	}


	public function get_detail($slug= '') 
	{
      	
      		$query = $this->db->where(array('slug' => $slug  ));	

			$query = $this->db->where(array('status' => 'show'  ));		 
			 
			$query = $this->db->get('kelurahan_desa')->row();

			if ($query == true) {
				return $query;
			} else {
				$this->template->alert(
                'Data tidak ditemukan.', 
                array('type' => 'danger','icon' => 'check'));
				redirect(base_url('tentang-kami'),'refresh');
			}
    }

public function get_perangkat($slug= '') 
	{
      		$query = $this->db->where(array('slug' => $slug  ));	

			$query = $this->db->where(array('status' => 'show'  ));		 
			 
			$query = $this->db->get('perangkat_kelurahan_desa')->result();

			return $query;
	}


    public function uphit($param)
	{	
		$hit = $this->get_detail($param);

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('kelurahan_desa', $object, array('slug' => $param));
	}

	
}