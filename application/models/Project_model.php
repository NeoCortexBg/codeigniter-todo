<?php

class Project_model extends CI_Model
{
        public function get_list()
        {
			$res = $this->db->get('project')->result_array();
			$list = array(
				'' => '--- Project ---',
			);
			foreach($res as $p) {
				$list[$p['project_sid']] = $p['name'];
			}
			return $list;
        }
}
