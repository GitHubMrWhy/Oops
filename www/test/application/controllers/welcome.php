<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        //权限控制
        $this->load->library('session');
        $this->me = $this->session->userdata('user');
        if($this->me)
        	$this->load->vars(array('userName'=>$this->me->name));
    }
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('login');
	}

	public function layout()
	{
		$this->session->set_userdata('user','');
		redirect('welcome/login?messaeg=delete success');
	}

	public function register()
	{
		$this->load->helper('url');
		$this->load->database();
		if(!isset($_POST['email'])){
			$this->load->view('register');
			return;	
		}
		if($_POST['password'] == "" || $_POST['email'] == "" || $_POST['name'] == "" || $_POST['phone'] == ""){
			$this->load->vars(array('error'=>"input text can't be null"));
			$this->load->view('register');
			return;
		}
		if($_POST['password'] != $_POST['confrimPassword']){
			$this->load->vars(array('error'=>'passward and confirm passward not same'));
			$this->load->view('register');
			return;
		}
		$this->db->where('email',$_POST['email']);
		$em_return = $this->db->get('user');
		$em_row = $em_return->row();
		if($em_row){
			$this->load->vars(array('error'=>'email already used'));
			$this->load->view('register');
			return;		
		}
		$this->db->where('phone',$_POST['phone']);
		$return = $this->db->get('user');
		$row = $return->row();	
		if($row){
			$this->load->vars(array('error'=>'phone already used'));
			$this->load->view('register');
			return;		
		}

		$data = array(
			'name' => $_POST['name'],
			'password' => md5($_POST['password']),
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
		);
		$this->db->insert('user', $data);
		$this->load->vars(array('message'=>'register success'));
		$this->load->view('login');
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->database();
		if(!isset($_POST['email'])){
			$this->load->view('login');
			return;
		}
		$this->db->where('email',$_POST['email']);
		$return = $this->db->get('user');
		$row = $return->row();
		if($row){
			if($row->password ==  md5($_POST['password'])){
				$this->session->set_userdata('user',$row);
				$this->load->vars(array('userName'=>$row->name));
				$this->load->view('top');
			}else{
				$this->load->vars(array('message'=>'password is not ok'));
				$this->load->view('login');
			}
			return;
		}else{
			$this->load->vars(array('message'=>'has no email'));
			$this->load->view('login');
		}
	}
	public function top(){
		if($this->me){
			$this->load->vars(array('userName'=>$this->me->name));
			$this->load->view('top');
		}else{
			$this->load->view('login');
			return;
		}
	}
	public function admin(){
		if($this->me){
			$limit = 10;
			$start = 0;
			//if(isset($_GET['page'])){
			//	$start = ($_GET['page'] - 1) * $limit;
			//}
			$return = $this->db->get('user');
			$users = $return->result();
			$this->load->vars(array('users'=>$users));
			$this->load->view('admin');
		}else{
			$this->load->view('login');
			return;
		}
	}

	public function deleteUser(){
		if($this->me){
			$this->db->where('id',$_GET['id']);
			$this->db->delete('user');
			redirect('welcome/admin?messaeg=delete success');
		}else{
			$this->load->view('login');
			return;
		}
	}


	public function addReport(){
		if($this->me){
			$limit = 10;
			$start = 0;
			if(!isset($_POST['time'])){
				$this->load->view('addReport');
				return;
			}
			$data = $_POST;
			for($i = 1;$i<=4;$i++){
				if(isset($data['jobType'.$i]))
					$data['jobType'.$i] = 1;
				else
					$data['jobType'.$i] = 0;
			}
			for($i=1;$i<=6;$i++){
				$detail = "";
				for($j=1;$j<=7;$j++){
					$detail .= $data['fightDetails'.$i.$j].",";
					unset($data['fightDetails'.$i.$j]);
				}
				$detail .= $data['fightDetails'.$i.'8'];
				unset($data['fightDetails'.$i.'8']);
				$data['fightDetails'.$i] = $detail;
			}
			$this->db->insert('reports', $data);
			$id = $this->db->insert_id();
			redirect('welcome/editReport?id='.$id);
		}else{
			$this->load->view('login');
			return;
		}
	}

	public function reportList(){
		if($this->me){
			$return = $this->db->get('reports');
			$reports = $return->result();
			$this->load->vars(array('reports'=>$reports));
			$this->load->view('reportList');
		}else{
			$this->load->view('login');
			return;
		}
	}

	public function editReport(){
		if($this->me){
			$this->db->where('id',$_GET['id']);
			if(isset($_POST['time'])){
				for($i = 1;$i<=4;$i++){
					if(isset($_POST['jobType'.$i]))
						$_POST['jobType'.$i] = 1;
					else
						$_POST['jobType'.$i] = 0;
				}
				for($i=1;$i<=6;$i++){
					$detail = "";
					for($j=1;$j<=7;$j++){
						$detail .= $_POST['fightDetails'.$i.$j].",";
						unset($_POST['fightDetails'.$i.$j]);
					}
					$detail .= $_POST['fightDetails'.$i.'8'];
					unset($_POST['fightDetails'.$i.'8']);
					$_POST['fightDetails'.$i] = $detail;
				}
				foreach($_POST as $key=>$value){
					$this->db->set($key,$value);
				}
		    	$this->db->where('id',$_GET['id']);
		    	$this->db->update('reports');
		    	redirect('welcome/viewReport?id='.$_GET['id']);
			}
			$return = $this->db->get('reports');
			$row = $return->row();
			$details = $this->getFightDetails($row);
			$this->load->vars(array('report'=>$row,'editFlag'=> 1,'details'=>$details));
			$this->load->view('viewReport');
		}else{
			$this->load->view('login');
			return;
		}
	}

	public function viewReport(){
		if($this->me){
			$this->db->where('id',$_GET['id']);
			$return = $this->db->get('reports');
			$row = $return->row();
			$details = $this->getFightDetails($row);
			$this->load->vars(array('report'=>$row,'details'=>$details));
			$this->load->view('viewReport');
		}else{
			$this->load->view('login');
			return;
		}
	}

	public function export(){
		if($this->me){
			$this->db->where('id',$_GET['id']);
			$return = $this->db->get('reports');
			$row = $return->row();
			$str = "";
			$str = "Date:".$row->time.',Aircraft:VH:'.$row->aircraft.",\n";
			$str.= "Client:".$row->client.',Task Number:'.$row->aircraft.",\n";
			$str .= "Pilot:".$row->pilot.",\n";
			$str .= "Co Pilot:".$row->copilot.",\n";
			$str .= "Paramedic/Doctor:".$row->paramedic.",".$row->paramedic1.",".$row->paramedic2.",\n";
			$str .= "Passenger Details(up to 3)".",\n";
			$str .= "Name:".$row->pname.",\n";
			$str .= "Company:".$row->pcompany.",\n";
			$str .= "Name:".$row->pname1.",\n";
			$str .= "Company:".$row->pcompany1.",\n";
			$str .= "Name:".$row->pname2.",\n";
			$str .= "Company:".$row->pcompany2.",\n";
			$str .= "Patient Details(up to 3)".",\n";
			$str .= "Name:".$row->paname.",\n";
			$str .= "Date of Birth/Age:".$row->pabirth.",\n";
			$str .= "Address:".$row->paaddress.",\n";
			$str .= "Name:".$row->paname1.",\n";
			$str .= "Date of Birth/Age:".$row->pabirth1.",\n";
			$str .= "Address:".$row->paaddress1.",\n";
			$str .= "Name:".$row->paname2.",\n";
			$str .= "Date of Birth/Age:".$row->pabirth2.",\n";
			$str .= "Address:".$row->paaddress2.",\n";
			$str .= "Detail of injuries:".",\n";
			$str .= $row->detail.",\n";
			$str .= "comments:\n".$row->comments.",\n";
			$jobTypes = array('Accident','Medical','Training ','Other');
			$job = "";
			for($i = 1;$i<=4;$i++){
				$a = 'jobType'.$i;
				if($row->$a == 1)
					$job .= $jobTypes[$i-1].",";
			}
			$str .= "job Types:".$job.",\n";
			$str .= "'other' desc:".$row->jobdescribe.",\n";
			$str .= "job escribe:".$row->jobDesc.",\n";
			$str .= "Leg No,Date,From,To,Start,Life Off,Land,ShutDown\n";
			$fightDetails = $this->getFightDetails($row);
			foreach($fightDetails as $fightDetail){
				$str .= implode(",",$fightDetail);
				$str .= "\n";
			}
			$str .= "Fuel at start up,Total fuel Added,Fuel on Shutdown,Fuel uesed,\n";
			$str .= $row->fuelAt.",".$row->fuelAdd.",".$row->fuelshut.",".$row->fuelused.",\n";
			$str .= "Fuel Added:(up to 4),\n";
			$str .= "Location:".$row->location.",\n";
			$str .= "Supplier:".$row->supplier.",\n";
			$this->export_csv('report'.$_GET['id'].'.csv',$str);
		}else{
			$this->load->view('login');
			return;
		}	
	}

	public function export_csv($filename,$data)   
	{   
	    header("Content-type:text/csv");   
	    header("Content-Disposition:attachment;filename=".$filename);   
	    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');   
	    header('Expires:0');   
	    header('Pragma:public');   
	    echo $data;   
	}  

	public function getFightDetails($row){
		$result = array();
		for($i = 1;$i<=6;$i++){
			$name = 'fightDetails'.$i;
			$fightDetails = $row->$name;
			$arr = explode(",",$fightDetails);
			$k = 1;
			$arrnew = array();
			foreach($arr as $value){
				$arrnew[$k] = $value;
				$k++;
			}
			if(!isset($arrnew[8])){
				$arrnew[8] = "";
			}
			$result[$i] = $arrnew;
		}
		return $result;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */