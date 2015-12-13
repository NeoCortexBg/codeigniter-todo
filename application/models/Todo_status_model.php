<?php

class Todo_status_model extends CI_Model
{
        public function get_list()
        {
			$res = $this->db->get('todo_status')->result_array();
			$list = array();
			foreach($res as $p) {
				$list[$p['todo_status_sid']] = $p['name'];
			}
			return $list;
        }
}
