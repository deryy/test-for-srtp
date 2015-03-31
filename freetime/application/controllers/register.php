<?php
class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('record_model');
	}

	/*public function index() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$data['title'] = '2014 QSC Registration Form';
		$this->load->view('templates/header', $data);
		$this->load->view('register/index', $data);
		$this->load->view('templates/footer');
	}*/

	public function index(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$data['title'] = '2014 QSC Registration Form';

		$this->form_validation->set_error_delimiters('', '<br>');

		$this->form_validation->set_rules('name',			'姓名',			'trim|required|min_length[2]|max_length[6]|xss_clean');	// 姓名2-6个汉字，必填
		$this->form_validation->set_rules('student_id',		'学号',			'trim|required|callback_stuid_regexp');						// 学号8或10位整数（具体由正则表达式实现），必填
		$this->form_validation->set_rules('gender',			'性别',			'trim|required|callback_gender_regexp');					// 性别（由正则验证），必填
		$this->form_validation->set_rules('email',			'Email',		'trim|required|valid_email');								// email，必填
		$this->form_validation->set_rules('mobile_full',	'手机全号',		'trim|required|callback_mobile_full_regexp');				// 手机全号11位数字（具体由正则表达式实现），必填
		$this->form_validation->set_rules('mobile_short',	'手机短号',		'trim|callback_mobile_short_regexp');						// 手机短号（由正则表达式验证）
		$this->form_validation->set_rules('grade',			'入学年',		'trim|required|callback_grade_regexp');						// 入学年份4位数字（由正则表达式验证），必填
		$this->form_validation->set_rules('major',			'大类/专业',	'trim|required|xss_clean');									// 大类/专业，必填
		$this->form_validation->set_rules('choice0',		'选项一',		'trim|required|integer|callback_choice0_regexp');			// 选项一，必填
		$this->form_validation->set_rules('choice1',		'选项二',		'trim|integer|callback_choice1_regexp');					// 选项二，必填
		$this->form_validation->set_rules('intro',			'个人简介',		'trim|xss_clean');											// 个人简介

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('register/index', $data);
			$this->load->view('templates/footer');
		} else {
			$guid = $this->input->post('guid');
			if($guid && $this->record_model->getRecordByGuid($guid)) {
				$this->record_model->edit();
			} else {
				$this->record_model->add();
			}
			$this->load->view('register/success');
		}
	}

	public function check_exist() {
		$student_id	= $this->input->get_post('student_id', TRUE);
		$name		= $this->input->get_post('name', TRUE);
		$email		= $this->input->get_post('email', TRUE);
		if (empty($student_id) || empty($name) || empty($email)) {
			$data['status'] = 'error';
			$data['detail'] = 'invalid args';
		} else {
			$row = $this->record_model->get_record($student_id, $name, $email);
			if (empty($row)) {
				$data['status'] = 'error';
				$data['detail'] = 'no such data';
			} else {
				$data['status'] = 'success';
				$data['detail'] = 'record fetched';
				$data = array_merge($data, $row[0]);
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	public function stuid_regexp($value)
	{
		if (preg_match("/^31[0-4]{1}0[01]{1}0[0-9]{4}|[12]{1}1[0-4]{1}[0-9]{5}$/", $value)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('stuid_regexp', '学号无效');
			return FALSE;
		}
	}

	public function gender_regexp($value)
	{
		if ($value == 0 || $value == 1) {
			return TRUE;
		} else {
			$this->form_validation->set_message('gender_regexp', '错误的性别');
			return FALSE;
		}
	}

	public function mobile_full_regexp($value)
	{
		if (preg_match("/^1[3578]{1}[0-9]{9}$/", $value)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('mobile_full_regexp', '手机全号无效');
			return FALSE;
		}
	}

	public function mobile_short_regexp($value)
	{
		if (preg_match("/^[1-9]{1}[0-9]{5}$/", $value) || empty($value)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('mobile_short_regexp', '手机短号号无效');
			return FALSE;
		}
	}

	public function grade_regexp($value)
	{
		if ($value >= 2012 && $value <= 2014) {
			return TRUE;
		} else {
			$this->form_validation->set_message('grade_regexp', '错误的入学年');
			return FALSE;
		}
	}

	public function choice0_regexp($value)
	{
		if (($value >= 10 && $value <= 13)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('choice0_regexp', '选项一无效');
			return FALSE;
		}
	}

	public function choice1_regexp($value)
	{
		if (($value >= 10 && $value <= 13) || empty($value)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('choice1_regexp', '选项二无效');
			return FALSE;
		}
	}
}