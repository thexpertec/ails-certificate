<?php include('header.php'); ?>
  
   <!-- Bordered Table -->
       <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     
                        <div class="header">
                            <h2>
                               Trainee Certificate Detail
                                
                            </h2>
                            
                        </div>
                          <div class="header">
                        <a href="<?php echo base_url() ?>admin/trainee-certificate-detail/add"> <button type="button" class="btn btn-success waves-effect">Add Trainee Certificate</button></a>
                        </div>
               
           <div class="body table-responsive">
                            <table id="demo-custom-toolbar"  data-toggle="table" 
                data-search="true"
                data-sort-name="id"
                data-pagination="true" class="table-bordered ">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Certificate number</th>
                                      <th>ID No</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                  if(isset($trainee_pdf_form_data) && !empty($trainee_pdf_form_data))
                  {
                    foreach($trainee_pdf_form_data as $trainee_data)
                    { 
                     
                        ?>
                     
                         <tr>
                              <td><?php echo $trainee_data['id'];?></td>
                              <td><?php echo $trainee_data['certificate_no']; ?></td>
                              <td><?php echo $trainee_data['id_no']; ?></td>
                              <td><?php echo $trainee_data['phone']; ?></td>
                           <td>
                             <a href="<?php echo base_url() ?>admin/trainee-certificate-detail/view/<?php echo $trainee_data['id']; ?>" style="color: white; background-color: black; padding: 5px 10px;font-size: 14px; border-radius: 20px;">View</a>
                     <a href="<?php echo base_url() ?>admin/trainee-certificate-detail/edit/<?php echo $trainee_data['id']; ?>" style="color: white; background-color: orange; padding: 5px 10px;font-size: 14px; border-radius: 20px;margin-right:10px; ">Edit
                      </a> 
                      <a href="<?php echo base_url() ?>admin/trainee-certificate-detail/delete/<?php echo $trainee_data['id']; ?>" onClick="return confirm('Are you sure you want to delete this thing into the database?')" style="color: white; background-color: red; padding: 5px 10px;font-size: 14px; border-radius: 20px;">Remove</a>
                       <a href="<?php echo base_url() ?>receipt/trainee_print/<?php echo $trainee_data['certificate_no']; ?>" style="color: white; background-color: blue; padding: 5px 10px;font-size: 14px; border-radius: 20px;" download="trainee-certificate-<?php echo $trainee_data['certificate_no']; ?>.pdf">Certificate Download</a>

                       
                    </td>
                          </tr>
                                   
                               <?php
                        
                            } 
                          }
                        ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>     
            <!-- #END# Bordered Table -->
  
<?php include('footer.php'); ?>


    

 