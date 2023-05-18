<?php include('header.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Add id card generator</h2>
            </div>

            <!-- CKEditor -->
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                   
                        <div class="header">
                            <h2>
                                Add id card generator
                               
                            </h2>
                            
                        </div>
                      
                        <div class="body">
                        <form id="form_validations" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                              <div class="row">

                                  
                                   <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Person of Name</label>

                                        <div class="form-control">
                                            <select id="person_name" name="person_name" style="width: 80%;padding: 2px;" required>
                                            <option value="">SELECT</option>
                                            <?php foreach($person_name as $row): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name_of_trainee']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                         </div> 
                                         <p>you must need to add trainee first.</p>
                                    </div>
                                     
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Issue</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="date_of_issue" id="date_of_issue">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Expiry</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="date_of_expiry" id="date_of_expiry">
                                        </div>
                                    </div>
                                  </div>
                                 
                                
                                 </div>
                            </div>


                            <div class="col-md-12">
                              <div class="row">
                                   <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Examinor Name</label>
                                       
                                        <div class="form-control">
                                            <select id="examinor_name" name="examinor_name" style="width: 80%;padding: 2px;" required>
                                            <option value="">SELECT</option>
                                            <?php foreach($examinor_name as $row): ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name_of_instructor']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                         </div> 
                                         <p>you must need to add instructor first.</p>
                                    </div>
                                     
                                  </div>


                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Upload Person photo</label>
                                        <div class="form-control">
                                            <input type="file" name="userimage" id="userimage">
                                        </div>
                                    </div>
                                  </div>
                               

                                 </div>
                            </div>

                        <br clear="all">    
                        <br clear="all">  
                 
                 

                  <a href="<?php echo base_url() ?>admin/id-card-generator-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       

                       <a href="javascript:void(0)" id="refresh" > <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">REFRESH</button></a>
                       <button type="submit" name="update" id="submit-btn" class="btn btn-success waves-effect" style="border-radius:20px;padding:10px 20px; margin-left:10px; ">Generate & Save</button>
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
      e.preventDefault();
      
      var form = $('#form_validations')[0];
      var formData = new FormData(form);
     console.log(formData);
      $.ajax({
         url: '<?php echo base_url(); ?>pdf_admin/id_card_generator_detail_add_ajax',
         type: 'POST',
         data: formData,
         dataType: 'json',
         processData: false,
         contentType: false,
         success: function(response) {
            // Display a success message
            alert('Id card detail has been successfully inserted!');
            window.location.href = "<?php echo base_url(); ?>admin/id-card-generator-detail";
         },
         error: function() {
            // Display an error message
            alert('Error inserting data!');
         }
      });
   });
});


</script>