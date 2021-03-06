<!-- start: PAGE CONTENT -->
<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> Add Fee Category
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Configure Fees 
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="myTab_example1">
                  <div class="alert panel-pink">
                    <button data-dismiss="alert" class="close">×</button>
                    <h3 class="media-heading text-center">Welcome to Fee Category Section</h3>
                    <a class="alert-link" href="#"></a>
                     Please type Fee Category name into the box given below the add Fee Category
                      and press <strong>Add Category </strong> Button.To <strong>Edit</strong> existing Category, edit
                      it's name and press <strong>Edit</strong> Button , And to <strong>Delete</strong> a Category, simply press <strong>Delete</strong> Button.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">Add Fee Category</h4>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large">
                            <span id="name" Style="color:red;"></span>
                            <input type="text" id="addfeecategory" class="text-uppercase" required="required">
                            <a href="#" class="btn btn-sm btn-blue" id="addfeecatButton"><i class="fa fa-check"></i>
                              Add Category</a></<br><br><br>
                            <div class="alert alert-warning"> Type a Category name and press Add Category.If Category added
                              successfully then it show in right side panel where you can change the name and Delete it.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-green border-light">
                          <h4 class="panel-title">Category List</h4>
                        </div>
                        <div class="panel-body" id="feeList1">

                        </div>
												<div class="container">
                        <div class="alert alert-success">
                          You can <strong>Edit </strong> or <strong>Delete </strong>
                          Category by press concern Button .</div>
                      </div>
											</div>
                    </div>
                  </div>
                </div>
                
                
                
                <div class="tab-pane fade" id="myTab_example2">
                  <!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<div class="alert alert-info">
											<center><h3 class="media-heading"><b>Welcome To  Configure Fees section</b></h3></center>
                    						<p class="media-timestamp">
                    						    This is the Second Phase of Fee Category where we can see and update Fee Category by Class Wise. firstly you must need to select stream ,section,
                    						    class respectively.after then you can see the list of Fees Category to update.
                    						<p class="media-timestamp">
                    						For	Update Fee Category  given in the chart below, press <strong>edit </strong>button And to <strong>Delete</strong> a Fee Category simply press <strong>delete</strong> button below the chart.
                    						</p>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="panel-heading panel-red border-light">
													<h4 class="panel-title">Stream</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="clname" class="form-control">
															<option value="">Select Stream Name</option>
															<?php if(isset($StreamList)){?>
															<?php foreach ($StreamList as $row){
																 
																  $streamid=$row->stream;
																 $this->db->where('id',$streamid);
																$row2=$this->db->get('stream')->row(); 
                                                                ?>
															<option value="<?php echo $row2->id;?>"><?php echo $row2->stream;?></option>
															<?php } }?>
														</select>
													</div>
													<div class="text-red text-small">Please select a Stream, Section and Class will automatically come select and add subject.</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-green border-light">
													<h4 class="panel-title">Section</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="sectionList" class="form-control">
															
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Class</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="classlist" class="form-control">
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
		<div class="row" id="subjectBox">
		</div>
						
					
						<!-- end: PAGE CONTENT-->
                    </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: INLINE TABS PANEL -->
    </div>
  </div>
</div>
<!-- end: PAGE CONTENT-->