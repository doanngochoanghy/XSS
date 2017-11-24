<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
	public function list($user_id)
	{
		$this->db->flush_cache();
		$this->db->select('message_id,title,message,a.username as sender,b.username as receiver');
		$this->db->join('users as a', 'a.user_id = messages.sender_id');
		$this->db->join('users as b', 'b.user_id = messages.receiver_id');
		$query=$this->db->where('receiver_id', $user_id);
		$query=$this->db->get('messages');
		return $query->result_array();
	}
	public function list_all_message()
	{
		
		$this->db->flush_cache();
		$this->db->select('message_id,title,message,a.username as sender,b.username as receiver');
		$this->db->join('users as a', 'a.user_id = messages.sender_id');
		$this->db->join('users as b', 'b.user_id = messages.receiver_id');
		$query=$this->db->get('messages');
		return $query->result_array();
	}
	public function Send_message($sender_id,$receiver_id,$title,$message)
	{
		//Insert record here
		$this->db->flush_cache();
		$message = array('sender_id' => $sender_id, 'receiver_id'=>$receiver_id,'title'=>$title,'message'=>$message);
		$this->db->insert('messages', $message);
	}
	public function get_message($message_id)
	{
		$this->db->flush_cache();
		$this->db->select('message_id,receiver_id,title,message,a.username as sender,b.username as receiver');
		$this->db->join('users as a', 'a.user_id = messages.sender_id');
		$this->db->join('users as b', 'b.user_id = messages.receiver_id');
		$query=$this->db->where('message_id', $message_id);
		$query=$this->db->get('messages');
		return $query->row_array();
	}
	public function Delete($message_id)
	{
		$this->db->flush_cache();
		$this->db->delete('messages',array("message_id"=>$message_id));
	}
}

/* End of file message_model.php */
/* Location: ./application/models/message_model.php */