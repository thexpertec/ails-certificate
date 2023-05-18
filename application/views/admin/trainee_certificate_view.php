<?php include('header.php'); ?>
<?php
  if(isset($trainee_pdf_form_datas) && !empty($trainee_pdf_form_datas))
  {
  ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit Trainee Certificate</h2>
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
                                Edit Trainee Certificate
                               
                            </h2>
                            
                        </div>
                      
                        <div class="body">
                        <form id="form_validations" method="POST" enctype="multipart/form-data">

                             <div class="col-md-12">
                              <div class="row">

                                  
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Name of Trainee</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="name_of_trainee" id="name_of_trainee" value="<?php echo $trainee_pdf_form_datas['name_of_trainee'] ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Phone</label>
                                        <div class="form-control">
                                            <input type="Number" class="" name="phone" id="phone" value="<?php echo $trainee_pdf_form_datas['phone'] ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Enrolled on</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="enrolled_on" id="enrolled_on" value="<?php echo $trainee_pdf_form_datas['enrolled_on'] ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                
                                                             
                                 </div>
                            </div>

                             <div class="col-md-12">
                              <div class="row">


                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Company name</label>
                                        <div class="form-control">
                                          <input type="text" class="" value="<?php echo $trainee_pdf_form_datas['c_name'] ?>" readonly>
                                        
                                      
                                         </div> 

                                    </div>
                                     
                                  </div>

                                 <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Position</label>
                                        <div class="form-control">
                                        <input type="text" class="" value="<?php echo $trainee_pdf_form_datas['p_position'] ?>" readonly>
                                      
                                         </div> 

                                    </div>
                                     
                                  </div> 


                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Enrolled in Course</label>
                                        <div class="form-control">
                                        <input type="text" class="" value="<?php echo $trainee_pdf_form_datas['e_course'] ?>" readonly>
                                      
                                         </div> 

                                    </div>
                                     
                                  </div>  
                                

                                 </div>
                            </div>

                             <div class="col-md-12">
                              <div class="row">

                                  
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">valid from</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="valid_from" id="valid_from" value="<?php echo $trainee_pdf_form_datas['valid_from'] ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">valid until</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="valid_until" id="valid_until" value="<?php echo $trainee_pdf_form_datas['valid_until'] ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Instructor By</label>
                                        <div class="form-control">
                                        <input type="text" class="" value="<?php echo $trainee_pdf_form_datas['name_of_instructor'] ?>" readonly>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>  
                                
                                  
                                
                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Address</label>
                                        <div class="form-control">
                                           <textarea id="address" name="address" class="ads"><?php echo $trainee_pdf_form_datas['address'] ?></textarea>
                                        </div>
                                    </div>
                                  </div>
                               

                                 </div>
                            </div>


                        <br clear="all">    
                        
                 
                 
                    <input type="hidden" id="pdf_id" value="<?php echo $trainee_pdf_form_datas['id']; ?>">    
                  <a href="<?php echo base_url() ?>admin/trainee-certificate-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       
                     
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

<script type="text/javascript">

    

 