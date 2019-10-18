<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title><?php echo $title; ?></title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/prin_result.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">



		body {
			background: #e5952d;
			font-family: arial;
			line-height: 17px;
			font-size: 14px;
		}
		span {
			display: block;
		}
		table {
			border-collapse: collapse;
		}
		table tr td{
			border: 1px solid #000;
			width: 9.1%;
			padding: 6px;
			vertical-align: top;
		}
		.studentImage {
			width: 70px;
			height: 70px;
		}
		.tableHeader {
			background: #a1d657;
		}
		.wight {
			background: #FFFFFF;
		}
		.yellow {
			background: #ffff99;
		}
		.blue {
			background: #baceff;
		}
		.pink {
			background: #ffe0f1;
		}
		.schoolTitle {
			font-size: 20px;
			font-weight: bold;
			    padding: 5px;
		}
		
		.addressTitle{
			font-size: 15px;
			font-weight: bold;
		}
		.center {
			text-align: center;
		}
		.bold {
			font-weight: bold;
		}
		.report {
			font-size: 17px;
			font-weight: bolder;
			padding:5px;
		
			
		}
		.report1 {
			font-size: 15px;
		}
		.subject {
			font-size: 12px;
			font-weight: bold;
		}
		#hiderow,
		.delete {
		  display: none;
		}
		/* ---------------------------------------------------- BUtton CSS end ----------------------------------------- */
		@media print
		{
		    body * { visibility: visible; }
		    .non-printable { display: none; }
		    .printcontent * { visibility: visible; }
		    
		    @page
		   {
		   	height: 645px;
		   	width: 873px;
		   	margin-left:350px;
		   	margin-right:350px;
		  }
		}
		.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
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

	</style>
</head>
<body>
    <div id="printcontent">
<?php $school_code = $this->session->userdata("school_code");

    $this->db->where("id",$school_code);
    $info =$this->db->get("school")->row();
    
?>
    <table width="98%" class="printcontent"style="margin-top:50px; margin-left:auto; margin-right:auto;">
        <tr style="border-top:none;">
            <td class="center" style="border:none;">
               
                <img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/empImage/<?= $this->session->userdata('logo') ?>" alt="" style="width:100px; height:100px; float:left;" />
                <!--</br><i>Aff.No. - <?php echo $info->registration_no;?></i>-->
                </td>
                <td colspan="9" class="center" style="border:none;">
           
            <div style="text-align:center;" >
                <span class="schoolTitle"><?php if(($classid->class_id==98)||($classid->class_id==99) || ($classid->class_id==116)||($classid->class_id== 100) ||($classid->class_id== 101) ||($classid->class_id== 102) ||($classid->class_id== 103) ||($classid->class_id== 104) ){ echo "THE MANNER SCHOOL";}else{echo $info->school_name;}?></span>
               <span class="addressTitle"><?php echo $info->address1." ".$info->address2." ".$info->city." ".$info->state." - ".$info->pin; ?></span>
                <span class="report">PROGRESS REPORT</span>
                       <?php //$fsd1=$this->session->userdata('fsd');
                             $this->db->where('school_code',$school_code);
                             $this->db->where('id',$fsd);
                            $fsd2=$this->db->get('fsd')->row()->finance_end_date;

                       ?>
        <span class="report1">ACADEMIC SESSION <?php echo (date('Y', strtotime('-1 year', strtotime($fsd2)) )."-". date('Y', strtotime($fsd2))) ;?></span>
        </div>
            </td>
           <td class="center" style="border:none; display:none;">
               
                <img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/empImage/<?= $this->session->userdata('logo') ?>" alt="" style="width:100px; height:100px; float:right;" />
                <!--</br><i>Aff.No. - <?php echo $info->registration_no;?></i>-->
                </td>
        </tr>
        <tr class="wight">
            <td colspan="5">
                <span style="text-transform: uppercase;">Scholar ID: <?= $studentInfo->username; ?></span>
                <span style="text-transform: uppercase;">Scholar Name:  <?= strtoupper($studentInfo->name);?> </span>
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
                <span></span>
            </td>
            <td colspan="5">
                           
                 <span style="text-transform: uppercase;">Mother's Name: <?= strtoupper($parentInfo->mother_full_name); ?></span>
                <span style="text-transform: uppercase;">Father's Name: <?= strtoupper($parentInfo->father_full_name); ?></span>
            </td>
			<td class="">
				<img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/stuImage/<?php echo $studentInfo->photo; ?>"  alt="" width="90" height="105" />

			</td>
		</tr>
		<!---dds manner marks table start--->
		<?php 
			$school=$this->session->userdata('school_code');
			$row2=$this->db->get('db_name')->row()->name;		
		if($school == 8 && $row2 == "A"){ ?>
		<tr class="tableHeader">
			<td class="center" colspan="1" >A. SCHOLASTIC AREAS</td>
		<td class="center" colspan="4">TERM - 1</td>
		<td class="center" colspan="4">TERM - 2</td>
           
			<td colspan="2" style="text-transform: uppercase;">Cumulative Evaluation</td>
		</tr>
		<tr class="yellow">
		<td>SUBJECT</td>
			<?php
			$dhtm=0;
           $i=1; 
		   $arrco[1]=0;
           $arrco[2]=0;
           $arrco[3]=0;
           $arrco[4]=0;
           $arrco[5]=0;
            $arrco[6]=0;
           foreach ($examid as $value):
              $examid1=$value->exam_id;	
             $this->db->where('id',$examid1);
             $examname=$this->db->get('exam_name'); 
             
             if ($examname->num_rows()>0){
             $examname=$examname->row(); 
             	?>  <td style="text-transform: uppercase;"><?php echo $examname->exam_name;?><?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){if($i%2==1){echo "[20]";}else{echo "[30]";}}else{
             	if(($classid->class_id==100)||($classid->class_id==101)||($classid->class_id== 102) ||($classid->class_id== 103) ||($classid->class_id== 104) ){ if($i%2==1){echo "[40]";}else{echo "[60]";}}else{ if($i%2==1){echo "[20]";}else{echo "[80]";}}}?></td>
             	<?php 
             }else{
             		?>  <td></td>
             	<?php
             }
			?>

          
            <?php if($i%2==0){ ?>
            <td class="center bold" style="text-transform: uppercase;">Total<br>
           <?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[50]";}else{echo "[100]";}?>
        </td>
			<td class="center bold">Grade</td>
   <?php } ?>
 			<?php $i++; endforeach ;
