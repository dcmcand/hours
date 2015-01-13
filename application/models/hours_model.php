<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hours_model extends CI_Model {
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    
    
    function emp_name() {
		//Generate a list of Employees
		$this->db->select('idEmployee');
		$this->db->select('first_name');
		$this->db->select('last_name');
		$this->db->select('default_type');
		$this->db->order_by('last_name');
		$query=$this->db->get('employees');
		return $query->result_array();
	}
	function get_one_name($idEmployee){
		// Get a single employee's name based on their idEmployee
		$this->db->select('first_name, last_name');
		$this->db->where('idEmployee',$idEmployee['idEmployee']);
		$query=$this->db->get('employees');
		return $query->result_array();
	}
	
	function pay_periods(){
		//Get a list of pay periods
		$this->db->select('pay_period');
		$this->db->group_by('pay_period');
		$query=$this->db->get('pay');
		return $query->result_array();
	}
	function totals($year){
		//Summary data including Average Hours worked, total hours worked, and total wages paid for the entire database
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours',false);
		$this->db->where('Year', $year);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}
	function summary_by_type($year){
	//Summary data including Average Hours worked, total hours worked, and total wages paid for all types of hours
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours,type',false);
		$this->db->group_by('type');
		$this->db->where('Year', $year);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}
	function summary_by_type_and_pay($year){
	//Summary data including Average Hours worked, total hours worked, and total wages paid and summaries by hours type for a selected pay period 
		$pay_period=$this->input->post('pay_period');
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours,type',false);
		$this->db->group_by('type');
		$this->db->where('Year', $year);
		$this->db->where('pay_period', $pay_period);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}
	function emp_wages($year){
	//get wages information for a specific employee
		$idEmployee=$this->input->post('idEmployee');
		$this->db->select('idShift, pay.idEmployee, first_name, last_name, pay_period, wages, hours,type');
		$this->db->join('employees', 'employees.idEmployee=pay.idEmployee', 'left');
		$this->db->where('Year', $year);
		$this->db->where('pay.idEmployee', $idEmployee);
		$this->db->order_by('pay_period', 'type');
		$query=$this->db->get('pay');
		return $query->result_array();
	}
	function emp_totals($year){	 
	//get wage summary information for a specific employee	
		$idEmployee=$this->input->post('idEmployee');
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours',false);
		$this->db->where('Year', $year);
		$this->db->where('idEmployee', $idEmployee);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}	
	function wages_by_type($year){
	//get wage information by hours type
		$type=$this->input->post('type');
		$this->db->select('idShift, pay.idEmployee, first_name, last_name, pay_period, wages, hours,type');
		$this->db->join('employees', 'employees.idEmployee=pay.idEmployee', 'left');
		$this->db->where('Year', $year);
		$this->db->where('type', $type);
		$this->db->order_by('pay_period, last_name');
		$query=$this->db->get('pay');
		return $query->result_array();
	}
	function totals_by_type($year){	 
	//get wage summary information by hours type
		$type=$this->input->post('type');
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours',false);
		$this->db->where('Year', $year);
		$this->db->where('type', $type);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}
	function wages_by_pay_period($year){
	//get wage information by pay period 
	
		$pay_period=$this->input->post('pay_period');
		$this->db->select('idShift, pay.idEmployee, first_name, last_name, pay_period, wages, hours,type');
		$this->db->join('employees', 'employees.idEmployee=pay.idEmployee', 'left');
		$this->db->where('Year', $year);
		$this->db->where('pay_period', $pay_period);
		$this->db->order_by('type, last_name');
		$query=$this->db->get('pay');
		return $query->result_array();
	}
	function totals_by_pay_period($year){	 
	//get wage summaries by pay period
		$pay_period=$this->input->post('pay_period');
		$this->db->select('format(avg(hours),2) AS avg_hours,format(sum(wages),2) AS total_wages,format(sum(hours),2) AS total_hours',false);
		$this->db->where('Year', $year);
		$this->db->where('pay_period', $pay_period);
		$query=$this->db->get('pay');
		if($query->result_array()[0]['avg_hours'][0] != null){
			return $query->result_array();
		} else {
			return array(array('avg_hours'=> 0, 'total_wages'=>0,'total_hours'=>0));
		};
	}
	function add_data($test){
		//insert new data into the database
		//print_r($test);
		$year=date("Y");
		foreach($test as $t):
		
				$data=array(
					'idShift'=>NULL,
					'idEmployee'=>$t['emp'],
					'pay_period'=>$t["pay_period"],
					'wages'=>$t["wages"],
					'Hours'=>$t["hours"],
					'type'=>$t["type"],
					'Year'=>$year
				);
				$this->db->insert("pay", $data);
		endforeach;
		return true;
	}
	function get_one_shift($idShift){
		
		$this->db->select('idShift, pay.idEmployee, first_name, last_name, pay_period, wages, hours,type');
		$this->db->join('employees', 'employees.idEmployee=pay.idEmployee', 'left');
		$this->db->where('idShift', $idShift['idShift']);
		$query=$this->db->get('pay');
		return $query->result_array();
	}
	function edit_data(){
		$idShift = $this->input->post('idShift');
		$idEmployee = $this->input->post('idEmployee');
		$pay_period = $this->input->post('pay_period');
		$wages = $this->input->post('wages');
		$hours = $this->input->post('hours');
		$type = $this->input->post('type');
		$data = array(
			'idShift' => $idShift,
			'idEmployee' => $idEmployee,
			'pay_period' => $pay_period,
			'wages' => $wages,
			'hours' => $hours,
			'type' => $type
		);
		$this->db->where('idShift', $idShift);
		$this->db->update('pay', $data);			
		return true;
	}	
	function delete_data(){
		$idShift = $this->input->post('idShift');
		$this->db->delete('pay', array('idShift' => $idShift));
		return true;
	}
	function get_years(){
		$this->db->select('Year');
		$this->db->group_by('Year');
		$query = $this->db->get('pay');
		//print_r $query->result_array();
		return $query->result_array();
	}
}	
?>	
		
