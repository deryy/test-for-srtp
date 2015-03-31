<?php
class freetime extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('freetime_model');
	}

	public function index(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$data['title'] = '2014学年春学期空余时间表';

		$this->form_validation->set_error_delimiters('', '<br>');

		$this->form_validation->set_rules('name',			'姓名',			'trim|required|min_length[2]|max_length[6]|xss_clean');		// 姓名2-6个汉字，必填
		$this->form_validation->set_rules('studentId',		'学号',			'trim|required|callback_stuid_regexp');						// 学号8或10位整数（具体由正则表达式实现），必填
		$this->form_validation->set_rules('email',			'Email',		'trim|required|valid_email');								// email，必填
		$this->form_validation->set_rules('mobileFull',		'手机全号',		'trim|required|callback_mobile_full_regexp');				// 手机全号11位数字（具体由正则表达式实现），必填
		$this->form_validation->set_rules('mobileShort',	'手机短号',		'trim|callback_mobile_short_regexp');						// 手机短号（由正则表达式验证）
		$this->form_validation->set_rules('position',		'大类/专业',	'trim|required|xss_clean');									// 大类/专业，必填

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('freetime/index', $data);
			$this->load->view('templates/footer');
		} else {
			$timeMask = '';
			/*if ($this->input->post('ft11')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft12')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft13')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft14')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft15')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft21')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft22')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft23')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft24')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft25')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft31')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft32')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft33')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft34')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft35')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft41')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft42')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft43')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft44')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft45')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft51')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft52')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft53')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft54')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft55')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft61')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft62')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft63')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft64')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft65')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft71')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft72')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft73')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft74')) {
				$timeMask += 1;
				$timeMask = $timeMask << 1;
			}
			if ($this->input->post('ft75')) {
				$timeMask += 1;
			}*/
			
			$timeMask .= $this->input->post('ft11');
			$timeMask .= $this->input->post('ft12');
			$timeMask .= $this->input->post('ft13');
			$timeMask .= $this->input->post('ft14');
			$timeMask .= $this->input->post('ft15');
			$timeMask .= $this->input->post('ft21');
			$timeMask .= $this->input->post('ft22');
			$timeMask .= $this->input->post('ft23');
			$timeMask .= $this->input->post('ft24');
			$timeMask .= $this->input->post('ft25');
			$timeMask .= $this->input->post('ft31');
			$timeMask .= $this->input->post('ft32');
			$timeMask .= $this->input->post('ft33');
			$timeMask .= $this->input->post('ft34');
			$timeMask .= $this->input->post('ft35');
			$timeMask .= $this->input->post('ft41');
			$timeMask .= $this->input->post('ft42');
			$timeMask .= $this->input->post('ft43');
			$timeMask .= $this->input->post('ft44');
			$timeMask .= $this->input->post('ft45');
			$timeMask .= $this->input->post('ft51');
			$timeMask .= $this->input->post('ft52');
			$timeMask .= $this->input->post('ft53');
			$timeMask .= $this->input->post('ft54');
			$timeMask .= $this->input->post('ft55');
			$timeMask .= $this->input->post('ft61');
			$timeMask .= $this->input->post('ft62');
			$timeMask .= $this->input->post('ft63');
			$timeMask .= $this->input->post('ft64');
			$timeMask .= $this->input->post('ft65');
			$timeMask .= $this->input->post('ft71');
			$timeMask .= $this->input->post('ft72');
			$timeMask .= $this->input->post('ft73');
			$timeMask .= $this->input->post('ft74');
			$timeMask .= $this->input->post('ft75');
			$timeMask = bindec($timeMask);
			$_POST['timeMask'] = $timeMask;
			//$this->input->post('timeMask')->$timeMask;
			$guid = $this->input->post('guid');
			if($guid && $this->freetime_model->getFreeTimeByGuid($guid)) {
				$this->freetime_model->edit();
			} else {
				$this->freetime_model->add();
			}
			$this->load->view('freetime/success');
		}
	}

	public function check_exist() {
		$studentId	= $this->input->get_post('studentId', TRUE);
		$name		= $this->input->get_post('name', TRUE);
		$email		= $this->input->get_post('email', TRUE);
		if (empty($studentId) || empty($name) || empty($email)) {
			$data['status'] = 'error';
			$data['detail'] = 'invalid args';
		} else {
			$row = $this->freetime_model->get_freetime($studentId, $name, $email);
			if (empty($row)) {
				$data['status'] = 'error';
				$data['detail'] = 'no such data';
			} else {
				$data['status'] = 'success';
				$data['detail'] = 'freetime fetched';
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
}