for($j=$i; $j < 5; $j++){
?>
<td></td>
 <?php if($i%2==0){ ?>
            <td style="text-transform: uppercase;">Total <br><?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "50";}else{echo "100";}?></td>
			<td style="text-transform: uppercase;">Grade</td>
      <?php }}
			?>
			<td colspan="1" class="text-center" style="text-transform: uppercase;">Cumulative Marks<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[100]";}else{echo "[200]";}?></td>
			<td colspan="1" style="text-transform: uppercase;">Grade</td>
		</tr>
		<?php $htotal = 0;  


		$ctotal =array();

$ctotal[0]=0;
$ctotal[1]=0;
$ctotal[2]=0;
$ctotal[3]=0;
$ctotal[4]=0;
$ctotal["tot2"]=0;
$ctotal["tot4"]=0;
$ctotal["tot6"]=0;
$cumulativetotal=0;

       $totalp= 0;   
       $pi=1;
		foreach($resultData as $sub):?>

			
                    <?php 
                    $this->db->where('class_id',$classid->class_id);
                    $this->db->where('id',$sub['subject']);
                    $subjectname=$this->db->get('subject');
                    if($subjectname->num_rows()>0){
                        $subjectname=$subjectname->row();
                    
                    if(($subjectname->subject == "VALUE EDUCATION") || ($subjectname->subject =="WORK EDUCATION") || ($subjectname->subject == "ART/URDU")||($subjectname->subject == "SENSORIAL ACTIVITIES" ) || ($subjectname->subject == "HEALTH & PHYSICAL EDUCATION" )|| ($subjectname->subject == "DISCIPLINE" )){
                   if($subjectname->subject == "VALUE EDUCATION"){
                   $arrco[1]= $subjectname->id;
                 
                   $pi=$pi+1;
                   }
                   if($subjectname->subject == "WORK EDUCATION"){
                   $arrco[2]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "ART/URDU"){
                   $arrco[3]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "SENSORIAL ACTIVITIES"){
                   $arrco[4]= $subjectname->id;
                    $pi=$pi+1;
                   }
                     if($subjectname->subject == "HEALTH & PHYSICAL EDUCATION"){
                   $arrco[5]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   
                   if($subjectname->subject == "DISCIPLINE"){
                   $arrco[6]= $subjectname->id;
                    $pi=$pi+1;
                   }
                 
                    }else{ $totalp+=200;?>

					 	<tr class="wight"> 
					 <td class="subject" style="text-transform: uppercase;">	

                     <?php echo  $subjectname->subject;
                       ?> 
					</td>
			     <?php 
 				
                 $gtptal=0;
                 $subtatal=0;
		         ?>
				<?php  $i=1; $t=0; $coltptal=0;  foreach ($examid as $value):?>
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
							$subtatal=$subtatal+$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				$dhtm=$exammm+$dhtm;
						}
					
					?>
					</td>
					<?php if($i%2==0){
						?>
						<td class="center bold"><?php echo $subtatal; 
							$ctotal['tot'.$i]+=$subtatal;
							$gradecal =calculateGrade($subtatal,$classid->class_id);
						 $subtatal=0;?></td>

						<td class="center bold"><?php echo $gradecal;?></td>
					<?php } ?>
				            
				<?php $i++; $t++;endforeach; 
					

				for($j=$i; $j < 5; $j++){
               ?>
              <td class="center bold" ></td>
              <?php if($i%2==0){ ?>
              <td class="center"><?php 
					$ctotal['tot'.$i]+=0;?>
						</td>
			 <td class="center bold" style="text-transform: uppercase;"><?php echo calculateGrade($ctotal['tot'.$i],$classid->class_id); ?></td>
               <?php }}
		           ?>

				<td class="center bold" style="text-transform: uppercase;"><?php  $rty = $gtptal/2; echo $gtptal;  ?></td>
			   <td class="center bold" style="text-transform: uppercase;"><?php echo calculateGrade($rty,$classid->class_id)?></td>	
				</tr>

					<?php } }endforeach;?>
		<tr class="wight">
					<td class="subject">GRAND TOTAL</td>
					<?php $h=1;$i=0; foreach($ctotal as $cd):
					if($h<5){?>
					<td class="center">
					<?php echo $ctotal[$i];  ?>
					</td>
					<?php if($h%2==0){ ?>
					<td class="center bold"><?php $cumulativetotal+=$ctotal['tot'.$h];echo $ctotal['tot'.$h];?> </td> 
					<td class="center bold"></td>
					<?php 			} ?>
					<?php $h++; $i++; } endforeach;	
					?>
			<td class="center bold"><?php echo $cumulativetotal;?></td>
			<td class="center bold"></td>
		</tr>
		<tr class="tableHeader">	
			<td colspan="2" style="text-transform: uppercase;">B. CO-Scholastic Areas</td>
			<td colspan="3" style="text-transform: uppercase;">Descriptive Indicators</td>

			<td>Grade</td>
			<td colspan="2" style="text-transform: uppercase;">Descriptive Indicators</td>
			<td>Grade</td>
			<td colspan="2" class="pink" style="text-transform: uppercase;">Class Teachers Remark</td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">VALUE EDUCATION <?php //echo $arrco[1];?></td>
					<?php 
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
							<?php } if($marksa->num_rows()>0){
								$marksa = $marksa->row();	?>
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marksa->marks);?></td>
             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
														<?php }else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																<?php } 
																				}else{?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																			<?php	} ?>
             	<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
					<td rowspan="8" colspan="2"> </td>
					<?php }else{?>
					<td rowspan="7" colspan="2"> </td>
				<tr class="wight">
					<td class="subject" colspan="1" >WORK EDUCATION <?php //echo $arrco[2];?></td>
					<?php 
							$this->db->where('subject_id',$arrco[2]);
							$this->db->where('class_id',$classid->class_id);
							$this->db->where('stu_id',$studentInfo->id);
							$this->db->where('exam_id',28);
							$this->db->where('fsd',$fsd);
					$marks= $this->db->get('exam_info');
							$this->db->where('subject_id',$arrco[2]);
							$this->db->where('class_id',$classid->class_id);
							$this->db->where('stu_id',$studentInfo->id);
							$this->db->where('exam_id',30);
							$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');

							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>

             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		

             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
			</tr>
             	<?php } ?>
		</tr>
		<tr class="wight">
		                 	<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
					<td class="subject" colspan="1">ART EDUCATION <?php //echo $arrco[3];?></td>
             	<?php }else{?>
					<td class="subject" colspan="1">ART/URDU <?php //echo $arrco[3];?></td>
             	<?php } ?>
						<?php 
								$this->db->where('subject_id',$arrco[3]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[3]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
							<?php } if($marksa->num_rows()>0){
								$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
														<?php }else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
		   </tr>
		  
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
		   <tr class="wight">
					<td class="subject" colspan="1">SENSORIAL ACTIVITIES <?php //echo $arrco[4];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">HEALTH & PHYSICAL EDUCATION <?php //echo $arrco[5];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
												<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
													<?php } if($marksa->num_rows()>0){
														$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
																				<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																					<?php }   }else{ ?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																							<?php	} ?>
			</tr>
																			<?php } ?>
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
			<tr class="tableHeader">
				<td colspan="2">Height & Weight</td>
				<!--<td colspan="3"><?= $studentInfo->height; ?></td>-->
				<!--<td colspan="4"><?= $studentInfo->weight; ?></td>-->
				<td colspan="7">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr class="wight">
					<td colspan="1" class="subject">DISCIPLINE</td>
							<?php $this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="blue">
			<td colspan="2">ATTENDANCE  </td>
			<td colspan="3">MARK PERCENTAGE  <?php //echo $totalp;  
			echo round((($cumulativetotal*100)/$dhtm), 2);?>%  </td>
			<td colspan="4">CLASS RANK : <?php 
			echo $this->exammodel->getClassRank($studentInfo->id, $classid->class_id, $fsd);?></br></br></br>
			SCHOOL RANK : <?php 
			echo $this->exammodel->getSchoolRank($studentInfo->id,  $fsd);?></td>
		</tr>
		<?php }else if($school == 1 && $row2== "A"){ ?>
		<!---dds manner marks table end--->
		<!---mla marks table start--->
		<tr class="tableHeader">
			<td class="center" colspan="2" >A SCHOLASTIC AREAS</td>
			<td class="center" colspan="2">TERM - 1</td>
			<td class="center" colspan="2">TERM - 2</td>
			<td class="center" colspan="2">TERM - 3</td>
			<td colspan="4">Cumulative Evaluation</td>
		</tr>
		<tr class="yellow">
			<td colspan="2" >SUBJECT</td>
			<?php
				    $dhtm=0;
				    $i=1; 
				    $arrco[1]=0;
				    $arrco[2]=0;
				    $arrco[3]=0;
				    $arrco[4]=0;
				    $arrco[5]=0;
					$arrco[6]=0;
           foreach ($examid as $value):
              $examid1=$value->exam_id;
						$this->db->where('term',1);			  
						$this->db->where('id',$examid1);
             $examname= $this->db->get('exam_name');   
             if ($examname->num_rows()>0){
             $examname=$examname->row();
             	?>  
			<td colspan="2" ><?php echo $examname->exam_name;?></td>
								<?php  }else{ ?>  
			<td colspan="2" ></td>					<?php } ?>
            <?php $i++; endforeach ; ?>
			<!---1st term exam name end--->
			<?php    //print_r($examid_2);
           foreach ($examid_2 as $value):
              $examid1=$value->exam_id;
						$this->db->where('term',2);			  
						$this->db->where('id',$examid1);
             $examname= $this->db->get('exam_name');		 
             if ($examname->num_rows()>0){
             $examname=$examname->row();
             	?>  
			<td colspan="2" ><?php echo $examname->exam_name;?></td>
									<?php }else{ ?>  
			<td colspan="2" ></td>
										<?php } ?>
            
 			<?php $i++; endforeach ; ?>
			
			<!---2nd term end--->
			<?php
			foreach ($examid_3 as $value):
              $examid1=$value->exam_id;
						$this->db->where('term',3);			  
						$this->db->where('id',$examid1);
             $examname= $this->db->get('exam_name');   
             if ($examname->num_rows()>0){
             $examname=$examname->row();
             	?>  
			<td colspan="2" ><?php echo $examname->exam_name;?>
			</td>
            <?php 						}else{ ?>  
			<td colspan="2" ></td>
										<?php } ?>
            
 			<?php $i++; endforeach ; ?>
			<!---3rd term exam name end--->
			<td colspan="2" class="text-center">Cumulative Marks <?php echo "[220]";?></td>
			<td colspan="2">Grade </td>
		</tr>
		<?php 
			$htotal = 0; 
			$ctotal =array();
			$ctotal[0]=0;
			$ctotal[1]=0;
			$ctotal[2]=0;
			$ctotal[3]=0;
			$ctotal[4]=0;
			$ctotal["tot2"]=0;
			$ctotal["tot4"]=0;
			$ctotal["tot6"]=0;
			$cumulativetotal=0;
			$totalp= 0;   
			$pi=1;
			foreach($resultData as $sub):
			?><?php 
							 $this->db->where('class_id',$classid->class_id);
							 $this->db->where('id',$sub['subject']);
				$subjectname=$this->db->get('subject'); 
                    if($subjectname->num_rows()>0){
                        $subjectname=$subjectname->row();
                    if(($subjectname->subject == "VALUE EDUCATION") || ($subjectname->subject =="WORK EDUCATION") || ($subjectname->subject == "ART/URDU")||($subjectname->subject == "SENSORIAL ACTIVITIES" ) || ($subjectname->subject == "HEALTH & PHYSICAL EDUCATION" )|| ($subjectname->subject == "DISCIPLINE" )){
                   if($subjectname->subject == "VALUE EDUCATION"){
                   $arrco[1]= $subjectname->id;
                   $pi=$pi+1;
                   }
                   if($subjectname->subject == "WORK EDUCATION"){
                   $arrco[2]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "ART/URDU"){
                   $arrco[3]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "SENSORIAL ACTIVITIES"){
                   $arrco[4]= $subjectname->id;
                    $pi=$pi+1;
                   }
                     if($subjectname->subject == "HEALTH & PHYSICAL EDUCATION"){
                   $arrco[5]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   
                   if($subjectname->subject == "DISCIPLINE"){
                   $arrco[6]= $subjectname->id;
                    $pi=$pi+1;
                   }
                 
                    }else{ $totalp+=200;?>
		<tr class="wight"> 
					<td class="subject" colspan="2" >	
                     <?php echo  $subjectname->subject;
                       ?> 
					</td>
			     <?php 
                 $gtptal=0;
                 $subtatal=0;
		         $i=1; $t=0; $coltptal=0;  
				 foreach ($examid as $value):?>
					<td class="center" colspan="2" >
					<?php      $this->db->where("term", 1);
								$this->db->where('subject_id',$sub['subject']);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',$value->exam_id);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();
							$subtatal=$subtatal+$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				$dhtm=$exammm+$dhtm;
						}
					?>
					</td>
				<?php 
				$i++; $t++;endforeach;
				?>
				<!--<td class="center bold"><?php // $rty = $gtptal/2; echo $gtptal;  ?></td>	-->
				<!--1st term marks end-->
				
				 <?php 
                 $gtptal=0;
                 $subtatal=0;
		         $i=1; $t=0; $coltptal=0;  
				 foreach ($examid_2 as $value):?>
					<td class="center" colspan="2" >
					<?php       $this->db->where("term", 2);
								$this->db->where('subject_id',$sub['subject']);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',$value->exam_id);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();
							$subtatal=$subtatal+$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				$dhtm=$exammm+$dhtm;
						}
					?>
					</td>
				<?php 
				$i++; $t++;endforeach;
				?>
				<!--<td class="center bold"><?php  //$rty = $gtptal/2; echo $gtptal;  ?></td>-->
				<!--2nd term marks end-->
				
				 <?php 
                 $gtptal=0;
                 $subtatal=0;
		         $i=1; $t=0; $coltptal=0;
				 foreach ($examid_3 as $value):?>
					<td class="center" colspan="2" >
					<?php		$this->db->where("term", 3);
								$this->db->where('subject_id',$sub['subject']);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',$value->exam_id);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();
							$subtatal=$subtatal+$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				$dhtm=$exammm+$dhtm;
						}
					?>
					</td>
				<?php 
				$i++; $t++;endforeach;
				?>
				<!--<td class="center bold"><?php // $rty = $gtptal/2; echo $gtptal;  ?></td>-->
				<td class="center bold" colspan="2"><?php // $rty = $gtptal/2; echo $gtptal;  ?></td>
			   <td class="center bold" colspan="2"><?php //echo calculateGrade($rty,$classid->class_id)?></td>
				<!--3rd term marks end-->
		</tr>
					<?php } 					}endforeach;?>
		<tr class="wight">
				<td class="subject" colspan="2" >GRAND TOTAL</td>
				<?php 
				$h=1;$i=0; 
				foreach($ctotal as $cd):
					if($h<2){ ?>
					<td class="center" colspan="2" ><?php echo $ctotal[$i];  ?></td>
					<?php $h++; $i++; 
							} 
				endforeach;	
				?>
				<!--grand total detail of 1st term end-->
				<?php 
				$h=1;$i=0; 
				foreach($ctotal as $cd):
					if($h<2){ ?>
					<td class="center" colspan="2">
					<?php echo $ctotal[$i];  ?>
					</td>
					<?php $h++; $i++; 
							} 
				endforeach;	
				?>
				<!--grand total detail of 2nd term end-->
				<?php 
				$h=1;$i=0; 
				foreach($ctotal as $cd):
					if($h<2){ ?>
					<td class="center" colspan="2">
					<?php echo $ctotal[$i];  ?>
					</td>
					<?php $h++; $i++; 
							} 
				endforeach;	
				?>
				<!--grand total detail of 3rd term end-->
				<td class="center bold" colspan="2"><?php //echo $cumulativetotal;?></td>
				<td class="center bold" colspan="2"></td>
		</tr>
		<tr class="tableHeader">	
			<td colspan="2" style="text-transform: uppercase;">B. CO-Scholastic Areas</td>
			<td colspan="3" style="text-transform: uppercase;">Descriptive Indicators</td>

			<td>Grade</td>
			<td colspan="2" style="text-transform: uppercase;">Descriptive Indicators</td>
			<td>Grade</td>
			<td colspan="2" class="pink" style="text-transform: uppercase;">Class Teachers Remark</td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">VALUE EDUCATION<?php //echo $arrco[1];?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td rowspan="4" colspan="2"> </td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1" >WORK EDUCATION <?php //echo $arrco[2];?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">HEALTH & PHYSICAL EDUCATION <?php //echo $arrco[5];?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="1"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
			</tr>
			
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
			<tr class="tableHeader">
				<td colspan="2">Height & Weight</td>
				<!--<td colspan="3"><?= $studentInfo->height; ?></td>-->
				<!--<td colspan="4"><?= $studentInfo->weight; ?></td>-->
				<td colspan="7">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr class="wight">
					<td colspan="2" class="subject">DISCIPLINE</td>
							<?php $this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="blue">
			<td colspan="2">ATTENDANCE  </td>
			<td colspan="3">MARK PERCENTAGE  <?php //echo $totalp;  
			echo round((($cumulativetotal*100)/$dhtm), 2);?>%  </td>
			<td colspan="4">RANK</td>
		</tr>
		<!---mla marks table end--->
		<!---kerala marks table end--->
		<?php }else if($school == 1 && $row2== "D" || $school == 2 && $row2== "D" || $school == 3 && $row2== "D" || $school == 4 && $row2== "D"){ ?>
		<tr class="tableHeader">
			<td class="center" colspan="1" >A. SCHOLASTIC AREAS</td>
		<td class="center" colspan="10">TERM - 1</td>
		<!--<td class="center" colspan="4">TERM - 2</td>
           
			<td colspan="2">Cumulative Evaluation</td>-->
		</tr>
		<tr class="yellow">
		<td>SUBJECT</td>
			<?php
$dhtm=0;

           $i=1; $arrco[1]=0;
           $arrco[2]=0;
           $arrco[3]=0;
           $arrco[4]=0;
           $arrco[5]=0;
            $arrco[6]=0;
           foreach ($examid as $value):
                 
              $examid1=$value->exam_id;	
             $this->db->where('id',$examid1);
             $examname=$this->db->get('exam_name');   
             if ($examname->num_rows()>0){
             $examname=$examname->row();?>
			 <td colspan="3" class="center"><?php echo $examname->exam_name;?><?php 
         	if($examid1== 20 || $examid1== 14|| $examid1== 11|| $examid1== 17){
         	    echo "[20]";
                        	}else if($examid1== 21 ||$examid1== 15 || $examid1== 12 ||$examid1== 18){
         	                        echo "[50]";  }else{
         	                                        echo "[100]";
         	                                             }	?>
			</td>                <?php }else{ ?>  
     		<td></td>
         	                            <?php }	?>
 			<?php $i++; endforeach ;?>
			 <?php if($i%2==0){ ?>
            <!--<td class="center bold">Total<br>
           <?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[50]";}else{echo "[100]";}?>
        </td>-->
			<td class="center bold">Grade</td>
   <?php } ?>
			<?php
for($j=$i; $j < 5; $j++){
?><!--2nd term section-->
<!--<td></td>--><!--2nd term section end-->
 
					<?php }
			?>
			<!--<td colspan="1" class="text-center">Cumulative Marks<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[100]";}else{echo "[200]";}?></td>
			<td colspan="1">Grade</td>-->
		</tr>
		<?php $htotal = 0;  


		$ctotal =array();

$ctotal[0]=0;
$ctotal[1]=0;
$ctotal[2]=0;
$ctotal[3]=0;
$ctotal[4]=0;
$ctotal["tot2"]=0;
$ctotal["tot4"]=0;
$ctotal["tot6"]=0;
$cumulativetotal=0;

       $totalp= 0;   
       $pi=1;
		foreach($resultData as $sub):?>

			
                    <?php 
                    $this->db->where('class_id',$classid->class_id);
                    $this->db->where('id',$sub['subject']);
                    $subjectname=$this->db->get('subject'); 
                    if($subjectname->num_rows()>0){
                        $subjectname=$subjectname->row();
                    
                    if(($subjectname->subject == "VALUE EDUCATION") || ($subjectname->subject =="WORK EDUCATION") || ($subjectname->subject == "ART/URDU")||($subjectname->subject == "SENSORIAL ACTIVITIES" ) || ($subjectname->subject == "HEALTH & PHYSICAL EDUCATION" )|| ($subjectname->subject == "DISCIPLINE" )){
                   if($subjectname->subject == "VALUE EDUCATION"){
                   $arrco[1]= $subjectname->id;
                 
                   $pi=$pi+1;
                   }
                   if($subjectname->subject == "WORK EDUCATION"){
                   $arrco[2]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "ART/URDU"){
                   $arrco[3]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "SENSORIAL ACTIVITIES"){
                   $arrco[4]= $subjectname->id;
                    $pi=$pi+1;
                   }
                     if($subjectname->subject == "HEALTH & PHYSICAL EDUCATION"){
                   $arrco[5]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   
                   if($subjectname->subject == "DISCIPLINE"){
                   $arrco[6]= $subjectname->id;
                    $pi=$pi+1;
                   }
                 
                    }else{ $totalp+=200;?>
		<tr class="wight"> 
					 <td class="subject">	
                     <?php echo  $subjectname->subject;
                       ?> 
					</td>
			     <?php 
 				
                 $gtptal=0;
                 $subtatal=0;
		         ?>
				<?php  $i=1; $t=0; $coltptal=0;  foreach ($examid as $value):?>
					<td class="center" colspan="3">	
					<?php  

					$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',$value->exam_id);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						if($marks->num_rows()>0){
							$marks=$marks->row();
							$subtatal=$subtatal+$marks->marks;
							$dfg =$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				if($value->exam_id == 31 && $row2=="D" || $value->exam_id == 33 && $row2=="D" || $value->exam_id == 25 && $row2=="D" || $value->exam_id == 25 && $row2=="D"){$dhtm=$exammm+$dhtm;}
				//$dhtm=$exammm+$dhtm;
						}
					
					?>
					</td>
					
				            
				<?php $i++; $t++;endforeach; ?>
				
				<?php if($i%2==0){
						?>
						<!--<td class="center bold"><?php echo $subtatal; 
							$ctotal['tot'.$i]+=$subtatal;
							$gradecal =calculateGrade($dfg,$classid->class_id);
						 $subtatal=0;?></td>-->

						<td class="center bold"><?php echo $gradecal;?></td>
					<?php } ?>
				<?php
					

				for($j=$i; $j < 5; $j++){
               ?>
            <!--  <td class="center bold"></td>
              <?php if($i%2==0){ ?>
              <td class="center"><?php 
					$ctotal['tot'.$i]+=0;?>
						</td>
			 <td class="center bold"><?php echo calculateGrade($ctotal['tot'.$i],$classid->class_id); ?></td>-->
               <?php }					}?>
				<!--<td class="center bold"><?php  $rty = $gtptal/2; echo $gtptal;  ?></td>
			   <td class="center bold"><?php echo calculateGrade($rty,$classid->class_id)?></td>-->	
		</tr>
					<?php } }endforeach;?>
						<tr class="wight">
					<td class="subject">GRAND TOTAL</td>
					<?php $h=1;$i=0; foreach($ctotal as $cd):
					if($h<5){?>
					<td class="center" colspan="3">
					<?php $cumulativetotal+=$ctotal[$i];echo $ctotal[$i];  ?>
					</td>
					
					<?php $h++; $i++; } endforeach;	
					?><?php if($h%2==0){ ?>
					<td class="center bold"><?php $cumulativetotal+=$ctotal['tot'.$h];echo $ctotal['tot'.$h];?> </td> 
					<td class="center bold"></td>
					<?php 			} ?>
			<!--<td class="center bold"><?php echo $cumulativetotal;?></td>
			<td class="center bold"></td>-->
		</tr>
		<tr class="tableHeader">	
			<!--<td colspan="2" style="text-transform: uppercase;">B. CO-Scholastic Areas</td>
			<td colspan="3" style="text-transform: uppercase;">Descriptive Indicators</td>

			<td>Grade</td>
			<td colspan="2" style="text-transform: uppercase;">Descriptive Indicators</td>
			<td>Grade</td>-->
			<td colspan="11" class="pink" style="text-transform: uppercase;">Class Teachers Remark</td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">VALUE EDUCATION <?php //echo $arrco[1];?></td>
					<?php 
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>

					
					
					<td colspan="2" style="text-transform: uppercase;"><?= discriptiveindicator($marksa->marks);?></td>
             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		

             		<?php }else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		    
             		<?php }}else{?>
             		    	<td colspan="4"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
             
             	<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
             	<td rowspan="9" colspan="2"> </td>
             	<?php }else{?>
             <!--	<td rowspan="6" colspan="2"> </td>-->
             	<?php } ?>
		</tr>
		<tr class="wight">

			
				
					<td class="subject" colspan="1" >WORK EDUCATION <?php //echo $arrco[2];?></td>
					
						<?php $this->db->where('subject_id',$arrco[2]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[2]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');

							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>

					
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
							<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>

					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>

             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		

             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
             		<td colspan="4"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
			</tr>
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
		   <tr class="wight">
					<td class="subject" colspan="1">SENSORIAL ACTIVITIES <?php //echo $arrco[4];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">HEALTH & PHYSICAL EDUCATION <?php //echo $arrco[5];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
												<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
													<?php } if($marksa->num_rows()>0){
														$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
																				<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																					<?php }   }else{ ?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																							<?php	} ?>
			</tr>
																			<?php } ?>
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
			<tr class="tableHeader">
				<td colspan="2">Height & Weight</td>
				<!--<td colspan="3"><?= $studentInfo->height; ?></td>-->
				<!--<td colspan="4"><?= $studentInfo->weight; ?></td>-->
				<td colspan="7">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr class="wight">
					<td colspan="1" class="subject">DISCIPLINE</td>
							<?php $this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="4"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td colspan="2"><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="blue">
			<td colspan="2">ATTENDANCE  </td>
			<td colspan="3">MARK PERCENTAGE  <?php  
		//	echo round((($cumulativetotal*100)/$dhtm), 2);
		if($ctotal[2] > 0){echo round((($ctotal[2]*100)/$dhtm), 2);}else{}
		?>%  </td>
			<td colspan="6">RANK</td>
		</tr>
		
		
		<?php }else{ ?>
		
		<!---others marks table start--->
		<tr class="tableHeader">
			<td class="center" colspan="1" >A. SCHOLASTIC AREAS</td>
		<td class="center" colspan="4">TERM - 1</td>
		<td class="center" colspan="4">TERM - 2</td>
           
			<td colspan="2">Cumulative Evaluation</td>
		</tr>
		<tr class="yellow">
		<td>SUBJECT</td>
			<?php
$dhtm=0;

           $i=1; $arrco[1]=0;
           $arrco[2]=0;
           $arrco[3]=0;
           $arrco[4]=0;
           $arrco[5]=0;
            $arrco[6]=0;
           foreach ($examid as $value):
                 
              $examid1=$value->exam_id;	
             $this->db->where('id',$examid1);
             $examname=$this->db->get('exam_name');   
             if ($examname->num_rows()>0){
             $examname=$examname->row();
            
             	?>  <td><?php echo $examname->exam_name;?><?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){if($i%2==1){echo "[20]";}else{echo "[30]";}}else{
             	if(($classid->class_id==100)||($classid->class_id==101)||($classid->class_id== 102) ||($classid->class_id== 103) ||($classid->class_id== 104) ){ if($i%2==1){echo "[40]";}else{echo "[60]";}}else{ if($i%2==1){echo "[20]";}else{echo "[80]";}}}?></td>
             	<?php 
             }else{
             		?>  <td></td>
             	<?php
             }
			?>

          
            <?php if($i%2==0){ ?>
            <td class="center bold">Total<br>
           <?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[50]";}else{echo "[100]";}?>
        </td>
			<td class="center bold">Grade</td>
   <?php } ?>
 			<?php $i++; endforeach ;
