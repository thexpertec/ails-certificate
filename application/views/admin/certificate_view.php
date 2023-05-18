<?php include('header.php'); ?>
<?php
  if(isset($pdf_form_datas) && !empty($pdf_form_datas))
  {
  ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>View Certificate</h2>
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
                                View Certificate
                               
                            </h2>
                            
                        </div>
                      
                        <div class="body">
                        <form id="form_validations" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                              <div class="row">

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Name and Address of Owner</label>
                                        <div class="form-control">
                                        <select id="name_address_owner" name="name_address_owner" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($name_address_owner_data as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['name_and_address_owner']; ?>" selected><?php echo $row['name_and_address_owner']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['name_and_address_owner']; ?>" ><?php echo $row['name_and_address_owner']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Marker and Date of Manufacture</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="manufacture_date" id="manufacture_date" value="<?php echo $pdf_form_datas[0]['manufacture_date']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                 
                                 <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Place of Inspection</label>
                                        <div class="form-control">
                                        <select id="inspection_place" name="inspection_place" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($place_inspection as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['place_inspection']; ?>" selected><?php echo $row['place_inspection']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['place_inspection']; ?>" ><?php echo $row['place_inspection']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>
                                
                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">


                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Ref. Standard</label>
                                        <div class="form-control">
                                        <select id="ref_standard" name="ref_standard" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($ref_standard as $row): ?>
                                       <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['ref_standard']; ?>" selected><?php echo $row['ref_standard']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['ref_standard']; ?>" ><?php echo $row['ref_standard']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>


                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Registration no. And owner no.</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="registration_number_owner_no" id="registration_number_owner_no" value="<?php echo $pdf_form_datas[0]['registration_number_owner_no']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Model and Serial No. </label>
                                        <div class="form-control">
                                            <input type="text" class="" name="model_serial_number" id="model_serial_number" value="<?php echo $pdf_form_datas[0]['model_serial_number']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Manufacturer’s documentation</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="manufacturer_documentation" id="manufacturer_documentation" value="<?php echo $pdf_form_datas[0]['manufacturer_documentation']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Previous Inspection/Cert. No. </label>
                                        <div class="form-control">
                                            <input type="date" class="" name="prev_inspection_date_cert_no" id="prev_inspection_date_cert_no" value="<?php echo $pdf_form_datas[0]['prev_inspection_date_cert_no']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Next Inspection</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="next_inspection_date" id="next_inspection_date" value="<?php echo $pdf_form_datas[0]['next_inspection_date']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Previous Load Test/Cert. No.</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="prev_load_test_date_cert_no" id="prev_load_test_date_cert_no" value="<?php echo $pdf_form_datas[0]['prev_load_test_date_cert_no']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Next Load and Test</label>
                                        <div class="form-control">
                                            <input type="date" class="" name="next_load_test_date" id="next_load_test_date" value="<?php echo $pdf_form_datas[0]['next_load_test_date']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Availability of Operations Manual in Cab</label>
                                        <div class="form-control">
                                        <select id="availability_of_operations_manual" name="availability_of_operations_manual" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($availability_operations_manual_cab as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['availability_operations_manual_cab']; ?>" selected><?php echo $row['availability_operations_manual_cab']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['availability_operations_manual_cab']; ?>" ><?php echo $row['availability_operations_manual_cab']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>


                              
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Load Chart in Cab</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="load_chart_in_cab" id="load_chart_in_cab" value="<?php echo $pdf_form_datas[0]['load_chart_in_cab']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Accessory Certificate</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="accessory_certificate" id="accessory_certificate" value="<?php echo $pdf_form_datas[0]['accessory_certificate']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Availability of Daily Check Report</label>
                                        <div class="form-control">
                                        <select id="availability_of_daily_check_report" name="availability_of_daily_check_report" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($availability_daily_check_report as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['availability_daily_check_report']; ?>" selected><?php echo $row['availability_daily_check_report']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['availability_daily_check_report']; ?>" ><?php echo $row['availability_daily_check_report']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>


                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Engine Serial Number</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="engine_serial_number" id="engine_serial_number" value="<?php echo $pdf_form_datas[0]['engine_serial_number']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Ground Clearance</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="ground_clearance" id="ground_clearance" value="<?php echo $pdf_form_datas[0]['ground_clearance']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Net power</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="net_power" id="net_power" value="<?php echo $pdf_form_datas[0]['net_power']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Bucket Width</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="bucket_width" id="bucket_width" value="<?php echo $pdf_form_datas[0]['bucket_width']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Bucket Capacity</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="bucket_capacity" id="bucket_capacity" value="<?php echo $pdf_form_datas[0]['bucket_capacity']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Dig Depth Backhoe</label>
                                        <div class="form-control">
                                            <input type="text" class="" name="dig_depth_backhoe" id="dig_depth_backhoe" value="<?php echo $pdf_form_datas[0]['dig_depth_backhoe']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                   <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">conclusion</label>
                                        <div class="form-control">
                                        <select id="conclusion" name="conclusion" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($conclusion as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['conclusion']; ?>" selected><?php echo $row['conclusion']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['conclusion']; ?>" ><?php echo $row['conclusion']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>



                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Declaration</label>
                                        <div class="form-control">
                                        <select id="declaration" name="declaration" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($declaration as $row): ?>
                                        <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['declaration']; ?>" selected><?php echo $row['declaration']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['declaration']; ?>" ><?php echo $row['declaration']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>

                                 </div>
                            </div>

                            <div class="col-md-12">
                              <div class="row">


                                 <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Inspected By</label>
                                        <div class="form-control">
                                        <select id="inspected_by" name="inspected_by" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($inspected_by as $row): ?>
                                       <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['inspected_by']; ?>" selected><?php echo $row['inspected_by']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['inspected_by']; ?>" ><?php echo $row['inspected_by']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>


                                   <div class="col-md-3">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Verified By</label>
                                        <div class="form-control">
                                        <select id="verified_by" name="verified_by" style="width: 80%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($verified_by as $row): ?>
                                         <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['verified_by']; ?>" selected><?php echo $row['verified_by']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['verified_by']; ?>" ><?php echo $row['verified_by']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>



                                  <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <label class="form-label" style="color:#000 !important;">Date of Inspection </label>
                                        <div class="form-control">
                                            <input type="date" class="" name="inspection_date" id="inspection_date" value="<?php echo $pdf_form_datas[0]['inspection_date']; ?>" readonly>
                                        </div>
                                    </div>
                                  </div>

                                   <div class="col-md-8">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Note</label>
                                        <div class="form-control">
                                        <select id="note" name="note" style="width: 90%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($note as $row): ?>
                                         <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['note']; ?>" selected><?php echo $row['note']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['note']; ?>" ><?php echo $row['note']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>

                                  <div class="col-md-8">
                                    <div class="form-group form-float">
                                       <label class="form-label" style="color:#000 !important;">Addresses</label>
                                        <div class="form-control">
                                        <select id="addresses" name="addresses" style="width: 90%;padding: 2px;" disabled>
                                        <option value="">SELECT</option>
                                        <?php foreach($addresses as $row): ?>
                                         <?php if($pdf_form_datas[0]['id'] == $row['id']){ ?>	
                                        <option value="<?php echo $row['addresses']; ?>" selected><?php echo $row['addresses']; ?></option>
                                        <?php  }else{ ?>
                                        	<option value="<?php echo $row['addresses']; ?>" ><?php echo $row['addresses']; ?></option>
                                        <?php } ?>	
                                        <?php endforeach; ?>
                                        </select>

                                      
                                         </div> 

                                    </div>
                                     
                                  </div>

                                   

                                 </div>
                            </div>

                        <br clear="all">    
                        
                 
                 
                    <input type="hidden" id="pdf_id" value="<?php echo $pdf_form_datas[0]['id']; ?>">    
                  <a href="<?php echo base_url() ?>admin/certificate-detail"> <button type="button" style="border-radius:20px;padding:10px 20px; margin-left:10px; " class="btn btn-success waves-effect">BACK</button></a>
                       
                    
                      </form> 
                        </div>     
                        
                    </div>
                </div>
            </div>
            <!-- #END# -->
       
        </div>
    </section>

    <!-- Fields popup html section -->
    <div id="popup" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a Name and Address of Owner:</label>
            <input type="text" name="name_and_address_owner" id="name_and_address_owner" style="width: 100%;" required>
        </div>
        <button type="submit" id="save">Save</button>
       </form>
    </div>

    <div id="popup1" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a addresses:</label>
            <input type="text" name="addresses" id="addres" style="width: 100%;" required>
        </div>
        <button type="submit" id="save1">Save</button>
       </form>
    </div>

    <div id="popup2" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a availability_daily_check_report:</label>
            <input type="text" name="availability_daily_check_report" id="availability_daily_check" style="width: 100%;" required>
        </div>
        <button type="submit" id="save2">Save</button>
       </form>
    </div>

    <div id="popup3" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a availability_operations_manual_cab:</label>
            <input type="text" name="availability_operations_manual_cab" id="availability_operations_manual_cabs" style="width: 100%;" required>
        </div>
        <button type="submit" id="save3">Save</button>
       </form>
    </div>

    <div id="popup4" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a conclusion:</label>
            <input type="text" name="conclusion" id="conclusions" style="width: 100%;" required>
        </div>
        <button type="submit" id="save4">Save</button>
       </form>
    </div>

    <div id="popup5" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a declaration:</label>
            <input type="text" name="declaration" id="declarations" style="width: 100%;" required>
        </div>
        <button type="submit" id="save5">Save</button>
       </form>
    </div>

    <div id="popup6" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a inspected_by:</label>
            <input type="text" name="inspected_by" id="inspected_bys" style="width: 100%;" required>
        </div>
        <button type="submit" id="save6">Save</button>
       </form>
    </div>

    <div id="popup7" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a note:</label>
            <input type="text" name="note" id="notes" style="width: 100%;" required>
        </div>
        <button type="submit" id="save7">Save</button>
       </form>
    </div>

    <div id="popup8" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a place_inspection:</label>
            <input type="text" name="place_inspection" id="place_inspection" style="width: 100%;" required>
        </div>
        <button type="submit" id="save8">Save</button>
       </form>
    </div>

    <div id="popup9" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a ref_standard:</label>
            <input type="text" name="ref_standard" id="ref_standards" style="width: 100%;" required>
        </div>
        <button type="submit" id="save9">Save</button>
       </form>
    </div>

    <div id="popup10" class="popup">
      <form id="form_validation" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="input-text">Enter a verified_by:</label>
            <input type="text" name="verified_by" id="verified_bys" style="width: 100%;" required>
        </div>
        <button type="submit" id="save10">Save</button>
       </form>
    </div>
    <!-- Fields popup html section Ended -->
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
         url: '<?php echo base_url(); ?>pdf_admin/certificate_update_ajax/'+ id,
         type: 'POST',
         dataType: 'json',
         data: formData,
         success: function(response) {
            // Display a success message
            alert('Data has been successfully Updated!');
            window.location.href = "<?php echo base_url(); ?>admin/certificate-detail";
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
    $("#popup").show();
     var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup').height();
        var popupWidth = $('#popup').width();

        $('#popup').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup").length && !$(event.target).is(".add-button")) {
      $("#popup").hide();
    }
  });


  // Show popup when add button is clicked
  $(".button1").click(function() {
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
    if (!$(event.target).closest("#popup1").length && !$(event.target).is(".button1")) {
      $("#popup1").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button2").click(function() {
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
    if (!$(event.target).closest("#popup2").length && !$(event.target).is(".button2")) {
      $("#popup2").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button3").click(function() {
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
    if (!$(event.target).closest("#popup3").length && !$(event.target).is(".button3")) {
      $("#popup3").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button4").click(function() {
    $("#popup4").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup4').height();
        var popupWidth = $('#popup4').width();

        $('#popup4').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup4").length && !$(event.target).is(".button4")) {
      $("#popup4").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button5").click(function() {
    $("#popup5").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup5').height();
        var popupWidth = $('#popup5').width();

        $('#popup5').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup5").length && !$(event.target).is(".button5")) {
      $("#popup5").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button6").click(function() {
    $("#popup6").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup6').height();
        var popupWidth = $('#popup6').width();

        $('#popup6').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup6").length && !$(event.target).is(".button6")) {
      $("#popup6").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button7").click(function() {
    $("#popup7").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup7').height();
        var popupWidth = $('#popup7').width();

        $('#popup7').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup7").length && !$(event.target).is(".button7")) {
      $("#popup7").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button8").click(function() {
    $("#popup8").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup8').height();
        var popupWidth = $('#popup8').width();

        $('#popup8').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup8").length && !$(event.target).is(".button8")) {
      $("#popup8").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button9").click(function() {
    $("#popup9").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup9').height();
        var popupWidth = $('#popup9').width();

        $('#popup9').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup9").length && !$(event.target).is(".button9")) {
      $("#popup9").hide();
    }
  });

  // Show popup when add button is clicked
  $(".button10").click(function() {
    $("#popup10").show();
    var inputPos = $(this).offset();
        var inputHeight = $(this).height();
        var popupHeight = $('#popup10').height();
        var popupWidth = $('#popup10').width();

        $('#popup10').css({
            top: inputPos.top + inputHeight + 'px',
            left: inputPos.left - (popupWidth/2) + 'px'
        }).addClass('open');
  });

  // Hide popup when outside of popup is clicked
  $(document).click(function(event) {
    if (!$(event.target).closest("#popup10").length && !$(event.target).is(".button10")) {
      $("#popup10").hide();
    }
  });

});

$(document).ready(function(){
    $("#save").click(function(){
        var name_and_address_owner = $("#name_and_address_owner").val();

        if(name_and_address_owner == '') {
            $("#name_and_address_owner").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/add_name_address_owner",
            data: { name_and_address_owner: name_and_address_owner },
            success: function(data){
                // Success message
                alert('Name and Address of Owner Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save1").click(function(){
        var addresses = $("#addres").val();
        if(addresses == '') {
            $("#addres").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/addresses",
            data: { addresses: addresses },
            success: function(data){
                // Success message
                alert('Addresses Added Successfully..!');
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
        var availability_daily_check_report = $("#availability_daily_check").val();
        if(availability_daily_check_report == '') {
            $("#availability_daily_check").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/availability_daily_check_report",
            data: { availability_daily_check_report: availability_daily_check_report },
            success: function(data){
                // Success message
                alert('Availability daily check report Added Successfully..!');
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
        var availability_operations_manual_cab = $("#availability_operations_manual_cabs").val();
        if(availability_operations_manual_cab == '') {
            $("#availability_operations_manual_cabs").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/availability_operations_manual_cab",
            data: { availability_operations_manual_cab: availability_operations_manual_cab },
            success: function(data){
                // Success message
                alert('Availability operations manual cab Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save4").click(function(){
        var conclusion = $("#conclusions").val();
        if(conclusion == '') {
            $("#conclusions").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/conclusion",
            data: { conclusion: conclusion },
            success: function(data){
                // Success message
                alert('Conclusion Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save5").click(function(){
        var declaration = $("#declarations").val();
        if(declaration == '') {
            $("#declarations").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/declaration",
            data: { declaration: declaration },
            success: function(data){
                // Success message
                alert('Declaration Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save6").click(function(){
        var inspected_by = $("#inspected_bys").val();
        if(inspected_by == '') {
            $("#inspected_bys").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/inspected_by",
            data: { inspected_by: inspected_by },
            success: function(data){
                // Success message
                alert('Inspected by Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save7").click(function(){
        var note = $("#notes").val();
        if(note == '') {
            $("#notes").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/note",
            data: { note: note },
            success: function(data){
                // Success message
                alert('Note Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save8").click(function(){
        var place_inspection = $("#place_inspection").val();
        if(place_inspection == '') {
            $("#place_inspection").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/place_inspection",
            data: { place_inspection: place_inspection },
            success: function(data){
                // Success message
                alert('Place inspection Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save9").click(function(){
        var ref_standard = $("#ref_standards").val();
       
        if(ref_standard == '') {
            $("#ref_standards").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/ref_standard",
            data: { ref_standard: ref_standard },
            success: function(data){
                // Success message
                alert('Ref standard Added Successfully..!');
                console.log(data);
            },
            error: function(){
                // Error message
                console.log("Error");
            }
        });
        }
       
    });

    $("#save10").click(function(){
        var verified_by = $("#verified_bys").val();
        if(verified_by == '') {
            $("#verified_bys").text('Please Enter the Require Field..!');
        }else {
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>pdf_admin/verified_by",
            data: { verified_by: verified_by },
            success: function(data){
                // Success message
                alert('Verified by Added Successfully..!');
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

    

 