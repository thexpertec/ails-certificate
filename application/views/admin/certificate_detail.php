<?php include('header.php'); ?>
  
   <!-- Bordered Table -->
       <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     
                        <div class="header">
                            <h2>
                               Certificate Detail
                                
                            </h2>
                            
                        </div>
                          <div class="header">
                        <a href="<?php echo base_url() ?>admin/certificate-detail/add"> <button type="button" class="btn btn-success waves-effect">Add certificate</button></a>
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
                                      <th>Sticker number</th>
                                      <th>Reference number</th>
                                      <th>Name Address Owner</th>
                                      <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                  if(isset($pdf_form_data) && !empty($pdf_form_data))
                  {
                    foreach($pdf_form_data as $pdf_form_datas)
                    { 
                     
                        ?>
                     
                         <tr>
                              <td><?php echo $pdf_form_datas['id'];?></td>
                              <td><?php echo $pdf_form_datas['certificate_number']; ?></td>
                              <td><?php echo $pdf_form_datas['sticker_number']; ?></td>
                              <td><?php echo $pdf_form_datas['reference_number']; ?></td>
                              <td><?php echo $pdf_form_datas['name_address_owner']; ?></td>
                           <td>
                             <a href="<?php echo base_url() ?>admin/certificate-detail/view/<?php echo $pdf_form_datas['id']; ?>" style="color: white; background-color: black; padding: 5px 10px;font-size: 14px; border-radius: 20px;">View</a>
                     <a href="<?php echo base_url() ?>admin/certificate-detail/edit/<?php echo $pdf_form_datas['id']; ?>" style="color: white; background-color: orange; padding: 5px 10px;font-size: 14px; border-radius: 20px;margin-right:10px; ">Edit
                      </a> 
                      <a href="<?php echo base_url() ?>admin/certificate-detail/delete/<?php echo $pdf_form_datas['id']; ?>" onClick="return confirm('Are you sure you want to delete this thing into the database?')" style="color: white; background-color: red; padding: 5px 10px;font-size: 14px; border-radius: 20px;">Remove</a>
                       <a href="<?php echo base_url() ?>receipt/print/<?php echo $pdf_form_datas['certificate_number']; ?>" style="color: white; background-color: blue; padding: 5px 10px;font-size: 14px; border-radius: 20px;" download="certificate.pdf">Certificate Download</a>

                       
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


    

 