for($j=$i; $j < 5; $j++){
?>
<td></td>
 <?php if($i%2==0){ ?>
            <td>Total <br><?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "50";}else{echo "100";}?></td>
			<td>Grade</td>
      <?php }}
			?>
			<td colspan="1" class="text-center">Cumulative Marks<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){echo "[100]";}else{echo "[200]";}?></td>
			<td colspan="1">Grade</td>
		</tr>
		<?php $htotal = 0;  


		$ctotal =array();

$ctotal[0]=0;
$ctotal[1]=0;
$ctotal[2]=0;
$ctotal[3]=0;
$ctotal[4]=0;
$ctotal["tot2"]=0;
$ctotal["tot4"]=0;
$ctotal["tot6"]=0;
$cumulativetotal=0;

       $totalp= 0;   
       $pi=1;
		foreach($resultData as $sub):?>

			
                    <?php 
                    $this->db->where('class_id',$classid->class_id);
                    $this->db->where('id',$sub['subject']);
                    $subjectname=$this->db->get('subject'); 
                    if($subjectname->num_rows()>0){
                        $subjectname=$subjectname->row();
                    
                    if(($subjectname->subject == "VALUE EDUCATION") || ($subjectname->subject =="WORK EDUCATION") || ($subjectname->subject == "ART/URDU")||($subjectname->subject == "SENSORIAL ACTIVITIES" ) || ($subjectname->subject == "HEALTH & PHYSICAL EDUCATION" )|| ($subjectname->subject == "DISCIPLINE" )){
                   if($subjectname->subject == "VALUE EDUCATION"){
                   $arrco[1]= $subjectname->id;
                 
                   $pi=$pi+1;
                   }
                   if($subjectname->subject == "WORK EDUCATION"){
                   $arrco[2]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "ART/URDU"){
                   $arrco[3]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   if($subjectname->subject == "SENSORIAL ACTIVITIES"){
                   $arrco[4]= $subjectname->id;
                    $pi=$pi+1;
                   }
                     if($subjectname->subject == "HEALTH & PHYSICAL EDUCATION"){
                   $arrco[5]= $subjectname->id;
                    $pi=$pi+1;
                   }
                   
                   if($subjectname->subject == "DISCIPLINE"){
                   $arrco[6]= $subjectname->id;
                    $pi=$pi+1;
                   }
                 
                    }else{ $totalp+=200;?>
		<tr class="wight"> 
					 <td class="subject">	
                     <?php echo  $subjectname->subject;
                       ?> 
					</td>
			     <?php 
 				
                 $gtptal=0;
                 $subtatal=0;
		         ?>
				<?php  $i=1; $t=0; $coltptal=0;  foreach ($examid as $value):?>
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
							$subtatal=$subtatal+$marks->marks;
							$gtptal= $gtptal+$marks->marks;
							$coltptal+=$marks->marks;
							echo $marks->marks;
							$ctotal[$t]+= $marks->marks;
							
							$this->db->where('subject_id',$sub['subject']);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('exam_id',$value->exam_id);
				$exammm=	$this->db->get('exam_max_subject')->row()->max_m;
				$dhtm=$exammm+$dhtm;
						}
					
					?>
					</td>
					<?php if($i%2==0){
						?>
						<td class="center bold"><?php echo $subtatal; 
							$ctotal['tot'.$i]+=$subtatal;
							$gradecal =calculateGrade($subtatal,$classid->class_id);
						 $subtatal=0;?></td>

						<td class="center bold"><?php echo $gradecal;?></td>
					<?php } ?>
				            
				<?php $i++; $t++;endforeach; 
					

				for($j=$i; $j < 5; $j++){
               ?>
              <td class="center bold"></td>
              <?php if($i%2==0){ ?>
              <td class="center"><?php 
					$ctotal['tot'.$i]+=0;?>
						</td>
			 <td class="center bold"><?php echo calculateGrade($ctotal['tot'.$i],$classid->class_id); ?></td>
               <?php }}
		           ?>
				<td class="center bold"><?php  $rty = $gtptal/2; echo $gtptal;  ?></td>
			   <td class="center bold"><?php echo calculateGrade($rty,$classid->class_id)?></td>	
		</tr>
					<?php } }endforeach;?>
		<tr class="wight">
					<td class="subject">GRAND TOTAL</td>
					<?php $h=1;$i=0; foreach($ctotal as $cd):
					if($h<5){?>
					<td class="center">
					<?php echo $ctotal[$i];  ?>
					</td>
					<?php if($h%2==0){ ?>
					<td class="center bold"><?php $cumulativetotal+=$ctotal['tot'.$h];echo $ctotal['tot'.$h];?> </td> 
					<td class="center bold"></td>
					<?php 			} ?>
					<?php $h++; $i++; } endforeach;	
					?>
			<td class="center bold"><?php echo $cumulativetotal;?></td>
			<td class="center bold"></td>
		</tr>
		
		
		
		

			
		<tr class="tableHeader">	
			<td colspan="2" style="text-transform: uppercase;">B. CO-Scholastic Areas</td>
			<td colspan="3" style="text-transform: uppercase;">Descriptive Indicators</td>

			<td>Grade</td>
			<td colspan="2" style="text-transform: uppercase;">Descriptive Indicators</td>
			<td>Grade</td>
			<td colspan="2" class="pink" style="text-transform: uppercase;">Class Teachers Remark</td>
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">VALUE EDUCATION <?php //echo $arrco[1];?></td>
					<?php 
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[1]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>

					
					
					<td colspan="2" style="text-transform: uppercase;"><?= discriptiveindicator($marksa->marks);?></td>
             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		

             		<?php }else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		    
             		<?php }}else{?>
             		    	<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
             
             	<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
             	<td rowspan="9" colspan="2"> </td>
             	<?php }else{?>
             	<td rowspan="7" colspan="2"> </td>
             	<?php } ?>
		</tr>
		<tr class="wight">

			
				
					<td class="subject" colspan="1" >WORK EDUCATION <?php //echo $arrco[2];?></td>
					
						<?php $this->db->where('subject_id',$arrco[2]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[2]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');

							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>

					
					<td colspan="3" style="text-transform: uppercase;"><?= discriptiveindicator($marks->marks);?></td>
					<td style="text-transform: uppercase;"><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
							<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>

					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>

             		<td style="text-transform: uppercase;"><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		

             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
             		<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
			</tr>
			<tr class="wight">
		                 	<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
					<td class="subject" colspan="1">ART EDUCATION <?php //echo $arrco[3];?></td>
             	<?php }else{?>
					<td class="subject" colspan="1">ART/URDU <?php //echo $arrco[3];?></td>
             	<?php } ?>
						<?php 
								$this->db->where('subject_id',$arrco[3]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[3]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
		   </tr>
		   
		   <?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
		   <tr class="wight">
					<td class="subject" colspan="1">SENSORIAL ACTIVITIES <?php //echo $arrco[4];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[4]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa=$this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="wight">
					<td class="subject" colspan="1">HEALTH & PHYSICAL EDUCATION <?php //echo $arrco[5];?></td>
						<?php 
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',28);
								$this->db->where('fsd',$fsd);
						$marks= $this->db->get('exam_info');
								$this->db->where('subject_id',$arrco[5]);
								$this->db->where('class_id',$classid->class_id);
								$this->db->where('stu_id',$studentInfo->id);
								$this->db->where('exam_id',30);
								$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
												<?php }else{ ?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
													<?php } if($marksa->num_rows()>0){
														$marksa = $marksa->row();	?>
					<td colspan="3"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
																				<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																					<?php }   }else{ ?>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
																							<?php	} ?>
			</tr>
																			<?php } ?>
			<?php if(($classid->class_id==98)||($classid->class_id==99)||($classid->class_id== 116)){?>
			<tr class="tableHeader">
				<td colspan="2">Height & Weight</td>
				<!--<td colspan="3"><?= $studentInfo->height; ?></td>-->
				<!--<td colspan="4"><?= $studentInfo->weight; ?></td>-->
				<td colspan="7">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr class="wight">
					<td colspan="2" class="subject">DISCIPLINE</td>
							<?php $this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',28);
					$this->db->where('fsd',$fsd);
					
						$marks= $this->db->get('exam_info');
						
						$this->db->where('subject_id',$arrco[6]);
					$this->db->where('class_id',$classid->class_id);
					$this->db->where('stu_id',$studentInfo->id);
					$this->db->where('exam_id',30);
					$this->db->where('fsd',$fsd);
						$marksa= $this->db->get('exam_info');
							if(($marks->num_rows()>0) || ($marksa->num_rows()>0)){
							if($marks->num_rows()>0){
							$marks=$marks->row();
						$marks->marks;
						?>
					<td colspan="3"><?= discriptiveindicator($marks->marks);?></td>
					<td><?php echo calculateGrade1($marks->marks,$classid->class_id)?></td>
						<?php }else{
						?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
						<?php }
						if($marksa->num_rows()>0){$marksa = $marksa->row();	?>
					<td colspan="2"><?= discriptiveindicator($marksa->marks);?></td>
             		<td><?php echo calculateGrade1($marksa->marks,$classid->class_id)?></td>
             		<?php }else{?>
             		<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             		<?php }}else{?>
					<td colspan="3"><?php //discriptiveindicator($cumulativetotal);?></td>
					<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
					<td colspan="2"><?php //discriptiveindicator($cumulativetotal);?></td>
             		<td><?php //echo calculateGrade1($coltptal,$studentInfo->class_id)?></td>
             	<?php	} ?>
				
		</tr>
		<tr class="blue">
			<td colspan="2">ATTENDANCE  </td>
			<td colspan="3">MARK PERCENTAGE  <?php //echo $totalp;  
			echo round((($cumulativetotal*100)/$dhtm), 2);?>%  </td>
			<td colspan="4">RANK</td>
		</tr>
		<?php } ?>
		<!---other marksheet end--->
			
		     	
			
		
		<tr class="pink">
			<td colspan="2">FINAL RESULT</td>
			<td colspan="9" style="text-transform: uppercase;">Passed/Promoted/Supp./Detained.</td>
		</tr>
		<tr>
			<td colspan="9" class="wight" height="25" style="border-right: None">
			<br>
			<br>
			<br>
			<br>&emsp;Sign Class Teacher
			</td>
			<td colspan="2" class="wight" height="25" style="border-left:none;">
			<img src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/images/empImage/<?php echo $info->principle_sign;?>" alt="" width="100" height="70" style="margin-top=-60px;" />
			
			Sign Principal
			</td>
		</tr>
        <tr style="border:none;"><?php	
                         $this->db->where('school_code',$this->session->userdata('school_code'));
						$url= $this->db->get('sms_setting')->row()->web_url; ?>
            	<td colspan="5" style="border:none; font-size:10px;"> <img style="float:left;" src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/Map-Icon.png"  alt="" width="20" height="20" />&nbsp;<?php echo $info->address1." ".$info->city." (".$info->state.") ".$info->nationalty; ?></td>
            	<td colspan="4" style="border:none; font-size:10px;"> <img style="float:left;" src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/email.png"  alt="" width="20" height="20" />&nbsp;<?php echo $info->email1;?></td>
            	<td colspan="2" style="border:none; font-size:10px;"> <img style="float:left;" src="<?php echo $this->config->item('asset_url'); ?><?= $this->session->userdata('school_code') ?>/web.png"  alt="" width="30" height="30" />&nbsp;www.<?php echo $url; ?></td>
        </tr>
	</table>

	<?php
		function calculateGrade($val,$classid){
				if(($classid==98)||($classid==99)||($classid== 116)){
		    $val=$val*2;
		}
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
		function calculateGrade1($val,$classid){
			if($val >= 91 && $val < 101):
				return 'A';
			elseif($val >= 81 && $val < 91):
				return 'B';
			elseif($val >= 60 && $val < 81):
				return 'C';
			elseif($val >= 40 && $val < 61):
				return 'D';
			else:
				return 'E';
			endif;
			}
		function discriptiveindicator($val){
			if($val >= 90 && $val < 101):
				return 'Excellent';;
			elseif($val >= 80 && $val < 91):
				return 'Very Good';
			elseif($val >= 60 && $val < 81):
				return 'Good';
			elseif($val >= 40 && $val < 61):
				return 'Satisfactory';
				else:
				return 'Need to improve';
			endif;
		}
	?>
</div>
<div class="invoice-buttons" id ="non-printable" style="text-align:center;">
    <button class="button button2" type="button"  onclick="window.print();">
      <i class="fa fa-print padding-right-sm"></i> Print
    </button>
  </div>
</body>

</html>
				
					
					
			