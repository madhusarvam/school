<?php
class HomeController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
		$school_code = $this->session->userdata("school_code");
	}
	function sendEmail(){
	$userid=$this->input->post("userID");
	$email1=$this->input->post("email1");
	$this->db->where("school_code",$this->session->userdata("school_code"));
	$this->db->where("email",$email1);
	$this->db->where("username",$userid);
	$this->db->from('employee_info');
	$count = $this->db->count_all_results();
	
	$this->db->where("school_code",$this->session->userdata("school_code"));
	$this->db->where("email",$email1);
	$this->db->where("username",$userid);
	$var = $this->db->get('employee_info');
	
	if($count>0)
	{  $pass=  $var->row()->password;
	
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your password is ".$pass." Thanks for using E-mail to password Recovery System";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
	}
	else
	{
	$this->db->where("school_code",$this->session->userdata("school_code"));
	$this->db->where("email",$email1);
	$this->db->where("student_id",$userid);
	$this->db->from('student_info');
	$count = $this->db->count_all_results();
	
	$this->db->where("school_code",$this->session->userdata("school_code"));
	$this->db->where("email",$email1);
	$this->db->where("student_id",$userid);
	$var = $this->db->get('student_info');
	if($count>0)
	{  $pass=  $var->row()->password;
	
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your password is ".$pass." Thanks for using E-mail to password Recovery System";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
	}
	else{
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your sorry Please enter a valid E_mail";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
		}
	}
	
	}

		function index(){
		if($this->session->userdata("is_login") == true){
			$this->session->unset_userdata();
			$this->session->sess_destroy();
		}
		$data['title'] = 'NIKTECH-School Login Area';
		$this->load->helper("sms");
		//sms("4947cf80573bb1b355d918ad91fe35fd","Hi pushpendra","GFINCH","7668538172");
		$this->load->view("login", $data);
	}
	
	function login_check(){
		$query = $this->loginModel->validate();
	if($query['is_login']){  //if user validation return true after validation
		//	print_r($query['login_type']);exit;
			if($query['login_type'] == "admin"):
				$this->session->set_userdata($query);
				//echo $query['login_type'];
				redirect("index.php/login/index");
			elseif($query['login_type'] == "student"):
				//echo $query['login_type'];
				$this->session->set_userdata($query);
			redirect("index.php/singleStudentControllers");
			elseif(($query['login_type'] == 3)||($query['login_type'] == 2)):
				//echo $query['login_type'];
				//echo "t";
				$this->session->set_userdata($query);
				redirect("index.php/singleTeacherControllers");
			elseif($query['login_type'] == 1):
			//print_r($query['login_type']);exit;
			$this->session->set_userdata($query);
			redirect("index.php/login/index");
			else:
				redirect("index.php/login/index");
			endif;
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/index/authFalse");
		}
	}
	
	function unlock(){
		$query = $this->loginModel->validateLock();
		
		if($query){  //if user Lock validation return true after validation
			$this->session->set_userdata('is_lock',true);
			redirect("index.php/login/index");
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/lockPage/false");
		}
	}
	
	function logout()
	{	
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('index.php/homeController');
	}
	
	function lockPage(){
		if($this->session->userdata("is_login") == false){
			redirect('index.php/homeController');
		}
		$data['title'] = $this->session->userdata("name");
		$this->session->set_userdata('is_lock', false);
		$this->load->view("lockPage", $data);
	}
	
	function recoverPassword(){
		
	}
	
	function test(){
		$this->load->view("test");
	}
	
	function testsms(){
		$this->load->view("testsms");
	}

	function schoolInfo(){	
		$school_code = $this->session->userdata("school_code");	
		$id = $this->db->query("SELECT id From school order by id DESC Limit 1");
		$fsdid= $this->db->query("SELECT MAX(id) as v FROM fsd")->row();
		$fsdid=$fsdid->v+1;
		if($id->num_rows()>0){
		$id = $id->row()->id;
		}else{
		
		$id=0;
		}
		$id = 1 + $id;	
		// $this->form_validation->set_error_delimiters('<div class="col-sm-12"><label class="text-danger">', '</label></div>');
		// $this->form_validation->set_rules('schoolName','Date Of Admission', 'trim|required');
		// $this->form_validation->set_rules('principalName','Name', 'trim|required');
		// $this->form_validation->set_rules('wiseprincipalName','Date of birth', 'trim|required');
		// $this->form_validation->set_rules('mobile','Class of Admission', 'trim|required');
		// $this->form_validation->set_rules('section','Section', 'trim|required');
		// $this->form_validation->set_rules('gender','Gende', 'trim');
		// $this->form_validation->set_rules('addLine1','Address', 'trim|required');
		// $this->form_validation->set_rules('mobileNumber','Mobile Number', 'trim|required|numeric');
		// $this->form_validation->set_rules('emailAddress','', 'trim|valid_email');
		// $this->form_validation->set_rules('password','Password', 'trim|required');
		// $this->form_validation->set_rules('password_again','Re-Password', 'trim|required|matches[password]');
		// $this->form_validation->set_rules('fatherName','Father Name', 'trim|required');
		//$this->db->where('school_code',$school_code);
		//$schoolId=$this->db->get('school')->row();
		//$fsd=$this->db->get('fsd')->row()->id;
            $dataschool = array(				
				"school_name" => $this->input->post("schoolName"),
				"principle_name" => $this->input->post("principalName"),
				"wise_principle_name" => $this->input->post("wiseprincipalName"),
				"mobile_no" => $this->input->post("mobile"),
				"email1" => $this->input->post("emailAddress"),
				"created_date" => date("Y-m-d H:i:s"),
				"id"=>$id,
				"agree"=>"YES"
			);
			$this->load->model('schoolmodel');
			$SchConfirm = $this->schoolmodel->schInfo($dataschool);

			$datags = array(
				"admin_username" => $this->input->post("username"),
				"admin_password" => MD5($this->input->post("password")),
				"school_code" => $id,
				"fsd_id"=>$fsdid,
				"created"=>date("Y-m-d H:i:s")
				
			); 
			$this->load->model('schoolmodel');
			$SchConfirm1 = $this->schoolmodel->schInfo1($datags);

			$datasms = array(
				"school_code"=>$id
			);
			$this->load->model('schoolmodel');
			$SchConfirm3 = $this->schoolmodel->schInfo2($datasms);

			$datasmssetting = array(
				"sender_id" =>  $this->input->post("smsid"),
				"web_url" => $this->input->post("smsweburl"),
				"school_code" => $id
			);
			$this->load->model('schoolmodel');
			$SchConfirm4 = $this->schoolmodel->schInfo3($datasmssetting);

			$datafsd = array(
				"finance_start_date" => $this->input->post("fsdS"),
				"finance_End_date" => $this->input->post("fsdE"),
				"school_code" => $id,
				"id"=>$fsdid
			);
			$this->load->model('schoolmodel');
			$SchConfirm2 = $this->schoolmodel->schInfo4($datafsd);

			if($SchConfirm && $SchConfirm1 && $SchConfirm2 && $SchConfirm3 && $SchConfirm4 ){
				 $rtype="admin";
				    redirect(base_url()."index.php/api/common_user/$rtype");
			//	redirect(base_url()."index.php/login/");
			}
			
		}








	public function schoolRegistration(){
		//echo "string";
		$this->load->view("headerCss/newschregcss");
		$this->load->view("newSchoolregistration");
		$this->load->view("footerJs/newschregjs");
		// $data['pageTitle'] = 'school Registration';
		// $data['smallTitle'] = 'school Registration';
		// $data['mainPage'] = 'newSchoolregistration';
		// $data['title'] = 'school Registration';
		// //$this->load->model("configureclassmodel");
		// //$data['request'] = $this->allFormModel->getClass()->result();
		// $data['headerCss'] = 'headerCss/schoolregistrationcss';
		// $data['footerJs'] = 'footerJs/newschoolregistration';
		// $data['mainContent'] = 'classPromotionList';
		// $this->load->view("includes/mainContent", $data);
	}
   public function duereport(){
        $uri= $this->uri->segment(3);
        $data['uri']=$uri;
      	$data['pageTitle'] = 'Due Report';
		$data['smallTitle'] = 'Due Report';
		$data['mainPage'] = 'Due Report';
		$data['subPage'] = 'Due Report';
		$data['title'] = 'Due Report';
		//$this->load->model("configureclassmodel");
		//$data['request'] = $this->allFormModel->getClass()->result();
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'duereport';
		$this->load->view("includes/mainContent", $data);
  }
	public function stufkey(){
	    $stinfo = $this->db->get("guardian_info")->result();
	    foreach($stinfo as $rt):
	        $this->db->where("id",$rt->student_id);
	        $gft = $this->db->get("student_info");
	        if($gft->num_rows()>0){
	            
	        }
	        else{
	           echo  $rt->student_id."<br>";
	        }
	        endforeach;
	}
	function testrank(){
	   $this->load->model("exammodel");
	   $this->exammodel->getClassRank('6263','216','3');
	}

	
	function updateTransportfee(){

	    $schools = $this->db->get("general_settings");
	    foreach($schools->result() as $sch ):
	        $this->db->where("school_code",$sch->school_code);
	       $gettv =  $this->db->get("transport");
	       foreach($gettv->result() as $gv):
	           $this->db->where("v_id",$gv->id);
	           $amv = $this->db->get("transport_root_amount");
	           foreach($amv->result() as $am):
	               $data['root_id']=$am->id;
	               $data['fsd']     =$sch->fsd_id;
	               $data['amount']  =$am->transport_fee;
	               $this->db->insert("fsdwise_root_amount",$data);
	               endforeach;
	       endforeach;
	        
	        endforeach;

	   echo     "success"; 
	}

	function updateclassidinfeedeposite(){
		
		
		 $school_code = 2;
	    $query=$this->db->get("student_info");
		foreach($query->result() as $stuid):
			$updateclass['class_id']=$stuid->class_id;
		$this->db->where("student_id",$stuid->id);
		$this->db->update("fee_deposit",$updateclass);
		
		endforeach; 
		echo "done- ".$school_code;
		
	}

	
	function updateTranportFSD(){
		$tfm = $this->db->get("transport_fee_month");
		foreach($tfm->result() as  $row):
				$this->db->where("invoice_no",$row->invoice_number);
			$getfsd = $this->db->get("fee_deposit");
			if($getfsd->num_rows()>0){
				$data['fsd']=$getfsd->row()->finance_start_date;
				$this->db->where("invoice_number",$row->invoice_number);
				$this->db->update("transport_fee_month",$data);
				
			}else{
				$this->db->where("school_code",$row->school_code);
				$this->db->where("finance_start_date","2019-04-01");
				$fsdid = $this->db->get("fsd")->row()->id;
				$data['fsd']=$fsdid;
				$this->db->where("invoice_number",$row->invoice_number);
				$this->db->update("transport_fee_month",$data);
			}
		
		endforeach;
	}
	
	function sessionvalue(){
	    $ft = $this->db->get("ci_sessions")->result();
	    foreach($ft as $sv):
	        //echo "<pre>";
	        print_r($sv->user_data);
	        $mhd = unserialize($sv->user_data);
	        echo $mhd['username'];
	         echo $mhd['school_code'];
	         //echo "</pre>";
	        endforeach;
	}
	
	function updateOpeningClosing(){
		$cdate = date("Y-m-d");
		$this->load->model("daybookmodel");
		echo $this->daybookmodel->getClosingBalance($cdate);
	}

}