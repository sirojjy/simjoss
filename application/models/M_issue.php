<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_issue extends CI_Model
{
    private $_ISSUE = 'issue';

    public function edit_issue($id)
    {
        $this->db->where('id_issue', $id);
        return $this->db->get($this->_ISSUE)->row();
    }
}
