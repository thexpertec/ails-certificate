<?php include('header.php'); ?>
<?php
  if(isset($instructors_pdf_form_datas) && !empty($instructors_pdf_form_datas))
  {
  ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>View instructor</h2>
            </div>

            <!-- CKEditor -->
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      <?php if(isset($error_message)){ ?>
                  <div class="col-md-12 alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                  </div>
                  
                <?php } ?>
                <?php if(isset($success_message)){ ?>
                  <div class="col-md-12 alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                  </div>
                  
                <?php } ?>
                        <div class="header">
                            <h2>
                                View instructor
                               
                            </h2>
                            
                        </div>
                      
                        <div class="body">
                        <form id="form_validations" method="POST" enctype="multipart/form-data">

                             <div class="col-md-12">
                              <div class="row">

                                  
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Name of Instructor</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="name_of_instructor" id="name_of_instructor" value="<?php echo $instructors_pdf_form_datas[0]['name_of_instructor']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Instructor Phone</label>
                                        <div class="form-control">
                                            <input type="Number" class="" name="p_no" id="p_no" value="<?php echo $instructors_pdf_form_datas[0]['p_no']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Instructor Joined on</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="joined_on" id="joined_on" value="<?php echo $instructors_pdf_form_datas[0]['joined_on']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                 
                                
                                 </div>
                            </div>


                            <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Instructor Address</label>
                                        <div class="form-control">
                                           <textarea id="p_address" name="p_address" class="ads" readonly><?php echo $instructors_pdf_form_datas[0]['p_address']; ?></textarea>
                                        </div>
                                    </div>
                                  </div>
                               

                                 </div>
                            </div>

                        <br clear="all">    
                        
                 
                 
                    <input type="hidden" id="pdf_id" value="<?php echo $instructors_pdf_form_datas[0]['id']; ?>">    
                  <a href="<?php echo base_url() ?>admin/instructors-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       
                     
                      </form> 
                        </div>     
                        
                    </div>
                </div>
            </div>
            <!-- #END# -->
       
        </div>
    </section>

 

<?php } ?>
<?php include('footer.php'); ?>


 