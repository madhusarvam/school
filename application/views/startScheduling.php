	<?php 
      $this->db->where('exam_id',$exam_name);
      $examday=$this->db->get('exam_day');

       $this->db->where('exam_id',$exam_name);
       $examshift=$this->db->get('exam_shift');

	if(!($examday->num_rows()&& $examshift->num_rows())>0)
    { 
       ?>
     <div class="row"> 
        <div class="col-sm-15">     
                <div class="panel panel-calendar">
                    <div class="panel-heading panel-blue border-light">
                        <h4 class="panel-title">Settings</h4>
                    </div>     
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
								<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
							</li>
							<li>
								<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
							</li>
							<li>
								<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
							</li>
						</ul>
					</div>
				</div> 
                <div class="panel-body">
			<div class="alert alert-info"><h3 class="media-heading text-center">Welcome to Exam scheduling Area</h3>
			<p class="media-timestamp">Welcome to exam scheduling area
				  In this section first you select Number of Exam Shifts and Number of Days to Complete Exam 
                  and configure your exam.
				</p>
			</div>  
                    <form action="<?php echo base_url();?>index.php/examControllers/createExam" method="post">
                    <div class="row"> 
                    <div class="panel-body padding-bottom-none">
                        <div class="col-md-10 col-lg-10 col-lg-offset-1">
                            
                            <div class="row">
                            
                                <table class="table" style="width:100%;">
                                    <?php $i=1; if($i%2==0){$rowcss="warning";}else{$rowcss ="danger";}?>
                                 <tr class="<?php echo $rowcss;?>">
                                     <td>
                                <?php 
                                $this->db->where('id',$exam_name);
                                $examname=$this->db->get('exam_name')->row()->exam_name;  ?> 
                                <?php echo "Exam Name:-".$examname."<br>"." Date:- [ ". $edate. " ] ";?>
                                 </td>
                                        <td align="right">Number of Exam Shifts</td>
                                        <td>
                                            <select name="nos" id="nos" class="form-control" required>
                                                <option value="">-NOS-</option>
                                                <?php for($i = 1; $i <=3; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td align="right">Number of Days to Complete Exam</td>
                                        <td>
                                            <select name="nod" id="nod" class="form-control" required>
                                                <option value="">-NOD-</option>
                                                <?php for($i = 2; $i <=15; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </td>                            
                                 </tr>
                                <input type="hidden" name ="exam_name"  value="<?php echo $exam_name;?>" />
                                 <input type="hidden" name ="edate" value="<?php echo $edate;?>" />
                                  </table>
                            </div>
                            <div id="exam1"> </div> 
                         <div id="exam12"> </div>   
                    </div>
                    </div>                                
                </div>
            </form>
             </div>
             </div>
           </div>
        </div>
        
 			<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
 		<script>
 	
 		jQuery(document).ready(function() {
 			
 			<?php
 			$j = 1;
 			$k = 1;
 			while(7 >= $j){
 				?>
 							$('input#date<?php echo $j; ?>').change(
 									function(){
 										var d = $('#date<?php echo $j; ?>').val();
 										var dArray = d.split("-");
 										myDate=new Date(dArray[0],dArray[1]-1,dArray[2]);  
 										var dayCode = myDate.getDay(); // dayCode 0-6
 										var weekday = new Array(7);
 										weekday[0]=  "Sunday";
 										weekday[1] = "Monday";
 										weekday[2] = "Tuesday";
 										weekday[3] = "Wednesday";
 										weekday[4] = "Thursday";
 										weekday[5] = "Friday";
 										weekday[6] = "Saturday";
 										var a = weekday[dayCode];
 										$('#day<?php echo $j; ?>').val(a);
 									});
 						<?php 
 							$j++; }?>
 						});
         <?php  }
 				else
                {
                redirect("index.php/login/createSchedule/$exam_name");

                }?>		
 						
       
    
 						</script>
            	