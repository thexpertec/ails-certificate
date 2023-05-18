<?php include('header.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Add instructors</h2>
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
                                Add instructors
                               
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
                                            <input type="text" class="" name="name_of_instructor" id="name_of_instructor">
                                        </div>
                                   <p>Before Generate the id card you must need to add the Instructor first.</p>

                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Instructor Phone</label>
                                        <div class="form-control">
                                            <input type="Number" class="" name="p_no" id="p_no">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Instructor Joined on</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="joined_on" id="joined_on">
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
                                           <textarea id="p_address" name="p_address" class="ads"></textarea>
                                        </div>
                                    </div>
                                  </div>
                               

                                 </div>
                            </div>

                        <br clear="all">    
                        <br clear="all">  
                 
                 

                  <a href="<?php echo base_url() ?>admin/instructors-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       
                       <a href="javascript:void(0)" id="refresh" > <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">REFRESH</button></a>
                       <button type="submit" name="update" id="submit-btn" class="btn btn-success waves-effect" style="border-radius:20px;padding:10px 20px; margin-left:10px; ">SAVE</button>
                      </form> 
                        </div>     
                        
                    </div>
                </div>
            </div>
            <!-- #END# -->
       
        </div>
    </section>

 
    
    <!-- Fields popup html section Ended -->
<?php include('footer.php'); ?>

<script type="text/javascript">

$(document).ready(function() {
   $('#submit-btn').click(function(e) {
      // Get the form data
      e.preventDefault();
      var formData = $('#form_validations').serialize();
     
      // Submit the form data to the insert_data function using Ajax
      $.ajax({
         url: '<?php echo base_url(); ?>pdf_admin/instructors_add_ajax',
         type: 'POST',
         dataType: 'json',
         data: formData,
         success: function(response) {
            // Display a success message
            alert('Instructor has been successfully inserted!');
            window.location.href = "<?php echo base_url(); ?>admin/instructors-detail";
         },
         error: function() {
            // Display an error message
            alert('Error inserting data!');
         }
      });
    
   });
});

</script>