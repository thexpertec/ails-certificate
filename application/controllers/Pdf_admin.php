<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf_admin extends CI_Controller {
 
 
 	function __construct()
	{
		parent::__construct();
		error_reporting(1);
        $this->load->database();
         $this->load->helper('url');


	}	
     public function url_handler()
      {
          // Redirect to the desired URL
          redirect('admin/certificate-detail');
      }
      // Add certificate Area start
	
      public function certificate_detail()
	    {
        $this->load->model('Admin_model');
        $data['pdf_form_data'] = $this->Admin_model->fetch_pdf_form_data();
        $this->load->view('admin/certificate_detail',$data);
	    }

	    public function certificate_add_ajax()
      {
                // Generate random fields
                $certificate_number = "ISNTC".rand(100, 999999);
                $sticker_number = "ST".rand(100, 999999);
                $reference_number = "MCT".rand(100, 999999);

                // Get input data from AJAX request
                $data = array(
                'certificate_number' => $certificate_number,
                'sticker_number' => $sticker_number,
                'reference_number' => $reference_number,
                'name_address_owner' => $this->input->post('name_address_owner'),
                'manufacture_date' => $this->input->post('manufacture_date'),
                'inspection_place' => $this->input->post('inspection_place'),
                'ref_standard' => $this->input->post('ref_standard'),
                'registration_number_owner_no' => $this->input->post('registration_number_owner_no'),
                'model_serial_number' => $this->input->post('model_serial_number'),
                'manufacturer_documentation' => $this->input->post('manufacturer_documentation'),
                'prev_inspection_date_cert_no' => $this->input->post('prev_inspection_date_cert_no'),
                'next_inspection_date' => $this->input->post('next_inspection_date'),
                'prev_load_test_date_cert_no' => $this->input->post('prev_load_test_date_cert_no'),
                'next_load_test_date' => $this->input->post('next_load_test_date'),
                'availability_of_operations_manual' => $this->input->post('availability_of_operations_manual'),
                'load_chart_in_cab' => $this->input->post('load_chart_in_cab'),
                'accessory_certificate' => $this->input->post('accessory_certificate'),
                'availability_of_daily_check_report' => $this->input->post('availability_of_daily_check_report'),
                'engine_serial_number' => $this->input->post('engine_serial_number'),
                'ground_clearance' => $this->input->post('ground_clearance'),
                'net_power' => $this->input->post('net_power'),
                'bucket_width' => $this->input->post('bucket_width'),
                'bucket_capacity' => $this->input->post('bucket_capacity'),
                'dig_depth_backhoe' => $this->input->post('dig_depth_backhoe'),
                'conclusion' => $this->input->post('conclusion'),
                'declaration' => $this->input->post('declaration'),
                'inspected_by' => $this->input->post('inspected_by'),
                'verified_by' => $this->input->post('verified_by'),
                'inspection_date' => $this->input->post('inspection_date'),
                'note' => $this->input->post('note'),
                'addresses' => $this->input->post('addresses')
                );

                // Insert data into database

                $this->db->insert('pdf_form_data', $data);
                echo json_encode(array('status' => 'success', $data));

                // $this->load->view('admin/certificate_add');
      }
	  
      public function certificate_add()
      {  

         $this->load->model('Admin_model');
         $data['name_address_owner_data'] = $this->Admin_model->fetch_name_address_owner_data();
         $data['addresses'] = $this->Admin_model->fetch_addresses_data();
         $data['availability_daily_check_report'] = $this->Admin_model->fetch_availability_daily_check_report_data();
         $data['availability_operations_manual_cab'] = $this->Admin_model->fetch_availability_operations_manual_cab_data();
         $data['conclusion'] = $this->Admin_model->fetch_conclusion_data();
         $data['declaration'] = $this->Admin_model->fetch_declaration_data();
         $data['inspected_by'] = $this->Admin_model->fetch_inspected_by_data();
         $data['note'] = $this->Admin_model->fetch_note_data();
         $data['place_inspection'] = $this->Admin_model->fetch_place_inspection_data();
         $data['ref_standard'] = $this->Admin_model->fetch_ref_standard_data();
         $data['verified_by'] = $this->Admin_model->fetch_verified_by_data();
         $this->load->view('admin/certificate_add', $data);
      }

      public function certificate_update_ajax($id)
      {
           
            // Get input data from AJAX request
            $data = array(
                
                'name_address_owner' => $this->input->post('name_address_owner'),
                'manufacture_date' => $this->input->post('manufacture_date'),
                'inspection_place' => $this->input->post('inspection_place'),
                'ref_standard' => $this->input->post('ref_standard'),
                'registration_number_owner_no' => $this->input->post('registration_number_owner_no'),
                'model_serial_number' => $this->input->post('model_serial_number'),
                'manufacturer_documentation' => $this->input->post('manufacturer_documentation'),
                'prev_inspection_date_cert_no' => $this->input->post('prev_inspection_date_cert_no'),
                'next_inspection_date' => $this->input->post('next_inspection_date'),
                'prev_load_test_date_cert_no' => $this->input->post('prev_load_test_date_cert_no'),
                'next_load_test_date' => $this->input->post('next_load_test_date'),
                'availability_of_operations_manual' => $this->input->post('availability_of_operations_manual'),
                'load_chart_in_cab' => $this->input->post('load_chart_in_cab'),
                'accessory_certificate' => $this->input->post('accessory_certificate'),
                'availability_of_daily_check_report' => $this->input->post('availability_of_daily_check_report'),
                'engine_serial_number' => $this->input->post('engine_serial_number'),
                'ground_clearance' => $this->input->post('ground_clearance'),
                'net_power' => $this->input->post('net_power'),
                'bucket_width' => $this->input->post('bucket_width'),
                'bucket_capacity' => $this->input->post('bucket_capacity'),
                'dig_depth_backhoe' => $this->input->post('dig_depth_backhoe'),
                'conclusion' => $this->input->post('conclusion'),
                'declaration' => $this->input->post('declaration'),
                'inspected_by' => $this->input->post('inspected_by'),
                'verified_by' => $this->input->post('verified_by'),
                'inspection_date' => $this->input->post('inspection_date'),
                'note' => $this->input->post('note'),
                'addresses' => $this->input->post('addresses')
            );

            // Insert data into database
            
            $this->db->where('id', $id);
            $this->db->update('pdf_form_data', $data);
            echo json_encode(array('status' => 'success', $data));
      }

      public function certificate_update($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $data['name_address_owner_data'] = $this->Admin_model->fetch_name_address_owner_data($id);
          $data['addresses'] = $this->Admin_model->fetch_addresses_data($id);
          $data['availability_daily_check_report'] = $this->Admin_model->fetch_availability_daily_check_report_data($id);
          $data['availability_operations_manual_cab'] = $this->Admin_model->fetch_availability_operations_manual_cab_data($id);

          $data['conclusion'] = $this->Admin_model->fetch_conclusion_data($id);
          $data['declaration'] = $this->Admin_model->fetch_declaration_data($id);
          // print_r($data['declaration']);die;
          $data['inspected_by'] = $this->Admin_model->fetch_inspected_by_data($id);
          $data['note'] = $this->Admin_model->fetch_note_data($id);
          $data['place_inspection'] = $this->Admin_model->fetch_place_inspection_data($id);
          $data['ref_standard'] = $this->Admin_model->fetch_ref_standard_data($id);
          $data['verified_by'] = $this->Admin_model->fetch_verified_by_data($id);
          $data['pdf_form_datas'] = $this->Admin_model->fetch_pdf_form_data_update($id);
          $this->load->view('admin/certificate_update', $data);
          }
      }

      public function certificate_view($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $data['name_address_owner_data'] = $this->Admin_model->fetch_name_address_owner_data($id);
          $data['addresses'] = $this->Admin_model->fetch_addresses_data($id);
          $data['availability_daily_check_report'] = $this->Admin_model->fetch_availability_daily_check_report_data($id);
          $data['availability_operations_manual_cab'] = $this->Admin_model->fetch_availability_operations_manual_cab_data($id);

          $data['conclusion'] = $this->Admin_model->fetch_conclusion_data($id);
          $data['declaration'] = $this->Admin_model->fetch_declaration_data($id);
          // print_r($data['declaration']);die;
          $data['inspected_by'] = $this->Admin_model->fetch_inspected_by_data($id);
          $data['note'] = $this->Admin_model->fetch_note_data($id);
          $data['place_inspection'] = $this->Admin_model->fetch_place_inspection_data($id);
          $data['ref_standard'] = $this->Admin_model->fetch_ref_standard_data($id);
          $data['verified_by'] = $this->Admin_model->fetch_verified_by_data($id);
          $data['pdf_form_datas'] = $this->Admin_model->fetch_pdf_form_data_update($id);
          $this->load->view('admin/certificate_view', $data);
          }
      }

	 
     public function certificate_delete($id = '')
     {
          if($id == '')
          {
          redirect(base_url('admin/certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $query = $this->Admin_model->certificate_delete_by_id($id);
          if($query_rows == 1)
          {
          $this->Admin_model->certificate_delete_by_id($id);
          redirect(base_url('admin/certificate-detail'));
          }
          else
          {
          redirect(base_url('admin/certificate-detail'));
          }

          }
     }	

      // add fields options functions for ajax jquery
      public function add_name_address_owner()
        {
            $name_and_address_owner = $this->input->post('name_and_address_owner');

            // Insert data into database
            $data = array(
                'name_and_address_owner' => $name_and_address_owner
            );
            $this->db->insert('name_address_owner', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

      public function place_inspection()
        {
            $place_inspection = $this->input->post('place_inspection');

            // Insert data into database
            $data = array(
                'place_inspection' => $place_inspection
            );
            $this->db->insert('place_inspection', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

      public function ref_standard()
        {
            $ref_standard = $this->input->post('ref_standard');

            // Insert data into database
            $data = array(
                'ref_standard' => $ref_standard
            );
            $this->db->insert('ref_standard', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }
        
        public function conclusion()
        {
            $conclusion = $this->input->post('conclusion');

            // Insert data into database
            $data = array(
                'conclusion' => $conclusion
            );
            $this->db->insert('conclusion', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function declaration()
        {
            $declaration = $this->input->post('declaration');

            // Insert data into database
            $data = array(
                'declaration' => $declaration
            );
            $this->db->insert('declaration', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function verified_by()
        {
            $verified_by = $this->input->post('verified_by');

            // Insert data into database
            $data = array(
                'verified_by' => $verified_by
            );
            $this->db->insert('verified_by', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function availability_daily_check_report()
        {
            $availability_daily_check_report = $this->input->post('availability_daily_check_report');

            // Insert data into database
            $data = array(
                'availability_daily_check_report' => $availability_daily_check_report
            );
            $this->db->insert('availability_daily_check_report', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function availability_operations_manual_cab()
        {
            $availability_operations_manual_cab = $this->input->post('availability_operations_manual_cab');

            // Insert data into database
            $data = array(
                'availability_operations_manual_cab' => $availability_operations_manual_cab
            );
            $this->db->insert('availability_operations_manual_cab', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function inspected_by()
        {
            $inspected_by = $this->input->post('inspected_by');

            // Insert data into database
            $data = array(
                'inspected_by' => $inspected_by
            );
            $this->db->insert('inspected_by', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function note()
        {
            $note = $this->input->post('note');

            // Insert data into database
            $data = array(
                'note' => $note
            );
            $this->db->insert('note', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

        public function addresses()
        {
            $addresses = $this->input->post('addresses');

            // Insert data into database
            $data = array(
                'addresses' => $addresses
            );
            $this->db->insert('addresses', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }   

        // Add certificate area ended


        // Add trainee certificate area start 
        public function trainee_certificate_detail()
        {
          $this->load->model('Admin_model');
          $data['trainee_pdf_form_data'] = $this->Admin_model->fetch_trainee_pdf_form_data();
          $this->load->view('admin/trainee_certificate_detail',$data);
        }

      public function trainee_certificate_add_ajax()
      {
                // Generate random fields
                $certificate_no = "MCT".rand(100, 999999);
                $id_no = rand(100, 999999999);

                // Get input data from AJAX request
                $data = array(
                'certificate_no' => $certificate_no,
                'id_no' => $id_no,
                'name_of_trainee' => $this->input->post('name_of_trainee'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'company_name' => $this->input->post('company_name'),
                'position' => $this->input->post('position'),
                'enrolled_in_course' => $this->input->post('enrolled_in_course'),
                'enrolled_on' => $this->input->post('enrolled_on'),
                'instructor_name' => $this->input->post('instructor_name'),
                'valid_from' => $this->input->post('valid_from'),
                'valid_until' => $this->input->post('valid_until')
                
                );

                // Insert data into database

                $this->db->insert('trainee', $data);
                echo json_encode(array('status' => 'success', $data));

                // $this->load->view('admin/certificate_add');
      }
    
      public function trainee_certificate_add()
      {  

         $this->load->model('Admin_model');
         $data['company_name'] = $this->Admin_model->fetch_company_name_data();
         $data['enrolled_in_course'] = $this->Admin_model->fetch_enrolled_in_course_data();
         $data['position'] = $this->Admin_model->fetch_position_data();
         $data['instructor_name'] = $this->Admin_model->fetch_instructor_name_data();
         $this->load->view('admin/trainee_certificate_add', $data);
      }

      public function trainee_certificate_update_ajax($id)
      {
           
            // Get input data from AJAX request
            $data = array(
                'name_of_trainee' => $this->input->post('name_of_trainee'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'company_name' => $this->input->post('company_name'),
                'position' => $this->input->post('position'),
                'enrolled_in_course' => $this->input->post('enrolled_in_course'),
                'enrolled_on' => $this->input->post('enrolled_on'),
                'instructor_name' => $this->input->post('instructor_name'),
                'valid_from' => $this->input->post('valid_from'),
                'valid_until' => $this->input->post('valid_until')
                
                );

            // Insert data into database
            
            $this->db->where('id', $id);
            $this->db->update('trainee', $data);
            echo json_encode(array('status' => 'success', $data));
      }

      public function trainee_certificate_update($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/trainee-certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $data['trainee_pdf_form_datas'] = $this->Admin_model->fetch_trainee_pdf_form_data_update($id);
          $data['company_name'] = $this->Admin_model->fetch_company_name_data();
          $data['enrolled_in_course'] = $this->Admin_model->fetch_enrolled_in_course_data();
          $data['position'] = $this->Admin_model->fetch_position_data();
          $data['instructor_name'] = $this->Admin_model->fetch_instructor_name_data();
          //print_r($data['instructor_name']);die;
          $this->load->view('admin/trainee_certificate_update', $data);
          }
      }

      public function trainee_certificate_view($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/trainee-certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $this->load->model('Admin_model');
          $data['company_name'] = $this->Admin_model->fetch_company_name_data($id);
          $data['enrolled_in_course'] = $this->Admin_model->fetch_enrolled_in_course_data($id);
          $data['position'] = $this->Admin_model->fetch_position_data($id);
          $data['trainee_pdf_form_datas'] = $this->Admin_model->fetch_trainee_pdf_form_data_view($id);
          $this->load->view('admin/trainee_certificate_view', $data);
          }
      }

   
     public function trainee_certificate_delete($id = '')
     {
          if($id == '')
          {
          redirect(base_url('admin/trainee-certificate-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $query = $this->Admin_model->trainee_certificate_delete_by_id($id);
          if($query_rows == 1)
          {
          $traniee_del = $this->Admin_model->trainee_certificate_delete_by_id($id);
          redirect(base_url('admin/trainee-certificate-detail'));
          }
          else
          {
          redirect(base_url('admin/trainee-certificate-detail'));
          }

          }
     }  

	     // add fields options functions for ajax jquery
      public function add_company_name()
        {
            $c_name = $this->input->post('c_name');

            // Insert data into database
            $data = array(
                'c_name' => $c_name
            );
            $this->db->insert('company_name', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }


        // add fields options functions for ajax jquery
      public function add_position()
        {
            $p_position = $this->input->post('p_position');

            // Insert data into database
            $data = array(
                'p_position' => $p_position
            );
            $this->db->insert('position', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }


        // add fields options functions for ajax jquery
      public function add_e_course()
        {
            $e_course = $this->input->post('e_course');

            // Insert data into database
            $data = array(
                'e_course' => $e_course
            );
            $this->db->insert('enrolled_in_course', $data);
            echo json_encode(array('status' => 'success', $data));
            // Return success message
            //echo "Data inserted successfully";
        }

       // add trainee certificate area ended



        // Add instructors certificate area start 
        public function instructors_detail()
        {
          $this->load->model('Admin_model');
          $data['instructors_pdf_form_data'] = $this->Admin_model->fetch_instructors_pdf_form_data();
          $this->load->view('admin/instructors_detail',$data);
        }

      public function instructors_add_ajax()
      {
               
                // Get input data from AJAX request
                $data = array(
                'name_of_instructor' => $this->input->post('name_of_instructor'),
                'p_no' => $this->input->post('p_no'),
                'p_address' => $this->input->post('p_address'),
                'joined_on' => $this->input->post('joined_on')
                
                );
                // Insert data into database
                $this->db->insert('add_instructors', $data);
                echo json_encode(array('status' => 'success', $data));

                // $this->load->view('admin/certificate_add');
      }
    
      public function instructors_add()
      {  

         $this->load->model('Admin_model');
         $this->load->view('admin/instructors_add', $data);
      }

      public function instructors_update_ajax($id)
      {
           
            // Get input data from AJAX request
             $data = array(
                'name_of_instructor' => $this->input->post('name_of_instructor'),
                'p_no' => $this->input->post('p_no'),
                'p_address' => $this->input->post('p_address'),
                'joined_on' => $this->input->post('joined_on')
                
                );

            // Insert data into database
            
            $this->db->where('id', $id);
            $this->db->update('add_instructors', $data);
            echo json_encode(array('status' => 'success', $data));
      }

      public function instructors_update($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/instructors-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $data['instructors_pdf_form_datas'] = $this->Admin_model->fetch_instructors_pdf_form_data_update($id);
          $this->load->view('admin/instructors_update', $data);
          }
      }

      public function instructors_view($id = '')
      {  
          if($id == '')
          {
          redirect(base_url('admin/instructors-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $this->load->model('Admin_model');
          $data['instructors_pdf_form_datas'] = $this->Admin_model->fetch_instructors_pdf_form_data_update($id);
          $this->load->view('admin/instructors_view', $data);
          }
      }

   
     public function instructors_delete($id = '')
     {
          if($id == '')
          {
          redirect(base_url('admin/instructors-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $query = $this->Admin_model->instructors_delete_by_id($id);
          if($query_rows == 1)
          {
          $this->Admin_model->instructors_delete_by_id($id);
          redirect(base_url('admin/instructors-detail'));
          }
          else
          {
          redirect(base_url('admin/instructors-detail'));
          }

          }
     }  



      // Add instructors certificate area start 
        public function id_card_generator_detail()
        {
          $this->load->model('Admin_model');
          $data['id_card_generator_data'] = $this->Admin_model->fetch_id_card_generator_data();
          $this->load->view('admin/id_card_generator_detail',$data);
        }

      public function id_card_generator_detail_add_ajax()
{
      $this->load->library('upload');

      $config['upload_path'] = FCPATH.'./assets/img/'; // Directory to upload the file
      $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Allowed file types
      $config['max_size'] = 2048; // Maximum file size in KB

      $this->load->library('upload', $config);
      $this->upload->initialize($config);  
      if (!$this->upload->do_upload('userimage')) {
      // Handle file upload error
      $error = $this->upload->display_errors();
      echo $error;
      exit;
      }
      $file_data = $this->upload->data();
          // Get input data from AJAX request
          $data = array(
          'person_name' => $this->input->post('person_name'),
          'date_of_issue' => $this->input->post('date_of_issue'),
          'date_of_expiry' => $this->input->post('date_of_expiry'),
          'examinor_name' => $this->input->post('examinor_name'),
          'userimage' => $file_data['file_name']
          );

          // Insert data into database
          $this->db->insert('id_card_generator', $data);

          echo json_encode(array('status' => 'success', 'data' => $data));

}

    
      public function id_card_generator_detail_add()
      {  

         $this->load->model('Admin_model');
         $data['person_name'] = $this->Admin_model->fetch_person_name_data();
         $data['examinor_name'] = $this->Admin_model->fetch_examinor_name_data();
         $this->load->view('admin/id_card_generator_detail_add', $data);
      }

      public function id_card_generator_detail_delete($id = '')
     {
          if($id == '')
          {
          redirect(base_url('admin/id-card-generator-detail'));
          }
          else
          {
          $this->load->model('Admin_model');
          $query = $this->Admin_model->id_card_generator_detail_delete_by_id($id);
          if($query_rows == 1)
          {
          $this->Admin_model->id_card_generator_detail_delete_by_id($id);
          redirect(base_url('admin/id-card-generator-detail'));
          }
          else
          {
          redirect(base_url('admin/id-card-generator-detail'));
          }

          }
     } 
}
	

?>