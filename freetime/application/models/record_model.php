<?php
class record_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function add()
	{
		$this->load->helper('url');

		$data = array(
			'name'			=> $this->input->post('name'),
			'student_id'	=> $this->input->post('student_id'),
			'gender'		=> $this->input->post('gender'),
			'email'			=> $this->input->post('email'),
			'mobile_full'	=> $this->input->post('mobile_full'),
			'mobile_short'	=> $this->input->post('mobile_short'),
			'grade'			=> $this->input->post('grade'),
			'major'			=> $this->input->post('major'),
			'choice0'		=> $this->input->post('choice0'),
			'choice1'		=> $this->input->post('choice1'),
			'intro'			=> $this->input->post('intro'),
			'useragent'		=> $this->input->user_agent(),
			'guid'			=> $this->generate_guid()
		);

		return $this->db->insert('record', $data);
	}

	public function edit() {
		$this->load->helper('url');

		$data = array(
			'name'			=> $this->input->post('name'),
			'student_id'	=> $this->input->post('student_id'),
			'gender'		=> $this->input->post('gender'),
			'email'			=> $this->input->post('email'),
			'mobile_full'	=> $this->input->post('mobile_full'),
			'mobile_short'	=> $this->input->post('mobile_short'),
			'grade'			=> $this->input->post('grade'),
			'major'			=> $this->input->post('major'),
			'choice0'		=> $this->input->post('choice0'),
			'choice1'		=> $this->input->post('choice1'),
			'intro'			=> $this->input->post('intro'),
			'useragent'		=> $this->input->user_agent()
		);

		$this->db->where('guid', $this->input->post('guid'));
		return $this->db->update('record', $data);
	}

	public function getRecordByGuid($guid) {
		if (empty($guid)) {
			return FALSE;
		} else {
			$query = $this->db->get_where('record', array('guid'=>$guid));
			$row = $query->result_array();
			if (empty($row)) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function get_record($student_id, $name, $email) {
		if (empty($student_id) || empty($name) || empty($email)) {
			return 0;
		} else {
			$query = $this->db->get_where('record', array('student_id'=>$student_id,'name'=>$name,'email'=>$email));
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