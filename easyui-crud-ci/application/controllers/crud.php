<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class crud extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('crud_model');
		$this->load->library('Excel_generator');
    }
 
    public function index()
    {
        if(isset($_GET['grid']))
            echo $this->crud_model->getJson();
        else
            $this->load->view('crud');
    }
     
    public function create()
    {
        if(!isset($_POST))   
            show_404();
        
        if($this->crud_model->create())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Gagal memasukkan data'));
    }
     
    public function update($id=null)
    {
        if(!isset($_POST))   
            show_404();
        
        if($this->crud_model->update($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Gagal mengubah data'));
    }
     
    public function delete()
    {
        if(!isset($_POST))   
            show_404();
        
        $id = intval(addslashes($_POST['id']));
        if($this->crud_model->delete($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Gagal menghapus data'));
    }
	
	public function cetak()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$today=$date->format('d-m-Y');
		
		$this->load->model('crud_model');
		$data['data'] = $this->crud_model->reportUsers();
		
		ob_start();
		$content = $this->load->view('reportUser',$data);
		$content = ob_get_clean();	
		$filename= "Lap_user".$today.".pdf"; //nama file pdf	
		$this->load->library('html2pdf');
		try
		{	
			$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 10, 10, 10));
			//$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output($filename);
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	
	public function excel()
	{
		$query = $this->db->get('users');
	    $this->excel_generator->set_query($query);
	    $this->excel_generator->set_header(array('firstname', 'Last Name', 'Phone', 'Email'));
	    $this->excel_generator->set_column(array('firstname', 'lastname', 'phone', 'email'));
	    $this->excel_generator->set_width(array(25, 15, 30, 15));
	    $this->excel_generator->exportTo2007('Laporan Users');
	}
	
	public function cart()
	{
		$this->load->model('crud_model');
		$data=array();
    	foreach($this->crud_model->getCart()->result_array() as $row)
        $data[] = (int) $row['hasil'];
    	$this->load->view('viewCart',array('data'=>$data));
	}
	
	public function pendudukDiagram()
	{
		
		$data['graph'] = $this->crud_model->graph();
		$this->load->view('chartPenduduk', $data);
	}
}
 
/* End of file crud.php */
/* Location: ./application/controllers/crud.php */