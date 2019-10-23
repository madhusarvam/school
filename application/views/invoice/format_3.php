<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title><?php echo $title; ?></title>

    <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
    <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/prin_result.css'
        media="print" />
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

    <style type="text/css">
    @media print {
        body * {
            visibility: hidden;
        }

        #printcontent * {
            visibility: visible;
        }

        #printcontent {
            position: absolute;
            top: -20px;
            left: 30px;
        }
    }

    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }


    .button2 {
        background-color: #008CBA;
        color: white;
        border: 2px solid #008CBA;
    }

    .button2:hover {
        background-color: #4CAF50;
        color: white;
        border: 2px solid #4CAF50;
    }

    .nob {
        border: none;
    }
    </style>
    <script>
    function convert_number(number) {
        if ((number < 0) || (number > 999999999)) {
            return "Number is out of range";
        }
        var Gn = Math.floor(number / 10000000); /* Crore */
        number -= Gn * 10000000;
        var kn = Math.floor(number / 100000); /* lakhs */
        number -= kn * 100000;
        var Hn = Math.floor(number / 1000); /* thousand */
        number -= Hn * 1000;
        var Dn = Math.floor(number / 100); /* Tens (deca) */
        number = number % 100; /* Ones */
        var tn = Math.floor(number / 10);
        var one = Math.floor(number % 10);
        var res = "";

        if (Gn > 0) {
            res += (convert_number(Gn) + " Crore");
        }
        if (kn > 0) {
            res += (((res == "") ? "" : " ") +
                convert_number(kn) + " Lakhs");
        }
        if (Hn > 0) {
            res += (((res == "") ? "" : " ") +
                convert_number(Hn) + " Thousand");
        }

        if (Dn) {
            res += (((res == "") ? "" : " ") +
                convert_number(Dn) + " hundred");
        }


        var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven",
            "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");

        if (tn > 0 || one > 0) {
            if (!(res == "")) {
                res += " and ";
            }
            if (tn < 2) {
                res += ones[tn * 10 + one];
            } else {

                res += tens[tn];
                if (one > 0) {
                    res += ("-" + ones[one]);
                }
            }
        }

        if (res == "") {
            res = "zero";
        }
        return res;
    }
    </script>

    <style>
    table,
    tr,
    th {

        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <div id="printcontent" align="center">
        <div id="page-wrap" style="margin-top: 70px;height: 1280px;width:960px; border:1px solid #333;">
	<?php 
			$school=$this->session->userdata('school_code');
			$row2=$this->db->get('db_name')->row()->name;		
		?>
    <div style="width:100%; height:1280px;margin-left:auto; margin-right:auto; border:1px  solid blue;">
       
                <div style="width:95%; margin-left:auto; margin-right:auto; border:1px  solid yellow; height:auto;">
                    <?php
						$school_code = $this->session->userdata("school_code");
						$this->db->where("id",$school_code);
						$info =$this->db->get("school")->row();
					?>
                    <table style="width: 100%;">
                        <tr style="background-color: #b38cb1;">
                           <td  style="border: none;">
                                <img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/empImage/<?php echo $info->logo;?>"
                                    alt="" style="height: 100px;width: 100px;" />
                                </br><label style="font-size: 14px;">Aff.No. - <?php echo $info->registration_no;?></label>
                            </td>
                             <?php if($school == 13 && $row2=="A"){ ?>
                            <td  style="border: none;" >
                                <h1 style="font-size: 35px; font-family: Algerian;">
                                    <?php echo $info->school_name;?></h1>
                              <!--  <h2 style="">
                                   	<?php if($info->address1){echo $info->address1; }else{echo $info->address2; }echo ",".$info->city; ?>
                                </h2>
                                <h2 style="">
                                <?php echo $info->state." - ".$info->pin.", Contact No. : " ;
									if(strlen($info->mobile_no > 0 )){echo $info->mobile_no.", ".$info->other_mobile_no ;} ?>
                                </h2>-->
                            </td>
                            <td style="border: none;">
                                <img src="<?php echo base_url(); ?>assets/images/cbse_logo.png" alt="" style="height: 100px;width: 100px;">
                                <br /><label style="font-size: 14px;">School Code - 70462</label>
                            </td>
                            <?php }else{ ?>
                             <td colspan="2" style="border: none;" >
                                <h1 style="font-size: 35px;">
                                    <?php echo $info->school_name;?></h1>
                                <h2 style="">
                                   	<?php if($info->address1){echo $info->address1; }else{echo $info->address2; }echo ",".$info->city; ?>
                                </h2>
                                <h2 style="">
                                <?php echo $info->state." - ".$info->pin.", Contact No. : " ;
									if(strlen($info->mobile_no > 0 )){echo $info->mobile_no.", ".$info->other_mobile_no ;} ?>
                                </h2>
                            </td>
                            <?php } ?>
							<!--<div class="row">
							<div class="col-md-2"><img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/empImage/<?php echo $info->logo;?>"
                                    alt="" width="120" /></div>
							<div class="col-md-10"><h1 style="color:white;text-align: center;font-size: 30px;">
                                    <?php echo $info->school_name;?></h1>
                                <h2 style="color:white;text-align: center;">
                                   	<?php if($info->address1){echo $info->address1; }else{echo $info->address2; }echo ",".$info->city; ?>
                                </h2>
                                <h2 style="color:white;text-align: center;">
                                <?php echo $info->state." - ".$info->pin.", Contact No. : " ;
									if(strlen($info->mobile_no > 0 )){echo $info->mobile_no.", ".$info->mobile_no ;} ?>
                                </h2></div>
							</div>-->
						</tr>
						 <tr class="wight" style="font-size: 14px;">
							<td >
								<span style="text-transform: uppercase;">Scholar ID: <?= $studentInfo->username; ?></span><br>
								<span style="text-transform: uppercase;">Student Name: <?= strtoupper($studentInfo->name);?> </span><br>
							   <?php
										   $this->db->where('school_code',$school_code);
										   $this->db->where('id',$classid->class_id);
										   $classname=$this->db->get('class_info');
										  
											?>
								  <?php if($classname->num_rows()>0){
								  $classdf=$classname->row();
								  $this->db->where("id",$classdf->section);
								  $secname = $this->db->get("class_section")->row()->section;
								  ?>
								<span style="text-transform: uppercase;">Class: <?php  echo $classdf->class_name."-".$secname; ?></span>
								 <?php } else { echo "something wrong please try again";  }?>
							
							</td>
							<td >
								 <span style="text-transform: uppercase;">Mother's Name: <?= strtoupper($parentInfo->mother_full_name); ?></span><br>
								<span style="text-transform: uppercase;">Father's Name: <?= strtoupper($parentInfo->father_full_name); ?></span><br>
							</td>
							<td class="">
								<img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/stuImage/<?php echo $studentInfo->photo; ?>"  alt="" width="90" height="105" />
							</td>
						</tr>
						<tr>
						
							<td style="border: none;" colspan="3">
								<center><h2 style="border: 2px solid #000; padding: 5px; width: 209px; ">
									Progress Report [ <?php 
									        $this->db->where('school_code',$school_code);
                                            $this->db->where('id',$fsd);
                                     $fsd2= $this->db->get('fsd')->row()->finance_end_date;
									echo (date('Y', strtotime('-1 year', strtotime($fsd2)) )."-". date('Y', strtotime($fsd2))) ;?>]<br>
									<?php 
									$this->db->where("school_code",$school_code);
								   $this->db->where("fsd",$this->session->userdata('fsd'));
									$this->db->where("stu_id",$studentInfo->id);
									$result= $this->db->get("exam_info")->result();
									$c="";$d="";
									foreach($result as $d12):
									$c = $d12->class_id;
					  
									break;
									endforeach;
									if(strlen($c)>0){	
								}else{
									echo " There are no marks entry for this Student";
								} 
									?>
								</h2></center>
							</td>
							
						</tr>
                </table>
            
            <br>
             <!-- scholar accademy start -->
            <?php if($school == 13 && $row2=="A"){ ?>
                        <div>
                <table
                    style="width:95%;text-transform: uppercase; margin-left:auto; margin-right:auto; border:1px solid black; background-color:white;font-weight:bold;font-size: 14px;">
                    <tr>
                        <th colspan="1" rowspan="2" style="background-color:#9dfa5b;">SCHOLASTIC AREA </th>
						<th colspan="5" rowspan="2" style="background-color: #efef70;">TERM 1 (100 MARKS) </th>
						<!--<th colspan="5" rowspan="2">Term 2 (100 Marks) </th>-->
                       <!-- <th colspan="3">OVERALL</th>-->

                    </tr>

                    <tr>
                       <!-- <th colspan="3">Term 1 (50)+ Term 2(50)</th>-->
                    </tr>

                    <tr>

                        <th colspan="1" rowspan="1" style="text-transform: uppercase;background-color:#9dfa5b;">Subjects</th>
                        <!--1st term -->
						<?php 
							$i=1;
							 foreach ($examid as $value):
							   $examid1=$value->exam_id;	
							   $this->db->where('id',$examid1);
							    $this->db->where('term',1);
							   $examname=$this->db->get('exam_name');   
							   if ($examname->num_rows()>0){
							   $examname=$examname->row();
						?> 
						<td colspan="1" style="text-transform: uppercase; font-weight:bold; background-color: #efef70;"><?php echo $examname->exam_name;?></td>
                        <?php 
						}
						$i++;
						endforeach ;
						if(!$i%2==0){ ?>
						<td class="center bold" style="text-transform: uppercase; font-weight:bold;background-color:#efef70;">Total</td> 
						<?php } ?>
						<!--2nd term-->
						<?php 
							$i=1;
							 foreach ($examid as $value):
							   $examid1=$value->exam_id;	
							   $this->db->where('id',$examid1);
							   $this->db->where('term',2);
							   $examname=$this->db->get('exam_name');   
							   if ($examname->num_rows()>0){
							   $examname=$examname->row();
						?> 
						<td colspan="1" ><?php echo $examname->exam_name;?></td>
                        <?php 
						}
						$i++;
						endforeach ;
						if(!$i%2==0){ ?>
						<!--<td class="center bold" style="text-transform: uppercase;">Total</td> -->
						<?php } ?>
                       <!--<th style="text-transform: uppercase;">Grand<br> Total</th>
                        <th rowspan="1" style="text-transform: uppercase;">Grade</th>
                        <th rowspan="1" style="text-transform: uppercase;">Rank</th>-->
                    </tr>

                    <?php 
                    $dhtm=0;
                        $htotal = 0;  
                    	$ctotal =array();
                        $ctotal[0]=0;
                        $ctotal[1]=0;
                        $ctotal[2]=0;
                        $ctotal[3]=0;
                        $ctotal[4]=0;
                        $ctotal["tot2"]=0;
                        $ctotal["tot4"]=0;
						$ctotal["tot5"]=0;
                        $ctotal["tot6"]=0;
                        $cumulativetotal=0;
           $totalp= 0;   
           $pi=1;
		   $grandtotal=0;
foreach($resultData as $sub){
$this->db->where('class_id',$classid->class_id);
$this->db->where('id',$sub['subject']);
$subjectname=$this->db->get('subject'); 

if($subjectname->num_rows()>0){
    $subjectname=$subjectname->row();
	?><?php $totalp+=200;?>
                 <tr class="wight"> 
					 <td class="subject" style="background-color:#9dfa5b;">	
                     <?php echo  $subjectname->subject;?> 
					</td>
			     <?php 
 				$ttal=0;
                 $gtptal=0;
                 //$subtatal=0;
					$i=1; $t=0;
				//	$coltptal=0; 
					foreach ($examid as $value):?>
					<td class="center" style="background-color: #efef70;">	
					<?php
					$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',$value->exam_id);
					$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();
							////////////////////////	
					if(is_numeric($marks->marks)){
					  $gtptal= $gtptal+$marks->marks;
					}else{ $gtptal= $gtptal;}
							echo $marks->marks;
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
			$exammm_row=	$this->db->get('exam_max_subject')->row();
				$exammm=	$exammm_row->max_m;
			            
			if(is_numeric($exammm)){
					  $ttal=$ttal+$exammm;
				    $dhtm=$exammm+$dhtm;
					}else{ $ttal= $ttal;
					 $dhtm= $dhtm;   
					}
						}else if($marks->num_rows()==0){ $exammm=" "; }?><?php echo "/" .$exammm; ?>
					</td> 
				<?php $i++; $t++;endforeach; ?>
				<td class="center bold" style="background-color: #efef70;"><?php  $grandtotal=$grandtotal+$gtptal; echo $gtptal;  ?>/<?php print_r($ttal);?>
			   <?php ?></td>
				<!--<td class="center bold"><?php   echo $gtptal;  ?></td>
				<td class="center bold"><?php  echo $gtptal;  ?></td>-->
			  <!-- <td class="center bold"></td>-->
			  <!-- <td class="center bold"></td>-->
				</tr>
                <?php } }?>
                </table>
            </div>
            <br>
            <div>
                <table
                    style="width:95%; margin-left:auto; margin-right:auto; border:1px solid black; background-color:orange;font-size: 14px;">
                     <tr>
                        <td> Overall Marks : <?php echo $grandtotal; ?>/<?php echo $dhtm;?> </td>
                        <td> Percentage: <?php if($dhtm>0){echo $per=round((($grandtotal*100)/$dhtm), 2);}?>%  </td>
                       <!-- <td >
                             Grade: <label style="text-transform: uppercase;"><?php if($dhtm>0){echo $gradecal =calculateGrade($per,$classid->class_id);}?></label>
                        </td>
                        <td>
                            Rank
                        </td>-->
                    </tr>
                </table>
            </div>
            <!--scholar academy end-->
            <?php }else{ ?>
            <!--other result start-->
            <div>
                <table
                    style="width:95%;text-transform: uppercase; margin-left:auto; margin-right:auto; border:1px solid black; background-color:white;">
                    <tr>
                        <th colspan="1" rowspan="2">SCHOLASTIC AREA </th>
						<th colspan="5" rowspan="2">TERM 1 (100 MARKS) </th>
						<!--<th colspan="5" rowspan="2">Term 2 (100 Marks) </th>-->
                       <!-- <th colspan="3">OVERALL</th>-->

                    </tr>

                    <tr>
                       <!-- <th colspan="3">Term 1 (50)+ Term 2(50)</th>-->
                    </tr>

                    <tr>

                        <th colspan="1" rowspan="1" style="text-transform: uppercase;">Subjects</th>
                        <!--1st term -->
						<?php 
							$i=1;
							 foreach ($examid as $value):
							   $examid1=$value->exam_id;	
							   $this->db->where('id',$examid1);
							    $this->db->where('term',1);
							   $examname=$this->db->get('exam_name');   
							   if ($examname->num_rows()>0){
							   $examname=$examname->row();
						?> 
						<td colspan="1" style="text-transform: uppercase;"><?php echo $examname->exam_name;?></td>
                        <?php 
						}
						$i++;
						endforeach ;
						if(!$i%2==0){ ?>
						<td class="center bold" style="text-transform: uppercase;">Total</td> 
						<?php } ?>
						<!--2nd term-->
						<?php 
							$i=1;
							 foreach ($examid as $value):
							   $examid1=$value->exam_id;	
							   $this->db->where('id',$examid1);
							   $this->db->where('term',2);
							   $examname=$this->db->get('exam_name');   
							   if ($examname->num_rows()>0){
							   $examname=$examname->row();
						?> 
						<td colspan="1" ><?php echo $examname->exam_name;?></td>
                        <?php 
						}
						$i++;
						endforeach ;
						if(!$i%2==0){ ?>
						<!--<td class="center bold" style="text-transform: uppercase;">Total</td> -->
						<?php } ?>
                       <!--<th style="text-transform: uppercase;">Grand<br> Total</th>
                        <th rowspan="1" style="text-transform: uppercase;">Grade</th>
                        <th rowspan="1" style="text-transform: uppercase;">Rank</th>-->
                    </tr>

                    <?php 
                    $dhtm=0;
                        $htotal = 0;  
                    	$ctotal =array();
                        $ctotal[0]=0;
                        $ctotal[1]=0;
                        $ctotal[2]=0;
                        $ctotal[3]=0;
                        $ctotal[4]=0;
                        $ctotal["tot2"]=0;
                        $ctotal["tot4"]=0;
						$ctotal["tot5"]=0;
                        $ctotal["tot6"]=0;
                        $cumulativetotal=0;
           $totalp= 0;   
           $pi=1;
		   $grandtotal=0;
foreach($resultData as $sub){
$this->db->where('class_id',$classid->class_id);
$this->db->where('id',$sub['subject']);
$subjectname=$this->db->get('subject'); 

if($subjectname->num_rows()>0){
    $subjectname=$subjectname->row();
	?><?php $totalp+=200;?>
                   <tr class="wight"> 
					 <td class="subject">	
                     <?php echo  $subjectname->subject;?> 
					</td>
			     <?php 
 				$ttal=0;
                 $gtptal=0;
                 //$subtatal=0;
					$i=1; $t=0;
				//	$coltptal=0; 
					foreach ($examid as $value):?>
					<td class="center">	
					<?php
					$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',$value->exam_id);
					$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();	
					if(is_numeric($marks->marks)){
					  $gtptal= $gtptal+$marks->marks;
					}else{ $gtptal= $gtptal;}
					
							echo $marks->marks;
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
			$exammm_row=	$this->db->get('exam_max_subject')->row();
				$exammm=	$exammm_row->max_m;
			            
			if(is_numeric($exammm)){
					  $ttal=$ttal+$exammm;
				    $dhtm=$exammm+$dhtm;
					}else{ $ttal= $ttal;
					 $dhtm= $dhtm;   
					}
						}else if($marks->num_rows()==0){ $exammm=" "; }?><?php echo "/" .$exammm; ?>
					</td> 
				<?php $i++; $t++;endforeach; ?>
				<td class="center bold"><?php  $grandtotal=$grandtotal+$gtptal; echo $gtptal;  ?>/<?php print_r($ttal);?>
			   <?php ?></td>
				<!--<td class="center bold"><?php   echo $gtptal;  ?></td>
				<td class="center bold"><?php  echo $gtptal;  ?></td>-->
			  <!-- <td class="center bold"></td>-->
			  <!-- <td class="center bold"></td>-->
				</tr>
                    <?php } } ?>
                </table>
            </div>
            <br>
            <div>
                <table
                    style="width:95%; margin-left:auto; margin-right:auto; border:1px solid black; background-color:white;">
                     <tr>
                        <td>Overall Marks : <?php echo $grandtotal; ?>/<?php echo $dhtm;?></td>
                        <td>Percentage  : <?php if($dhtm>0){echo $per=round((($grandtotal*100)/$dhtm), 2);}?>% </td>
                        <td >Grade  : <label style="text-transform: uppercase;"><?php if($dhtm>0){echo $gradecal =calculateGrade($per,$classid->class_id);}?></label></td>
                        <td>Rank :</td>
                    </tr>
                </table>
            </div>
            <!--other result end-->
            <?php } ?>
            <br>

            <div style=" width:95%; margin-left:auto; margin-right:auto;font-size: 14px;">
                <div style="width:50%; float:left;">

                    <table style="width:90%; border:1px solid black;">
                        <tr style="background-color:#9dfa5b;">
                            <th colspan="3" style="text-transform: uppercase;">Co- SCHOLASTIC Area</th>
                        </tr>

                        <tr style="background-color:#9dfa5b;">
                            <th style="text-transform: uppercase;"> Activity </th>
                            <th>TERM 1</th>
                            
                        </tr>

                        <!-- Dynamic -->
                         <tr style="background-color: #c3c3f5;">
                            <td >Work Education</td>
                            <td><?php  if($per >= 61 && $per < 81 ){ echo "B";}else{if($dhtm>0){echo $gradecal =co_scolastic($per,$classid);}}  ?></td>      
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Art Education</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>   
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Health & Physical Education</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Thinking Skills</td>
                            <td><?php  if($per >= 61 && $per < 81 ){ echo "B";}else{if($dhtm>0){echo $gradecal =co_scolastic($per,$classid);}}  ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Sports</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>   
                        </tr>
                         <?php if($school == 13 && $row2=="A"){ ?>
                        <?php }else{ ?>
                        <tr>
                            <td>Scientific Skills</td>
                            <td>A</td>  
                        </tr>
                        <tr>
                            <td>Social Skills</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Yoga/NCC</td>
                            <td>A</td>
                        </tr>
                        <?php } ?>
                    </table>
                    <table style="width:70%; border:1px solid black; background-color:white;">
                        <tr>
                            <?php
                            $this->db->where("class_id",$classid->class_id);
							$this->db->where("school_code",$this->session->userdata('school_code'));
							$dt=$this->db->get("school_attendance");
						    $atotal=$dt->num_rows();
							$this->db->where('id',$this->session->userdata('fsd'));
							$fsdval=$this->db->get('fsd')->row();
							
							$this->db->where('a_date >=',$fsdval->finance_start_date);
							$this->db->where('a_date <=',$fsdval->finance_end_date);
							$this->db->where('stu_id',$studentInfo->id);
							$this->db->where('attendance',0);
							$row1=$this->db->get('attendance');
							$absnt=$row1->num_rows();
							$present =$atotal-$absnt;
							?>
							 <?php if($school == 13 && $row2=="A"){ ?>
                            <td style="background-color:orange;">Attendance:&nbsp;&nbsp;&nbsp;&nbsp;<label> </label></td>
                          <?php  }
                            else {?>
                              <td>Attendance:&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $present; ?>/<?php echo $atotal; ?></label></td>
                              <?php } ?>
                        </tr>
                    </table>


                </div>



                <div style="width:50%; float:right;">

                    <table style="width:90%; border:1px solid black;">

                        <tr style=" background-color:#9dfa5b;">
                            <th colspan="3" style="text-transform: uppercase;"> Discipline</th>
                        </tr>
                        <tr style="background-color:#9dfa5b;">
                            <th style="text-transform: uppercase;"> Element </th>
                            <th>TERM 1</th>
                           
                        </tr>

                        
                        <!-- Dynamic -->
                        <tr style="background-color: #c3c3f5;">
                            <td>Regularity & Punctuality</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Behaviour & Values</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Attitude Towards Teachers</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Attitude Towards School-Maltes</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <tr style="background-color: #c3c3f5;">
                            <td>Respectfulness For Rules & Reulations</td>
                            <td><?php if($dhtm>0){echo $gradecal =co_scolastic($per,$classid->class_id);} ?></td>
                        </tr>
                        <?php if($school == 13 && $row2=="A"){ ?>
                        <?php }else{ ?>
                        <tr>
                            <td>Sincerity</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Attitude Towards Society</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Attitude Towards Nation</td>
                            <td>A</td>
                        </tr>
                        <?php } ?>
                    </table>

                    <table style="width:70%; border:1px solid black; background-color:white;">
                        <tr>
                            <td style="background-color:orange;">Remarks:&nbsp;&nbsp;&nbsp;&nbsp;<label><?php if($dhtm>0){echo $gradecal =remarks($per,$classid->class_id);} ?></label></td>
                        </tr>
                    </table>

                </div>

            </div>

            <br />
            <div>
            <p><label style="text-transform: uppercase;font-size: 14px;">Instructions</label></p>
            <p><label style="font-size: 14px;">Grading Scale For Scholastic areas:Grades are awarded on a 8-point Grading Scale as Follows-</label></p>
            </div></br>
            <div>
                <table
                    style="width:95%;  margin-left:auto; margin-right:auto; border:1px solid black; background-color:white;font-size: 14px;">
                    <tr style="background-color: orange;">
                        <th>
                            MARKS RANGE
                        </th>
                        <th>
                            GRADE
                        </th>
                    </tr>
                    <!-- Dynamic -->
                    <?php if($school == 13 && $row2=="A"){ ?>
                    <tr style="background-color: #d8c4af;">
                        <td>181-200</td>
                        <td>A1</td>
                    </tr>
                    <tr style="background-color: #d8c4af;">
                        <td>161-180</td>
                        <td>A2</td>
                    </tr>
                    <tr style="background-color: #d8c4af;">
                        <td>141-160</td>
                        <td>B1</td>
                    </tr>
                    <tr style="background-color: #d8c4af;">
                        <td>121-140</td>
                        <td>B2</td>
                    </tr>
                    <tr style="background-color: #d8c4af;">
                        <td>101-120</td>
                        <td>C1</td>
                    </tr>
                     <tr style="background-color: #d8c4af;">
                        <td>81-100</td>
                        <td>C2</td>
                    </tr>
                     <tr style="background-color: #d8c4af;">
                        <td>66-80</td>
                        <td>D</td>
                    </tr>
                     <tr style="background-color: #d8c4af;">
                        <td>Needs Improvement</td>
                        <td>E</td>
                    </tr>
                    <?php }else{ ?>
                    <tr>
                        <td>91-100</td>
                        <td>A1</td>
                    </tr>
                    <tr>
                        <td>81-90</td>
                        <td>A2</td>
                    </tr>
                    <tr>
                        <td>71-80</td>
                        <td>B1</td>
                    </tr>
                    <tr>
                        <td>61-70</td>
                        <td>B2</td>
                    </tr>
                    <tr>
                        <td>51-60</td>
                        <td>C1</td>
                    </tr>
                     <tr>
                        <td>41-50</td>
                        <td>C2</td>
                    </tr>
                     <tr>
                        <td>33-40</td>
                        <td>D</td>
                    </tr>
                     <tr>
                        <td>32 & Below</td>
                        <td>E(Needs Improvement)</td>
                    </tr>
                    <? } ?>

                </table>
				<?php 
				function calculateGrade($val,$classid){
								if($val >= 91 && $val < 101):
									return 'A1';
								elseif($val >= 81 && $val < 91):
									return 'A2';
								elseif($val >= 71 && $val < 81):
									return 'B1';
								elseif($val >= 61 && $val < 71):
									return 'B2';
								elseif($val >= 51 && $val < 61):
									return 'C1';
								elseif($val >= 41 && $val < 51):
									return 'C2';
								elseif($val >= 33 && $val < 41):
									return 'D';
								else:
									return 'E';
								endif;
								
							}
							function remarks($val,$classid){
								if($val >= 91 && $val < 101):
									return 'Excellent';
								elseif($val >= 81 && $val < 91):
									return 'Very Good';
								elseif($val >= 71 && $val < 81):
									return 'Good';
								elseif($val >= 61 && $val < 71):
									return 'Fair';
								elseif($val >= 51 && $val < 61):
									return 'Work Hard';
								else:
									return 'Need Special Care/Attention';
								endif;
								
							}
							function co_scolastic($val,$classid){
								if($val > 80):
									return 'A';
								elseif($val >= 61  && $val < 81 ):
									return 'A';
								else:
									return 'B';
								endif;
							}
							?>
            </div>
            <br>
            <div  style="">
		<!--	<div  style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Congratulations! Promoted to Next Class </div>-->
			</div>
			<br>
            <div>
                <table style="width:95%;background-color:#9dfa5b;font-size: 14px;">
					<tr style="height: 100px;">
						<td>		
                            Date :
                        </td>
                        <td>
                            Class Teacher :
                        </td>
                        <td>
                            Principal :<div>	<img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/empImage/<?php echo $info->principle_sign;?>" alt="" width="100" height="70" style="margin-top=-60px;" />
		</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div></div>
    </div>
    </div>
	<div class="invoice-buttons" style="text-align:center;">
    <button class="button button2" type="button" onclick="window.print();">
        <i class="fa fa-print padding-right-sm"></i> Print
    </button>
	</div>
</body>


</html>