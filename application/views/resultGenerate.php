<style type="text/css">

    #printable { display: block; }

    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>
<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
	<div class="panel panel-white">
		<div class="panel-heading panel-green">
				<h4 class="panel-title">Mark Sheet</h4>
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
						<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
					</li>										
				</ul>
				</div>
			</div>
		</div>
		
		<?php  
	//	echo $student_id;
		           $this->db->where("username",$student_id);
		           $studentInfo =$this->db->get("student_info");
				//$this->db->where("school_code",$this->session->userdata("school_code"));
					if($studentInfo->num_rows() > 0){
					    	$ras=$studentInfo->row();
			
				?>
		<div class="panel-body">

			<div class="row">
				<div class="col-sm-12"><?php //echo $examName;?>
					<IFRAME SRC="<?php echo base_url(); ?>index.php/invoiceController/result/<?php echo $ras->id; ?>/<?php echo $ras->fsd;?>/" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>

				</div>
			</div>
		</div>
		<?php	}else{
					    echo "please correct student ID";
					} ?>
	</div>
	<!-- end: INLINE TABS PANEL -->
	</div>
</div>

<!-- end: PAGE CONTENT-->