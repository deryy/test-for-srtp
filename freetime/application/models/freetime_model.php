<?php
class freetime_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function add()
	{
		$this->load->helper('url');

		$data = array(
			'name'			=> $this->input->post('name'),
			'studentid'		=> $this->input->post('studentId'),
			'email'			=> $this->input->post('email'),
			'mobileFull'	=> $this->input->post('mobileFull'),
			'mobileShort'	=> $this->input->post('mobileShort')?$this->input->post('mobileShort'):NULL,
			'position'		=> $this->input->post('position'),
			'timeMask'		=> $this->input->post('timeMask'),
			'guid'			=> $this->generate_guid()
		);

		return $this->db->insert('freetime', $data);
	}

	public function edit() {
		$this->load->helper('url');

		$data = array(
			'name'			=> $this->input->post('name'),
			'studentId'		=> $this->input->post('studentId'),
			'email'			=> $this->input->post('email'),
			'mobileFull'	=> $this->input->post('mobileFull'),
			'mobileShort'	=> $this->input->post('mobileShort')?$this->input->post('mobileShort'):NULL,
			'position'		=> $this->input->post('position'),
			'timeMask'		=> $this->input->post('timeMask')
		);

		$this->db->where('guid', $this->input->post('guid'));
		return $this->db->update('freetime', $data);
	}

	public function getFreeTimeByGuid($guid) {
		if (empty($guid)) {
			return FALSE;
		} else {
			$query = $this->db->get_where('freetime', array('guid'=>$guid));
			$row = $query->result_array();
			if (empty($row)) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function get_freetime($studentId, $name, $email) {
		if (empty($studentId) || empty($name) || empty($email)) {
			return 0;
		} else {
			$query = $this->db->get_where('freetime', array('studentId'=>$studentId,'name'=>$name,'email'=>$email));
			$row = $query->result_array();
			if (empty($row)) {
				return FALSE;
			} else {
				return $row;
			}
		}
	}

	private function generate_guid() {
		$charid = strtoupper(md5(uniqid(mt_rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
		.substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12)
		.chr(125);// "}"
		return $uuid;
	}
}