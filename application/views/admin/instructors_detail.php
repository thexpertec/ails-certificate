<?php include('header.php'); ?>
  
   <!-- Bordered Table -->
       <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     
                        <div class="header">
                            <h2>
                               Instructors Detail
                                
                            </h2>
                            
                        </div>
                          <div class="header">
                        <a href="<?php echo base_url() ?>admin/instructors-detail/add"> <button type="button" class="btn btn-success waves-effect">Add Instructors</button></a>
                        </div>
               
           <div class="body table-responsive">
                            <table id="demo-custom-toolbar"  data-toggle="table" 
                data-search="true"
                data-sort-name="id"
                data-pagination="true" class="table-bordered ">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name of Instructor</th>
                                      <th>Instructor Phone</th>
                                      <th>Instructor Address</th>
                                       <th>Instructor Joined on</th>
                                      <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                  if(isset($instructors_pdf_form_data) && !empty($instructors_pdf_form_data))
                  {
                    foreach($instructors_pdf_form_data as $instructors_data)
                    { 
                     
                        ?>
                     
                         <tr>
                              <td><?php echo $instructors_data['id'];?></td>
                              <td><?php echo $instructors_data['name_of_instructor']; ?></td>
                              <td><?php echo $instructors_data['p_no']; ?></td>
                              <td><?php echo $instructors_data['p_address']; ?></td>
                              <td><?php echo $instructors_data['joined_on']; ?></td>
                           <td>
                             <a href="<?php echo base_url() ?>admin/instructors-detail/view/<?php echo $instructors_data['id']; ?>" style="color: white; background-color: black; padding: 5px 10px;font-size: 14px; border-radius: 20px;">View</a>
                     <a href="<?php echo base_url() ?>admin/instructors-detail/edit/<?php echo $instructors_data['id']; ?>" style="color: white; background-color: orange; padding: 5px 10px;font-size: 14px; border-radius: 20px;margin-right:10px; ">Edit
                      </a> 
                      <a href="<?php echo base_url() ?>admin/instructors-detail/delete/<?php echo $instructors_data['id']; ?>" onClick="return confirm('Are you sure you want to delete this thing into the database?')" style="color: white; background-color: red; padding: 5px 10px;font-size: 14px; border-radius: 20px;">Remove</a>
                       

                       
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


    

 