<!--  
Niktech software Solutions,niktechsoftware.com,schoolerp-niktech.in
  <meta name="description" content="Welcome to niktech software School business ERP . we proving school management erp software. we including online attendance with biometric attendance machine and tracking student with GPS technology & many other facilities in our school management erp system">
  <meta name="keywords" content="Enterprise resource planning,school,ERP,system software,attendance,biometric,online, school management,gps,niktech software solution, online result, online admit card,omr">
  <meta name="author" content="School management System software">
-->
<!-- start: FORM VALIDATION 1 PANEL -->

<div class="panel panel-white">
	<div class="panel-heading panel-red">
		<h4 class="panel-title">Employee <span class="text-bold">Salary Detail</span></h4>
		<div class="panel-tools">
			<div class="dropdown">
				<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
					<i class="fa fa-cog"></i>
				</a>
				<ul class="dropdown-menu dropdown-light pull-right" role="menu">
					<li>
						<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
					</li>
					<li>
						<a class="panel-refresh" href="#">
							<i class="fa fa-refresh"></i> <span>Refresh</span>
						</a>
					</li>
					<li>
						<a class="panel-config" href="#panel-config" data-toggle="modal">
							<i class="fa fa-wrench"></i> <span>Configurations</span>
						</a>
					</li>
					<li>
						<a class="panel-expand" href="#">
							<i class="fa fa-expand"></i> <span>Fullscreen</span>
						</a>
					</li>
				</ul>
			</div>
			<a class="btn btn-xs btn-link panel-close" href="#">
				<i class="fa fa-times"></i>
			</a>
		</div>
	</div>
	<div class="panel-body">
		<p style="color:#AE566C; font-weight: bolder;">
			Salary is not configue of this employee. Please configure salary first.
		</p>
		<hr>
		<form action="<?php echo base_url()?>employeeController/configureSalary" method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							EMPLOYEE ID <span class="symbol required"></span>
						</label>
						<?php 	                   
													$this->db->where("school_code",$this->session->userdata("school_code"));
													$this->db->where("id",$eid);
													//$this->db->where('fsd',$this->session->userdata('fsd'));
													$un= $this->db->get("employee_info")->row();
												    $qs = $qres->row();
                                                      print_r($qs);
                                                      exit();
                                                        
													?>
						<input type = "text"  value ="<?php echo $un->username; ?>" class="form-control" />
						<input type = "hidden" name = "empid" value ="<?php echo $eid; ?>"  />
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							EMPLOYEE NAME <span class="symbol required"></span>
						</label>
						<input type="text" name="empname" id="empname"  class="text-uppercase" value ="<?php echo $ename;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;" value="<?php if($qs->basicSalary){ echo $qs->basicSalary; }else{ echo "0.00";}?>">
							BASIC SALARY
						</label>
						<input type="text" class="form-control" name="basicSalary" id="basicSalary"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							PROVIDENT FUND
						</label>
						<input type="text"  name="ProvidentFund" id="ProvidentFund" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							STATE INSURANCE (SI)
						</label>
						<input type="text"   name="employeeStateInsurance" id="employeeStateInsurance" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							MEDICAL ALLOWANCE (MA)
						</label>
						<input type="text"  name="medicalAllowance" id="medicalAllowance" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							TRANSPORT ALLOWANCE (TA)
						</label>
						<input type="text"  name="transportAllowance" id="transportAllowance" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							DEARNESS ALLOWANCE (DA)
						</label>
						<input type="text"  name="dearnessAllowance" id="dearnessAllowance" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							HOUSE RENT ALLOWANCE (HRA)
						</label>
						<input type="text" name="houseRentAllowance" id="houseRentAllowance" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							Total Leave
						</label>
						<input type="text" name="skillAllowance" id="skillAllowance"  disabled="disabled" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							Deduction Due to Absent 
						</label>
						<input type="text" name="spcialAllowance" id="spcialAllowance" disabled="disabled" class = "form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							ENCENTIEVE
						</label>
						<input type="text"  name="encentieve" id="encentieve" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							BONUS
						</label>
						<input type="text" name="bonus" id="bonus" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#AE566C; font-weight: bolder;">
							GROSS
						</label>
						<input type="text" name="gross_s" id="gross_s" class="form-control"/>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-8">
					<p style="color:#AE566C; font-weight: bolder;">
						After checking all detail click save &amp; configure salary.
					</p>
				</div>
				<div class="col-md-4">
					<button class="btn btn-red btn-block" type="submit">
						<i class="fa fa-save"></i> SAVE SALARY FORMAT</i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
<?php 
	$fieldID = array(
			"#basicSalary",
			"#dearnessAllowance",
			"#medicalAllowance",
			"#transportAllowance",
			"#houseRentAllowance",
			"#skillAllowance",
			"#spcialAllowance",
			"#encentieve",
			"#bonus",
			"#ProvidentFund",
			"#employeeStateInsurance"
	);
	foreach($fieldID as $field):
?>
$("<?php echo $field;?>").keyup(function(){
	
	var basic = Number($("#basicSalary").val());
	var da = Number($("#dearnessAllowance").val());
	var ma = Number($("#medicalAllowance").val());
	var ta = Number($("#transportAllowance").val());
	var ha = Number($("#houseRentAllowance").val());
	var sa = Number($("#skillAllowance").val());
	var spa = Number($("#spcialAllowance").val());
	var encentieve = Number($("#encentieve").val());
	var bonus = Number($("#bonus").val());


	var pf = Number($("#ProvidentFund").val());
	var esi = Number($("#employeeStateInsurance").val());
	var gross = (basic + da + ma + ta + ha + sa + spa + encentieve + bonus) - (pf + esi);
	//$("#ProvidentFund").val(pf);
	$("#gross_s").val(gross);
});

<?php endforeach;?>
//$("gross_s")


FormElements.init();
</script>