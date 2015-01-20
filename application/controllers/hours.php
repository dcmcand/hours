<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hours extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        
    }
	public function index($year){
		//Home page displays a summary of current hours and wages as well as allowing searching by employee, hours type of Pay period.
		if($year==null){
			$year=date("Y");
		};
		$this->load->model('hours_model');
		$data['name']=$this->hours_model->emp_name();
		$data['period']=$this->hours_model->pay_periods();
		$data['totals']=$this->hours_model->totals($year);
		$data['summary_by_type']=$this->hours_model->summary_by_type($year);
		$data['year']=$year;
		$this->header();
		$this->load->view('hours', $data);
		$this->load->view('footer');
		
	}
	public function header(){
		$this->load->model('hours_model');
		$data['years']=$this->hours_model->get_years();
		#print_r($data.['years']);
		$this->load->view('header',$data);
	}
	
	public function search_by_employee($year,$script='$("#details_table").hide();'){
		//search data by employee, displays a summary at the top and detailed information below
		$this->load->model('hours_model');
		$data['totals']=$this->hours_model->emp_totals($year);
		$data['wages']=$this->hours_model->emp_wages($year);
		$data['script']=$script;
		$data['year']=$year;
		$this->header();
		$this->load->view('display_by_employee',$data);
		#$this->load->view('footer');	
	
	}
	public function search_by_type($year,$script='$("#details_table").hide();'){
		//Search by hours type
		$this->load->model('hours_model');
		$data['totals']=$this->hours_model->totals_by_type($year);
		$data['wages']=$this->hours_model->wages_by_type($year);
		$data['script']=$script;
		$data['year']=$year;
		$this->header();
		$this->load->view('display_by_type',$data);	
		$this->load->view('footer');
	}
	public function search_by_pay_period($year,$script='$("#details_table").hide();'){
		//Search by pay period
		$this->load->model('hours_model');
		$data['summary_by_type']=$this->hours_model->summary_by_type_and_pay($year);
		$data['totals']=$this->hours_model->totals_by_pay_period($year);
		$data['wages']=$this->hours_model->wages_by_pay_period($year);
		$data['script']=$script;
		$data['year']=$year;
		$this->header();
		$this->load->view('display_by_pay_period',$data);
		$this->load->view('footer');	
	}
	public function add_data(){
		//Add new wage and hours data to the database
		$this->load->model('hours_model');
		$data['name']=$this->hours_model->emp_name();
		$this->header();
		$this->load->view('add_data',$data);
		$this->load->view('footer');
	}
	
	public function add_data_success(){
			//process new data and display results
			$this->load->model('hours_model');	
			$data['test']=$this->input->post('shift');
			if($this->hours_model->add_data($data['test'])){
				$data['message']="You have successfully added the following data:";
			} else {
				$data['message']="Something went wrong";
			}	
			$this->header();
			$this->load->view('add_data_success', $data);
			$this->load->view('footer');
			
		}

	public function edit_data($year){
		$this->load->model('hours_model');
		$data['type_of_search'] = $this->input->post('type_of_search');
		switch($data['type_of_search']){
		case 'employee':
			$data['idEmployee'] = $this->input->post('idEmployee');
			break;
		case 'pay':
			$data['pay_period'] = $this->input->post('pay_period');
			break;
		case 'type':
			$data['type'] = $this->input->post('type');
		};
		$data['idShift'] = $this->input->post('idShift');
		$data['name']=$this->hours_model->emp_name();
		$shift=$this->hours_model->get_one_shift($data);
		$data['shift']=$shift;
		$data['year']=$year;
		$this->header();
		$this->load->view('edit_data',$data);
		$this->load->view('footer');
	}
	public function edit_data_success($year){
		$this->load->model('hours_model');
		if($this->hours_model->edit_data()){
			$type_of_search =  $this->input->post('type_of_search');
		switch($type_of_search){
			case 'employee':
				$script = '';
				$this->search_by_employee($year,$script); 				
				break;
			case 'pay':
				$script = '';
				$this->search_by_pay_period($year,$script); 				
				break;
			case 'type':
				$script = '';
				$this->search_by_type($year,$script); 				
				break;
			};
		} else {
			switch($type_of_search){
			case 'employee':
				$script='alert("Something went wrong");';
				$this->load->search_by_employee($year,$script);
				break;
			case 'pay':
				$script='alert("Something went wrong");';
				$this->load->search_by_pay_period($year,$script);
				break;
			case 'type':
				$script='alert("Something went wrong");';
				$this->load->search_by_type($year,$script);
				break;
			};
		}

	}
	public function delete_data($year){
		$this->load->model('hours_model');
		$type_of_search = $this->input->post('type_of_search');
		if($this->hours_model->delete_data()){
			switch($type_of_search){
				case 'employee':
					$script = '';
					$this->search_by_employee($year,$script); 				
					break;
				case 'pay':
					$script = '';
					$this->search_by_pay_period($year,$script); 				
					break;
				case 'type':
					$script = '';
					$this->search_by_type($year,$script); 				
					break;
				};
			} else {
				switch($type_of_search){
				case 'employee':
					$script='alert("Something went wrong");';
					$this->load->search_by_employee($year,$script);
					break;
				case 'pay':
					$script='alert("Something went wrong");';
					$this->load->search_by_pay_period($year,$script);
					break;
				case 'type':
					$script='alert("Something went wrong");';
					$this->load->search_by_type($year,$script);
					break;
			};
		}
	}
	public function older()
	{
		
		$this->load->view('older',$data);
		$this->load->view('footer');
	}
}
	



