<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
	public function list($user_id)
	{
		$this->db->flush_cache();
		$this->db->select('message_id,sender_id,receiver_id,title,message');
		$query=$this->db->where('receiver_id', $user_id);
		$query=$this->db->get('messages');
		return $query->row_array();
	}
	public function Send_message($sender_id,$receiver_id,$title,$message)
	{
		//Insert record here
	}

}

/* End of file message_model.php */
/* Location: ./application/models/message_model.php */