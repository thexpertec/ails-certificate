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
                                            <input type="text" class="" name="name_of_trainee" id="name_of_trainee" value="<?php echo $trainee_pdf_form_datas[0]['name_of_trainee'] ?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Phone</label>
                                        <div class="form-control">
                                            <input type="Number" class="" name="phone" id="phone" value="<?php echo $trainee_pdf_form_datas[0]['phone'] ?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Enrolled on</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="enrolled_on" id="enrolled_on" value="<?php echo $trainee_pdf_form_datas[0]['enrolled_on'] ?>">
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

                                         <select id="company_name" name="company_name" style="width: 80%;padding: 2px;" required>
                                        <option value="">SELECT</option>
                                        <?php foreach($company_name as $row): ?>
                                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['c_name']; ?></option>
                                       
                                        <?php endforeach; ?>
                                        </select>

                                      <button type="button" name="submit" class="add-button">+ ADD</button>
                                      
                                         </div> 

                                    </div>
                                     
                                  </div>

                                 <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Position</label>
                                        <div class="form-control">
                                          <select id="position" name="position" style="width: 80%;padding: 2px;" required>
                                        <option value="">SELECT</option>
                                        <?php foreach($position as $row): ?>
                                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['p_position']; ?></option>
                                        
                                        <?php endforeach; ?>
                                        </select> 



                                      <button type="button" name="submit" class="button1">+ ADD</button>
                                      
                                         </div> 

                                    </div>
                                     
                                  </div> 


                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Enrolled in Course</label>
                                        <div class="form-control">
                                         <select id="enrolled_in_course" name="enrolled_in_course" style="width: 80%;padding: 2px;" required>
                                        <option value="">SELECT</option>
                                        <?php foreach($enrolled_in_course as $row): ?>
                                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['e_course']; ?></option>
                                        
                                        <?php endforeach; ?>
                                        </select>  


                                      <button type="button" name="submit" class="button2">+ ADD</button>
                                      
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
                                            <input type="date" class="" name="valid_from" id="valid_from" value="<?php echo $trainee_pdf_form_datas[0]['valid_from'] ?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">valid until</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="valid_until" id="valid_until" value="<?php echo $trainee_pdf_form_datas[0]['valid_until'] ?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Instructor By</label>
                                        <div class="form-control">
                                        <select id="instructor_name" name="instructor_name" style="width: 80%;padding: 2px;" required>
                                        <option value="">SELECT</option>
                                        <?php foreach($instructor_name as $rows): 

                                          ?>
                                        <option value="<?php echo $rows['id']; ?>" >
                                          <?php echo $rows['name_of_instructor']; ?>
                                            
                                          </option>
                                        
                                        <?php endforeach; ?>
                                        </select>  

                                      
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
                                           <textarea id="address" name="address" class="ads"><?php echo $trainee_pdf_form_datas[0]['address'] ?></textarea>
                                        </div>
                                    </div>
                                  </div>
                               

                                 </div>
                            </div>


                        <br clear="all">    
                        
                 
                 
                    <input type="hidden" id="pdf_id" value="<?php echo $trainee_pdf_form_datas[0]['id']; ?>">    
                  <a href="<?php echo base_url() ?>admin/trainee-certificate-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       
                       <a href="javascript:void(0)" id="refresh" > <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">REFRESH</button></a>
                       <button type="submit" name="submit" id="submit-btn" class="btn btn-success waves-effect" style="border-radius:20px;padding:10px 20px; margin-left:10px; ">SAVE & UPDATE</button>
                      </form> 
                        </div>     
                        
                    </div>
                </div>
            </div>
            <!-- #END# -->
       
        </div>
    </section>

     <!-- Fields popup html section -->
    <div id="popup1" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a company name:</label>
            <input type="text" name="c_name" id="c_name" style="width: 100%;" required>
        </div>
        <button type="submit" id="save1">Save</button>
       </form>
    </div>

    <div id="popup2" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a position:</label>
            <input type="text" name="p_position" id="p_position" style="width: 100%;" required>
        </div>
        <button type="submit" id="save2">Save</button>
       </form>
    </div>

    <div id="popup3" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a Enrolled in Course:</label>
            <input type="text" name="e_course" id="e_course" style="width: 100%;" required>
        </div>
        <button type="submit" id="save3">Save</button>
       </form>
    </div>


<?php } ?>
<?php include('footer.php'); ?>

<script type="text/javascript">

$(document).ready(function() {
   $('#submit-btn').click(function(e) {
      // Get the form data
       e.preventDefault();
      var id = $("#pdf_id").val();
      var formData = $('#form_validations').serialize();
      // Submit the form data to the insert_data function using Ajax
      $.ajax({
         url: '<?php echo base_url(); ?>pdf_admin/trainee_certificate_update_ajax/'+ id,
         type: 'POST',
         dataType: 'json',
         data: formData,
         success: function(response) {
            // Display a success message
            alert('Data has been successfully Updated!');
            window.location.href = "<?php echo base_url(); ?>admin/trainee-certificate-detail";
         },
         error: function() {
            // Display an error message
            alert('Error inserting data!');
         }
      });
    
   });
});


 $(document).ready(function() {
  // Show popup when add button is clicked
  $(".add-button").click(function() {
    $("#popup1").show();
     var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup1').height();
        var popupWidth = $('#popup1').width();

        $('#popup1').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup1").length && !$(event.target).is(".add-button")) {
      $("#popup1").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button1").click(function() {
    $("#popup2").show();
     var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup2').height();
        var popupWidth = $('#popup2').width();

        $('#popup2').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup2").length && !$(event.target).is(".button1")) {
      $("#popup2").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button2").click(function() {
    $("#popup3").show();
     var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup3').height();
        var popupWidth = $('#popup3').width();

        $('#popup3').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup3").length && !$(event.target).is(".button2")) {
      $("#popup3").hide();
    }
  });


  

});

$(document).ready(function(){
    $("#save1").click(function(){
        var c_name = $("#c_name").val();

        if(c_name == '') {
            $("#c_name").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/add_company_name",
            data: { c_name: c_name },
            success: function(data){
                // Success message
                alert('Company Name Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save2").click(function(){
        var p_position = $("#p_position").val();
        if(p_position == '') {
            $("#p_position").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/add_position",
            data: { p_position: p_position },
            success: function(data){
                // Success message
                alert('Position Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save3").click(function(){
        var e_course = $("#e_course").val();
        if(e_course == '') {
            $("#e_course").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/add_e_course",
            data: { e_course: e_course },
            success: function(data){
                // Success message
                alert('Enrolled in Course Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });


});   

</script>

    

 