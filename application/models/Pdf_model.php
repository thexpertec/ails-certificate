<?php
class Pdf_model extends CI_Model
{
    public function get_customer_by_id($certificate_number)
    {
        $query = $this->db->query("SELECT * FROM pdf_form_data WHERE certificate_number = ?", array($certificate_number));
        
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->row_array();
    }

    public function get_trainee_by_id($certificate_no)
    {

		$this->db->select("trainee.name_of_trainee,trainee.phone,trainee.address,trainee.enrolled_on,trainee.certificate_no,trainee.id_no,trainee.valid_from,trainee.valid_until,company_name.c_name,position.p_position,enrolled_in_course.e_course,add_instructors.name_of_instructor");
		$this->db->from('trainee');
		$this->db->distinct('trainee.id');
		$this->db->join('company_name', 'company_name.id = trainee.company_name');
		$this->db->join('position', 'position.id = trainee.position');
		$this->db->join('enrolled_in_course', 'enrolled_in_course.id = trainee.enrolled_in_course');
		$this->db->join('add_instructors', 'add_instructors.id = trainee.instructor_name');
		$this->db->where('trainee.certificate_no',$certificate_no);
		$query = $this->db->get();
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->row_array();
    }

    public function get_id_card_generator($id_no)
    {	

    	$this->db->select("trainee.name_of_trainee,trainee.phone,trainee.address,trainee.enrolled_on,trainee.certificate_no,trainee.id_no,trainee.valid_from,trainee.valid_until,company_name.c_name,position.p_position,enrolled_in_course.e_course,add_instructors.name_of_instructor,id_card_generator.date_of_issue,id_card_generator.date_of_expiry,id_card_generator.userimage");
		$this->db->from('trainee');
		$this->db->join('id_card_generator', 'id_card_generator.person_name = trainee.id');
		$this->db->join('company_name', 'company_name.id = trainee.company_name');
		$this->db->join('position', 'position.id = trainee.position');
		$this->db->join('enrolled_in_course', 'enrolled_in_course.id = trainee.enrolled_in_course');
		$this->db->join('add_instructors', 'add_instructors.id = trainee.instructor_name');
		$this->db->where('trainee.id_no',$id_no);

        $query = $this->db->get();

		
        if ($query === false) {
            // Handle error
            return null;
        }
        
        return $query->row_array();
    }


    public function search_data($search_term) {
        // Retrieve data from the database based on the search term
        $this->db->like('certificate_number', $search_term);
        $query = $this->db->get('pdf_form_data');

        return $query->result();
    }


}
