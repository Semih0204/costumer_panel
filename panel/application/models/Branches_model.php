<?php

class Branches_model extends CI_Model
{

    public $tableName = "branches";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        //result yerine row yazıldığında bütün kayıtlar değil sadece çağırılan veri getirilir.
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

}
