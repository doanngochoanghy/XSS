<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('loggedin')==TRUE) {
			if ($this->session->userdata('is_admin')) {
				$messages=$this->message_model->list_all_message();
			} else {
				$messages=$this->message_model->list($this->session->userdata('user_id'));
			}
			$data = array('messages' => $messages);
			$this->load->view('templates/header.php');
			$this->load->view('Message/list', $data);
			$this->load->view('templates/footer.php');
		} else {
			redirect('Users/Login');
		}	
	}
	public function Send_message()
	{
		if (!empty($this->input->post())) {
			$receiver=$this->users_model->check_username($this->input->post('receiver_username'));
			if ($receiver) {
				$this->message_model->Send_message($this->session->userdata('user_id'),$receiver['user_id'],$this->input->post('title'),$this->input->post('message'));
				$this->session->set_flashdata('message', 'Sent message.');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('message', 'Username doesn\'t exist.');
				redirect(base_url().'Message/Send_message');
			}
			
		} else {
			$this->load->view('templates/header.php');
			$this->load->view('Message/form_message');
			$this->load->view('templates/footer.php');
		}
	}
	public function View($message_id)
	{
		if ($this->session->userdata('loggedin')) {
			$message=$this->message_model->get_message($message_id);
			if ($this->session->userdata('is_admin')==1||$this->session->userdata('user_id')==$message['receiver_id']) {
				$this->load->view('templates/header.php');
				$this->load->view('Message/message',array('message'=>$message));
				$this->load->view('templates/footer.php');
			} else {
				redirect('');
			}
		} else {
			redirect('Users/Login');
		}
	}
	public function Delete($message_id)
	{
		if ($this->session->userdata('is_admin')) {
			if($this->message_model->Delete($message_id))
			{

			}
			redirect('Message');

		} else {
			redirect('');
		}
		
	}

}

/* End of file message.php */
/* Location: ./application/controllers/message.php */