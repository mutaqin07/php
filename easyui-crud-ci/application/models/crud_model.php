<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class crud_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
     
    public function create()
    {
        return $this->db->insert('users',array(
            'firstname'=>$this->input->post('firstname',true),
            'lastname'=>$this->input->post('lastname',true),
            'phone'=>$this->input->post('phone',true),
			'email'=>$this->input->post('email',true)
        ));
    }
     
    public function update($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('users',array(
            'firstname'=>$this->input->post('firstname',true),
            'lastname'=>$this->input->post('lastname',true),
            'phone'=>$this->input->post('phone',true),
			'email'=>$this->input->post('email',true)
        ));
    }
     
    public function delete($id)
    {
        return $this->db->delete('users', array('id' => $id)); 
    }
     
    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;
        
        $result = array();
        $result['total'] = $this->db->get('users')->num_rows();
        $row = array();
        
        $this->db->limit($rows,$offset);
        $this->db->order_by($sort,$order);
        $criteria = $this->db->get('users');
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id'=>$data['id'],
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'phone'=>$data['phone'],
				'email'=>$data['email']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
	
	public function reportUsers()
	{
		$query = $this->db->query("Select * from users");
		return $query;
	}
	
	public function getCart()
    {
        $this->db->select('bulan, hasil');
        $this->db->like('tanggal','2013-');
        $this->db->order_by('tanggal','asc');
        return $this->db->get('tbl_pendapatan');
    }
	
	public function graph()
	{
		$data = $this->db->query("SELECT * from datapenduduk");
		return $data->result();
	}

}
 
/* End of file crud_model.php */
/* Location: ./application/controllers/crud_model.php */