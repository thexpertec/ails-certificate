<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function get_user_by_id($certificate_number)
    {
        $query = $this->db->query("SELECT * FROM pdf_form_data WHERE certificate_number = ?", array($certificate_number));
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->row_array();
    }

    public function fetch_pdf_form_data()
    {
        $query = $this->db->query("SELECT * FROM pdf_form_data");
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

    public function fetch_pdf_form_data_update($id)
    {
        $query = $this->db->query("SELECT * FROM pdf_form_data WHERE id = ?", array($id));
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

    function certificate_delete_by_id($id) {
        $this->db->where('id' , $id);
        if($this->db->delete('pdf_form_data')) {
            return  "1";
        } else { 
            return "0";
        }
    }
    
    public function fetch_name_address_owner_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM name_address_owner");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM name_address_owner WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }


    public function fetch_addresses_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM addresses");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM addresses WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }
   

    public function fetch_availability_daily_check_report_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM availability_daily_check_report");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM availability_daily_check_report WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

    public function fetch_availability_operations_manual_cab_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM availability_operations_manual_cab");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM availability_operations_manual_cab WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

    public function fetch_conclusion_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM conclusion");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM conclusion WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }
   
    public function fetch_declaration_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM declaration");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM declaration WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

     public function fetch_inspected_by_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM inspected_by");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM inspected_by WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

     public function fetch_note_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM note");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM note WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

     public function fetch_place_inspection_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM place_inspection");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM place_inspection WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }

     public function fetch_ref_standard_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM ref_standard");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM ref_standard WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }
  
    public function fetch_verified_by_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT * FROM verified_by");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT * FROM verified_by WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();
        }
       
    }
    


    // trainee area start

    public function fetch_trainee_pdf_form_data()
    {
        $query = $this->db->query("SELECT * FROM trainee");
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

    public function fetch_trainee_pdf_form_data_update($id)
    {
        $query = $this->db->query("SELECT * FROM trainee WHERE id = ?", array($id));
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

     public function fetch_trainee_pdf_form_data_view($id)
    {
       $this->db->select("trainee.name_of_trainee,trainee.phone,trainee.address,trainee.enrolled_on,trainee.certificate_no,trainee.id_no,trainee.valid_from,trainee.valid_until,company_name.c_name,position.p_position,enrolled_in_course.e_course,add_instructors.name_of_instructor");
        $this->db->from('trainee');
        $this->db->join('company_name', 'company_name.id = trainee.company_name');
        $this->db->join('position', 'position.id = trainee.position');
        $this->db->join('enrolled_in_course', 'enrolled_in_course.id = trainee.enrolled_in_course');
        $this->db->join('add_instructors', 'add_instructors.id = trainee.instructor_name');
        $this->db->where('trainee.id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function trainee_certificate_delete_by_id($id) {
        $this->db->where('id' , $id);
        if($this->db->delete('trainee')) {
            return  "1";
        } else { 
            return "0";
        }
    }


    public function fetch_company_name_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT id,c_name FROM company_name");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT id,c_name FROM company_name WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->row_array();
        }
       
    }

    public function fetch_enrolled_in_course_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT id,e_course FROM enrolled_in_course");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT id,e_course FROM enrolled_in_course WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->row_array();
        }
       
    }

    public function fetch_position_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT id,p_position FROM position");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT id,p_position FROM position WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->row_array();
        }
       
    }

     public function fetch_instructor_name_data($id ='')
    {
        if($id == '') {
            $query = $this->db->query("SELECT id,name_of_instructor FROM add_instructors");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

        }else{
            $query = $this->db->query("SELECT id,name_of_instructor FROM add_instructors WHERE id = ?", array($id));
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->row_array();
        }
       
    }

    // trainee area ended


     // Instructor area start

    public function fetch_instructors_pdf_form_data()
    {
        $query = $this->db->query("SELECT * FROM add_instructors");
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

    public function fetch_instructors_pdf_form_data_update($id)
    {
        $query = $this->db->query("SELECT * FROM add_instructors WHERE id = ?", array($id));
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

    function instructors_delete_by_id($id) {
        $this->db->where('id' , $id);
        if($this->db->delete('add_instructors')) {
            return  "1";
        } else { 
            return "0";
        }
    }
     // Instructor area ended
    function upload_images($id , $image_name , $column , $id_column , $table_name) {
        $data = array(
            $column => $image_name
            );
        $this->db->where($id_column , $id);
        if($this->db->update($table_name , $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function fetch_id_card_generator_data()
    {
       $this->db->select("id_card_generator.id as card_id,id_card_generator.date_of_issue,id_card_generator.date_of_expiry,id_card_generator.userimage,trainee.name_of_trainee,trainee.certificate_no,trainee.id_no,add_instructors.name_of_instructor");
        $this->db->from('id_card_generator');
        $this->db->distinct('id_card_generator.id');
        $this->db->join('trainee', 'trainee.id = id_card_generator.person_name');
        $this->db->join('add_instructors', 'add_instructors.id = id_card_generator.examinor_name');
        $query = $this->db->get();
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->result_array();
    }

     function id_card_generator_detail_delete_by_id($id) {
        $this->db->where('id' , $id);
        if($this->db->delete('id_card_generator')) {
            return  "1";
        } else { 
            return "0";
        }
    }

    public function fetch_person_name_data()
    {
       
            $query = $this->db->query("SELECT id,name_of_trainee FROM trainee");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

       
    }

    public function fetch_examinor_name_data()
    {
       
            $query = $this->db->query("SELECT id,name_of_instructor FROM add_instructors");
        
            if ($query === false) {
                // Handle error
                return null;
            }
        
            return $query->result_array();

       
    }


    
}

?>