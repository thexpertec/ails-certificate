<?php include('header.php'); ?>
  
   <!-- Bordered Table -->
       <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     
                        <div class="header">
                            <h2>
                               id card generator detail
                                
                            </h2>
                            
                        </div>
                          <div class="header">
                        <a href="<?php echo base_url() ?>admin/id-card-generator-detail/add"> <button type="button" class="btn btn-success waves-effect">Add Id Card</button></a>
                        </div>
               
           <div class="body table-responsive">
                            <table id="demo-custom-toolbar"  data-toggle="table" 
                data-search="true"
                data-sort-name="id"
                data-pagination="true" class="table-bordered ">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Photo</th>
                                      <th>ID NO.</th>
                                      <th>Name of Person</th>
                                      <th>Date of Issue</th>
                                      <th>Date of Expiry</th>
                                       <th>Examinor Name</th>
                                      <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                  if(isset($id_card_generator_data) && !empty($id_card_generator_data))
                  {
                    foreach($id_card_generator_data as $id_card_generator_data)
                    { 
                     
                        ?>
                     
                         <tr>
                              <td><?php echo $id_card_generator_data['card_id'];?></td>
                              <td><img src="<?php echo base_url(); ?>assets/img/<?php echo $id_card_generator_data['userimage']; ?>" style="height: 50px;width: 50px;"></td>
                              <td><?php echo $id_card_generator_data['id_no']; ?></td>
                              <td><?php echo $id_card_generator_data['name_of_trainee']; ?></td>
                              <td><?php echo $id_card_generator_data['date_of_issue']; ?></td>
                              <td><?php echo $id_card_generator_data['date_of_expiry']; ?></td>
                              <td><?php echo $id_card_generator_data['name_of_instructor']; ?></td>
                           <td>
                      <a href="<?php echo base_url() ?>receipt/id_card_print/<?php echo $id_card_generator_data['id_no']; ?>" style="color: white; background-color: blue; padding: 5px 10px;font-size: 14px; border-radius: 20px;" download="id-card-<?php echo $id_card_generator_data['id_no']; ?>.pdf">Generate ID CARD</a>      
                      <a href="<?php echo base_url() ?>admin/id-card-generator-detail/delete/<?php echo $id_card_generator_data['card_id']; ?>" onClick="return confirm('Are you sure you want to delete this thing into the database?')" style="color: white; background-color: red; padding: 5px 10px;font-size: 14px; border-radius: 20px;">Remove</a>
                       

                       
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


    

 