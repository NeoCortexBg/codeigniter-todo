<?php

class Todo_model extends CI_Model
{
        public function fetch_filtered(array $filter = array())
        {
			if(isset($filter['project_sid']) && !empty($filter['project_sid'])) {
				$this->db->where('project_sid', (int)$filter['project_sid']);
			}
			if(isset($filter['todo_status_sid']) && !empty($filter['todo_status_sid'])) {
				$this->db->where('todo_status_sid', (int)$filter['todo_status_sid']);
			}

			$orderBy = array(
				'date_created' => "Date Created",
				'priority' => "Priority",
				'todo_status_sid' => "Status",
				'project_sid' => "Project",
			);
			$orderDir = array('DESC', 'ASC');
			if(isset($filter['order_by']) && isset($orderBy[$filter['order_by']])) {
				if(isset($filter['order_dir'])) {
					$filter['order_dir'] = strtoupper($filter['order_dir']);
				}
				$this->db->order_by($filter['order_by'], array_key_exists($filter['order_dir'], $orderDir) ? $filter['order_dir'] : "DESC" );
			}

			return $this->db->get('todo')->result_array();
        }
}
