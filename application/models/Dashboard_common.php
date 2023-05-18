<?php

class Dashboard_common extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	//COMMON FUNCTION STARTS
	function insertRecord($table, $colums)
    {
        if ($this->db->insert($table, $colums))
            return $this->db->insert_id();
        else
            return false;
    }

    //update function
    function updateRecord($table, $colums, $condition)
    {
        if ($this->db->update($table, $colums, $condition))
            return true;
        else
            return false;
    }

    function batchInsert($table, $data)
    {
        if ($this->db->insert_batch($table, $data))
            return true;
        else
            return false;
    }

    function batchUpdate($table, $data, $whereKey)
    {
        if ($this->db->update_batch($table, $data, $whereKey))
            return true;
        else
            return false;
    }

    // delete function
    function deleteRecord($table, $condition)
    {
        if ($this->db->delete($table, $condition)) {
            //echo $this->db->last_query(); 
            return true;
        } else {
            return false;
        }
    }

    function runQuery($sql='', $flag = '')
    {
        $this->result = $this->db->query($sql);
        if ($flag)
            return $this->result->row_array();
        else
            return $this->result->result_array();
    }


    public function getSingleRecord($table='', $where ='')
    {
        $query = $this->db->get_where($table, $where);
        $data = $query->row_array();
        if($data)
		{ 
		    return $data;
        } else {
            return false;
        }
    }
	
	 public function getSingleRecordWithCols($cols="*", $table='', $where='')
     {
        return $this->db->select($cols)->from($table)->where($where)->get()->row_array();
    }

    public function getSingleField($col='', $table='', $where='')
    {
        $this->db->select($col);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $data = $query->row_array();
        if (isset($data[$col])) {
            return $data[$col];
        } else {
            return null;
        }
    }


    public function getRecords($fields, $table, $sortby = "", $order = "", $where = "", $search = array(), $limit = "0", $start = "0", $addqoutes = TRUE)
    {
        $this->db->select($fields, $addqoutes);
        $this->db->from($table);
        if (!empty($where)) {
            $this->db->where($where);
        }

        if (!empty($search) && isset($search['cols']) && isset($search['value']) && $search['cols'] != "" && $search['value'] != "") {
            $like = "(";
            $colArray = explode(",", $search['cols']);
            foreach ($colArray as $c) {
                $like .= " " . trim($c) . " LIKE '%" . $this->db->escape_like_str(trim($search['value'])) . "%' OR ";
            }

            $vs = explode(" ", $search['value']);
            if (count($vs) > 1) {
                foreach ($vs as $v) {
                    foreach ($colArray as $c) {
                        $like .= " " . trim($c) . " LIKE '%" . $this->db->escape_like_str(trim($v)) . "%' OR ";
                    }
                }
            }

            $like = rtrim($like, "OR ");
            $like .= ")";
            $this->db->where($like);
        }

        if ($sortby != "" && $order != "") {
            $this->db->order_by($sortby, $order);
        }

        if ($limit != "0") {
            $this->db->limit($limit, $start);

        }
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;

    }


    public function countRecords($table, $where = array(), $search = array())
    {
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($search) && isset($search['cols']) && isset($search['value']) && $search['cols'] != "" && $search['value'] != "") {
            $like = "(";
            $colArray = explode(",", $search['cols']);
            foreach ($colArray as $c) {
                $like .= " " . trim($c) . " LIKE '%" . $this->db->escape_like_str($search['value']) . "%' OR ";
            }

            $vs = explode(" ", $search['value']);
            if (count($vs) > 1) {
                foreach ($vs as $v) {
                    foreach ($colArray as $c) {
                        $like .= " " . trim($c) . " LIKE '%" . $this->db->escape_like_str($v) . "%' OR ";
                    }
                }
            }

            $like = rtrim($like, "OR ");
            $like .= ")";
            $this->db->where($like);
        }
        $records = $this->db->count_all_results();
        return $records;
    }
	//COMMON FUNCTION ENDS
	
	public function getUserDataByID($id,$col="*")
	{
		return $this->db->select($col)->from('tbl_user')->where('id',$id)->get()->row_array();
	}
	
	public function getUserData($id=0)
	{
		$data = array();
		$cols = "u.id user_id, u.first_name,u.email_address, u.last_name, u.designation, u.slug user_slug, u.profile_pic user_pic, c.id company_id, c.company_name, c.slug company_slug, c.profile_pic company_pic, c.package_id, c.company_name,u.status user_status, c.status company_status,u.type, u.is_line_admin, u.last_online, u.online,ct.Name AS city, con.Name AS country";
		$where = array(
			'u.id' => $id
		);
		$data = $this->db->select($cols)->from('tbl_user u')
		->join('tbl_company c', 'u.company_id = c.id', 'inner')
		->join('tbl_country con', 'con.Code = u.country_id','left')
        ->join('tbl_city ct', 'ct.id = u.state','left')
		->where($where)->get()->row_array();	
		if(!empty($data))
		{
			$data['user_url'] 	= base_url('company/'.$data['company_slug'].'/'.$data['user_slug']);
			$data['company_url']  = base_url('company/'.$data['company_slug']);
			$data['user_pic'] = ($data['user_pic']!="" && file_exists('./uploads/images/'.$data['user_pic'])) ? base_url('uploads/images/'.$data['user_pic']) : base_url('uploads/images/target-avatar.jpg');
			$data['company_pic'] = ($data['company_pic']!="" && file_exists('./uploads/images/'.$data['company_pic'])) ? base_url('uploads/images/'.$data['company_pic']) : base_url('uploads/images/company-icon-120.jpg');	
		}
		
		return $data;	
	}
	
	public function getCompanyData($id=0)
	{
		$data = array();
		$cols = "c.id company_id, c.company_name, c.slug company_slug, c.profile_pic company_pic, c.package_id, c.company_name, c.status company_status";
		$where = array(
			'c.id' => $id
		);
		$data = $this->db->select($cols)->from('tbl_company c')
		->where($where)->get()->row_array();	
		if(!empty($data))
		{
			$data['company_url']  = base_url('company/'.$data['company_slug']);
			$data['company_pic'] = ($data['company_pic']!="" && file_exists('./uploads/images/'.$data['company_pic'])) ? base_url('uploads/images/'.$data['company_pic']) : base_url('uploads/images/company-icon-120.jpg');	
		}
		
		return $data;	
	}

    public function addNotification($from_id, $to_id,$activity,$notify_type,$primaryKey,$c_id=0,$notify_sent=1,$personalised_type="None",$privacy_id=0)
	{
		$notiData = array(
			'sender_id'		=>	$from_id,
			'recipient_id'	=>	$to_id,
			'activity'		=>	$activity,
			'notify_type'	=>	$notify_type,
			'track_id'		=>	$primaryKey,
			'c_id'			=>	(($c_id > 0) ? $c_id : $this->getCompanyIDbyUserID($from_id)),
			'created_date'	=>	date('Y-m-d H:i:s'),
			'notify_sent'	=>	$notify_sent,
			'personalised_type'	=>	$personalised_type,
			'privacy_id'	=>	$privacy_id
		);
		return ($this->db->insert('tbl_notification',$notiData)) ? $this->db->insert_id() : false;
	}
	
	public function getCompanyIDbyUserID($user_id=0)
	{
		$data = $this->db->select('company_id')->from('tbl_user')->where('id', $user_id)->get()->row_array();
		return (!empty($data) && isset($data['company_id'])) ? $data['company_id'] : 0;
		
	}
	
	public function checkConnectionStatus($from_id, $to_id)
	{
		$fromData = $this->db->select('status')->from('tbl_my_connection')->where(array('my_connection' => $from_id, 'network_connection' => $to_id))->get()->row_array();
		$toData = $this->db->select('status')->from('tbl_my_connection')->where(array('my_connection' => $to_id, 'network_connection' => $from_id))->get()->row_array();
		if(empty($fromData)  && empty($toData))
		{
			return 'Not Connected';
		}else if(!empty($fromData) && $fromData['status'] == 2 && !empty($toData) && $toData['status'] == 2) {
			return 'Connected';
		}
		else if(!empty($fromData) && $fromData['status'] == 1) {
			return 'Request Pending';
		}else if(!empty($toData) && $toData['status'] == 1)
		{
			return 'Accept Request';
		}
		 
	}
	
	public function isPrivateConnection($from_id, $to_id)
	{
		$count = $this->db->from('tbl_my_connection')->where(array('my_connection' => $from_id, 'network_connection' => $to_id, 'status'=>'2', 'con_type'=> 'Private'))->count_all_results();
		return ($count > 0) ? true : false;
		 
	}
	public function isPrivatelyConnected($from_id, $to_id)
	{
		//echo $from_id.'-'.$to_id.'<br>';
		$count1 = $this->db->from('tbl_my_connection')->where(array('my_connection' => $from_id, 'network_connection' => $to_id, 'status'=>'2', 'con_type'=> 'Private'))->count_all_results();
		$count2 = $this->db->from('tbl_my_connection')->where(array('my_connection' => $to_id, 'network_connection' => $from_id, 'status'=>'2', 'con_type'=> 'Private'))->count_all_results();
		//echo $count1.'-'.$count2;
		//exit;
		return ($count1 > 0 || $count2 > 0) ? true : false;
		 
	}
	
	
	
	
	public function sendConnectionRequest($from_id, $to_id)
	{
		if($this->checkConnectionStatus($from_id, $to_id) == "Not Connected")
		{
			$data = array(
				'my_connection'			=>	$from_id,
				'network_connection'	=>	$to_id,
				'status'				=>	1
			);
			if($this->db->insert('tbl_my_connection',$data))
			{
				$primaryKey = $this->db->insert_id();
				$this->addNotification($from_id, $to_id,'request','connection_request',$primaryKey);
				return $primaryKey;
			}else{
				return false;	
			}
			
		}else{
			return false;	
		}
	}
	
	
	
	public function networkStatus($fromCompanyID, $toCompanyID)
	{
		$fromData = $this->db->select('*')->from('tbl_my_network')->where(array('my_company' => $fromCompanyID, 'network_company' => $toCompanyID))->get()->row_array();
		$toData = $this->db->select('*')->from('tbl_my_network')->where(array('my_company' => $toCompanyID, 'network_company' => $fromCompanyID))->get()->row_array();
		if($fromCompanyID == $toCompanyID)
		{
			return 'Connected';
		}else if(empty($fromData)  && empty($toData))
		{
			return 'No Connection';
		}else if((!empty($fromData) && $fromData['status'] == 2 && !empty($toData) && $toData['status'] == 2))
		{
			return 'Connected';
		}
		else if(!empty($fromData) && $fromData['status'] == 1)
		{
			return 'Request Pending';
		}else if(!empty($toData) && $toData['status'] == 1)
		{
			return 'Invitation Received';
		}
		
	}
	public function checkNetworkStatus($from_id, $to_id)
	{
		$fromCompanyID = $this->getCompanyIDbyUserID($from_id);
		$toCompanyID = $this->getCompanyIDbyUserID($to_id);
		return $this->networkStatus($fromCompanyID, $toCompanyID);
		 
	}
	public function conStatus($from_id, $to_id){
		$fromData = $this->db->select('*')->from('tbl_my_connection')->where(array('my_connection' => $from_id, 'network_connection' => $to_id))->get()->row_array();
		$toData = $this->db->select('*')->from('tbl_my_connection')->where(array('my_connection' => $to_id, 'network_connection' => $from_id))->get()->row_array();
	
		if($from_id == $to_id)
		{
			return 'Connected';
		}else if(empty($fromData)  && empty($toData))
		{
			return 'No Connection';
		}else if((!empty($fromData) && $fromData['status'] == 2 && !empty($toData) && $toData['status'] == 2))
		{
			return 'Connected';
		}
		else if(!empty($fromData) && $fromData['status'] == 1)
		{
			return 'Request Pending';
		}else if(!empty($toData) && $toData['status'] == 1)
		{
			return 'Invitation Received';
		}
	 }
	 
	
	 
	 public function getOldUsersByCompanyID($company_id, $limit)
	 {
		//$data = $this->getRecords('id,company_id,email_address', 'tbl_user', 'created_date', 'ASC', array('company_id'=>$company_id, 'status'=>1), array(), $limit, 0);
		$data = $this->db->select('u.id, u.company_id, u.first_name, u.email_address')->from('tbl_user u')->join('tbl_company c', 'c.id = u.company_id', 'inner')->where(array('c.id'=>$company_id,'c.status'=>1, 'u.status'=>1))->order_by('u.created_date','ASC')->limit(2)->get()->result_array();
		
		return $data;
		
	 }
	 
	 public function getUsersByCompanyIDwithData($company_id,$not="")
	 {
		 $query = "SELECT c.company_name,c.slug, u.id, u.first_name, u.last_name, u.email_address, u.designation,u.profile_pic, IFNULL((SELECT cn.Name FROM tbl_country cn WHERE cn.Code = u.country_id), '') country_name, IFNULL((SELECT cc.Name FROM tbl_city cc WHERE cc.id = u.state), '') city_name  FROM tbl_user u INNER JOIN tbl_company c ON c.id = u.company_id WHERE c.status = 1 AND u.status = 1 AND company_id = ".$this->db->escape_str($company_id)." ".(($not!="") ? " AND u.id NOT IN (".$not.") " : "")." ORDER BY u.first_name ASC";
		
		 $data = $this->runQuery($query);
		 if(!empty($data))
		 {
			 foreach($data as $k=>$d)
			 {
				$data[$k]['profile_pic'] 		= 	((isset($d['profile_pic']) && $d['profile_pic']!="" && file_exists('./uploads/images/'.$d['profile_pic'])) ? base_url('uploads/images/'.$d['profile_pic']) : base_url('uploads/images/target-avatar.jpg'));
				$data[$k]['designation'] 		= ($d['designation'] == "") ? "" : $d['designation'];
				$data[$k]['country_name'] 		= ($d['country_name'] == "") ? "" : $d['country_name'];
				$data[$k]['city_name'] 			= ($d['city_name'] == "") ? "" : $d['city_name'];
			 }
		 }
		 return $data;
		 
	 }

	  public function getUsersByCompanyIDswithData($company_id,$not="")
	 {
		 $query = "SELECT c.company_name,c.slug, u.id, u.first_name, u.last_name, u.email_address, u.designation,u.profile_pic, IFNULL((SELECT cn.Name FROM tbl_country cn WHERE cn.Code = u.country_id), '') country_name, IFNULL((SELECT cc.Name FROM tbl_city cc WHERE cc.id = u.state), '') city_name  FROM tbl_user u INNER JOIN tbl_company c ON c.id = u.company_id WHERE c.status = 1 AND u.status = 1 AND company_id IN (".$this->db->escape_str($company_id).") ".(($not!="") ? " AND u.id NOT IN (".$not.") " : "")." ORDER BY u.first_name ASC";
		
		 $data = $this->runQuery($query);
		 if(!empty($data))
		 {
			 foreach($data as $k=>$d)
			 {
				$data[$k]['profile_pic'] 		= 	((isset($d['profile_pic']) && $d['profile_pic']!="" && file_exists('./uploads/images/'.$d['profile_pic'])) ? base_url('uploads/images/'.$d['profile_pic']) : base_url('uploads/images/target-avatar.jpg'));
				$data[$k]['designation'] 		= ($d['designation'] == "") ? "" : $d['designation'];
				$data[$k]['country_name'] 		= ($d['country_name'] == "") ? "" : $d['country_name'];
				$data[$k]['city_name'] 			= ($d['city_name'] == "") ? "" : $d['city_name'];
			 }
		 }
		 return $data;
		 
	 }
	 
	  public function getUsersByCompanyID($company_id)
	 {
		$data = $this->getRecords('id,first_name, last_name, email_address', 'tbl_user', 'created_date', 'ASC', array('company_id'=>$company_id, 'status'=>1));
		return $data;
	 }
	 public function checkDealerStatus($from_company_id, $to_company_id)
	 {
		$data = $this->getSingleRecord('tbl_dealer_networks', array('manufacturer_company_id'	=>	$from_company_id, 'dealer_company_id'	=>	$to_company_id));
		if(empty($data) || $from_company_id == $to_company_id)
		{
			return "Not a dealer";	
		}else if(isset($data['status']) && $data['status'] == "2")
		{
			return "Approved Dealer";	
		}
		else if(isset($data['status']) && $data['status'] == "1")
		{
			return "Request Pending";	
		}
		else{
			return "Not a dealer";	
		}
	 }
	
	 		 
	public function createCompanyURL($id, $name)
	{
		  $hash     				=  	md5(base64_encode($id));
		  $companyName      		=  	str_replace(" ","-",strtolower($name).'-'.strlen($id));
		  $company_url  			= 	base_url('company/'.$id.$hash.'/'.$companyName);
		  return $company_url;	
	}
	public function createUserURL($id, $fname, $lname, $email)
	{
		  $hash     	= 	md5(base64_encode($email));
          $fullName     = 	strtolower($fname).'-'.strtolower($lname).'-'.strlen($id);
          $user_url		= 	base_url('profile/'.$id.$hash.'/'.$fullName);
		  return $user_url;	
	}
	
	
	
	public function autoPostNetwork($fromCompanyID, $toCompanyID)
	{
		$fromCData 		= $this->getSingleRecord('tbl_company', array('id' => $fromCompanyID));
		$toCData	 	= $this->getSingleRecord('tbl_company', array('id' => $toCompanyID));
		if(!empty($fromCData) && !empty($toCData))
		{
			 //From Company Data
			 $fName 		= 		$fromCData['company_name'];
			 $fID 			= 		$fromCData['id']; 
			 $fURL			=		 base_url('company/'.$fromCData['slug']);
			 $fImage 		= 		(isset($fromCData['profile_pic']) && $fromCData['profile_pic']!="" && file_exists('./uploads/images/'.$fromCData['profile_pic'])) ?  base_url('uploads/images/'.$fromCData['profile_pic']) : base_url('uploads/images/company-icon-120.jpg');
			  //To Company Data
			 $tName 		= 		$toCData['company_name'];
			 $tID 			= 		$toCData['id']; 
			 $tURL			=		base_url('company/'.$toCData['slug']);
			 $tImage 		= 		(isset($toCData['profile_pic']) && $toCData['profile_pic']!="" && file_exists('./uploads/images/'.$toCData['profile_pic'])) ?  base_url('uploads/images/'.$toCData['profile_pic']) : base_url('uploads/images/company-icon-120.jpg');
			
			 
			 $postTitle = 'Your company has a new network';
			 $postDesc = '<div class="panel-body panel-body0 p-l-0 p-r-0 panel-connection">
                  <div class="row text-center">
                    <div class="col-sm-4 text-center p-t-50 p-b-50">
                      
                      <a title="'.$fName.'" class="network-connect" href="'.$fURL.'"> 
                      <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
                        <img src="'.$fImage.'" alt="">
                      </div>
                      <h3 class="fs-14 font-semibold">'.$fName.'</h3>
                      </a>
                    </div>

                    <div class="col-sm-4 text-center m-t-40">
                      <img class="m-t-30" src="'.base_url('assets/dashboard/img/network-plug.svg').'" alt="" > 
                    </div>

                    <div class="col-sm-4 text-center p-t-50 p-b-50">
                      <a title="'.$tName.'" class="network-connect" href="'.$tURL.'"> 
                      <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
                        <img src="'.$tImage.'" alt="">
                      </div>
                      <h3 class="fs-14 font-semibold">'.$tName.'</h3>
                      </a>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center m-t-20 p-t-10 m-b-20">
                  <h2 class="fs-16">Your company has a new private trading network</h2>
                  <p class="text-center">"If you want to go fast, go alone, if you want to go far, go with others."</p>
                 <div class="col-lg-6 m-t-15 text-center"> <a href="'.$tURL.'" class="btn btn-primary p-l-35 p-r-35">View Profile</a> </div>
				 <div class="col-lg-6 m-t-15 text-center"> <a href="'.base_url('/network-detail/'.$tID).'" class="btn btn-primary ">Add Connections</a> </div>
                <div class="clearfix"></div>
                </div>
                  
                </div>';
			  
							
			$postTitle2 = 'Your company has a new network';
			$postDesc2 = '<div class="panel-body panel-body0 p-l-0 p-r-0 panel-connection">
                  <div class="row text-center">
                    <div class="col-sm-4 text-center p-t-50 p-b-50">
                      <a title="'.$tName.'" class="network-connect" href="'.$tURL.'"> 
                      <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
                        <img src="'.$tImage.'" alt="">
                      </div>
                      <h3 class="fs-14 font-semibold">'.$tName.'</h3>
                      </a>
                      
                    </div>

                    <div class="col-sm-4 text-center m-t-40">
                      <img class="m-t-30" src="'.base_url('assets/dashboard/img/network-plug.svg').'" alt="" > 
                    </div>

                    <div class="col-sm-4 text-center p-t-50 p-b-50">
                      <a title="'.$fName.'" class="network-connect" href="'.$fURL.'"> 
                      <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
                        <img src="'.$fImage.'" alt="">
                      </div>
                      <h3 class="fs-14 font-semibold">'.$fName.'</h3>
                      </a>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center m-t-20 p-t-10 m-b-20">
                  <h2 class="fs-16">Your company has a new private trading network</h2>
                  <p class="text-center">"If you want to go fast, go alone, if you want to go far, go with others."</p>
                 <div class="col-lg-6 m-t-15 text-center"> <a href="'.$fURL.'" class="btn btn-primary p-l-35 p-r-35">View Profile</a> </div>
				 <div class="col-lg-6 m-t-15 text-center"> <a href="'.base_url('/network-detail/'.$fID).'" class="btn btn-primary ">Add Connections</a> </div>
                <div class="clearfix"></div>
                </div>
                  
                </div>'; 
			
			//Inserting into post table
			$data = array(
					'title'					=>		$postTitle,
					'description'			=>		$postDesc,
					'is_company_news'		=>		1,		
					'post_type'				=>		0,		
					'user_id'				=>		1,		
					'status'				=>		1,		
					'created_date'			=>		date('Y-m-d H:i:s'),		
					'privacy_id'			=>		8,
					'c_id'					=>		0			
			);
			$postID = $this->insertRecord('tbl_post', $data);
			if($postID)
			{
					//Inserting into post access group
					$aData = array(
						'company_group'		=>		$fromCompanyID,
						'post_id'			=>		$postID
					);
				   $aID = $this->insertRecord('tbl_access_group', $aData);
			}
			
			//Inserting into post table
			$data2 = array(
					'title'					=>		$postTitle2,
					'description'			=>		$postDesc2,
					'is_company_news'		=>		1,		
					'post_type'				=>		0,		
					'user_id'				=>		1,		
					'status'				=>		1,		
					'created_date'			=>		date('Y-m-d H:i:s'),		
					'privacy_id'			=>		8,
					'c_id'					=>		0			
			);
			$postID2 = $this->insertRecord('tbl_post', $data2);
			if($postID2)
			{
					//Inserting into post access group
					$aData2 = array(
						'company_group'		=>		$toCompanyID,
						'post_id'			=>		$postID2
					);
				   $aID2 = $this->insertRecord('tbl_access_group', $aData2);
			}
			
			
			return true;
			
		}
		else{
			return false;	
		}
	}
	
	public function autoPostDealer($fromCompanyID, $toCompanyID, $trackID=0)
	{
		$fromCData 		= $this->getSingleRecord('tbl_company', array('id' => $fromCompanyID));
		$toCData	 	= $this->getSingleRecord('tbl_company', array('id' => $toCompanyID));
		
		if(!empty($fromCData) && !empty($toCData) && $this->checkDealerStatus($fromCompanyID, $toCompanyID) == "Approved Dealer")
		{
			 //From Company Data
			 $fName 		= 		$fromCData['company_name'];
			 $fID 			= 		$fromCData['id']; 
			 $fURL			=		base_url('company/'.$fromCData['slug']);
			 $fImage 		= 		(isset($fromCData['profile_pic']) && $fromCData['profile_pic']!="" && file_exists('./uploads/images/'.$fromCData['profile_pic'])) ?  base_url('uploads/images/'.$fromCData['profile_pic']) : base_url('uploads/images/company-icon-120.jpg');
			  //To Company Data
			 $tName 		= 		$toCData['company_name'];
			 $tID 			= 		$toCData['id']; 
			 $tURL			=		base_url('company/'.$toCData['slug']);
			 $tImage 		= 		(isset($toCData['profile_pic']) && $toCData['profile_pic']!="" && file_exists('./uploads/images/'.$toCData['profile_pic'])) ?  base_url('uploads/images/'.$toCData['profile_pic']) : base_url('uploads/images/company-icon-120.jpg');
			 //Getting the dealer networks
			 $cidsArr = $this->runQuery("SELECT group_concat(network_company) cids FROM tbl_my_network WHERE my_company = ".$tID." AND network_company != ". $tID." AND network_company != ". $fID." AND `status` = 2",1);
			$dealerNetworkCompaniesIDs = $cidsArr['cids']; 
			 
			 $postTitle = 'Your company has a new dealer';
			 $postDesc = '<div class="panel-body panel-body0 p-l-0 p-r-0 panel-connection no-bg">
							  <div class="row text-center dealer-n">
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  
								  <a title="'.$fName.'" class="network-connect" href="'.$fURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$fImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$fName.'</h3>
								  </a>
								</div>
								<div class="col-sm-6 text-center m-t-0">
								  <img src="'.base_url('assets/img/dealer.png').'" alt="" > 
								</div>
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  <a title="'.$tName.'" class="network-connect" href="'.$tURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$tImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$tName.'</h3>
								  </a>
								</div>
							  </div>
							  <div class="clearfix"></div>
							  <div class="text-center m-t-0 p-t-0 m-b-20">
							  <h2 class="fs-16 lh-26">Your company has listed a new <a href="'.$tURL.'">DEALER</a> to their network</h2>
							  <p class="text-center">"If you want to go fast, go alone, if you want to go far, go with others."</p>
							  <div class="col-lg-6 m-t-15 text-center"> <a href="'.$tURL.'" class="btn btn-primary p-l-35 p-r-35">View Profile</a> </div>
							<div class="col-lg-6 m-t-15 text-center"> <a href="'.base_url('/network-detail/'.$tID).'" class="btn btn-primary ">Add Connections</a> </div>
							<div class="clearfix"></div>
							</div>
							  
							</div>'; 
							
			$postTitle2 = 'Your company is now an official dealer of '.$fName;
			$postDesc2 = '<div class="panel-body panel-body0 p-l-0 p-r-0 panel-connection no-bg">
							  <div class="row text-center dealer-n">
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  
								  <a title="'.$tName.'" class="network-connect" href="'.$tURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$tImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$tName.'</h3>
								  </a>
								</div>
								<div class="col-sm-6 text-center m-t-0">
								  <img src="'.base_url('assets/img/dealer.png').'" alt="" > 
								</div>
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  <a title="'.$fName.'" class="network-connect" href="'.$fURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$fImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$fName.'</h3>
								  </a>
								</div>
							  </div>
							  <div class="clearfix"></div>
							  <div class="text-center m-t-0 p-t-0 m-b-20">
							  <h2 class="fs-16 lh-26">Your company is now an official dealer network of<br><a href="'.$fURL.'">'.$fName.'</a></h2>
							  <p class="text-center">"If you want to go fast, go alone, if you want to go far, go with others."</p>
							  <div class="col-lg-6 m-t-15 text-center"> <a href="'.$fURL.'" class="btn btn-primary p-l-35 p-r-35">View Profile</a> </div>
							<div class="col-lg-6 m-t-15 text-center"> <a href="'.base_url('/network-detail/'.$fID).'" class="btn btn-primary ">Add Connections</a> </div>
							<div class="clearfix"></div>
							</div>
							  
							</div>'; 
							
			$postTitle3 = $tName.' has been appointed as an official dealer network of '.$fName;
			$postDesc3 = '<div class="panel-body panel-body0 p-l-0 p-r-0 panel-connection no-bg">
							  <div class="row text-center dealer-n">
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  <a title="'.$tName.'" class="network-connect" href="'.$tURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$tImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$tName.'</h3>
								  </a>
								  
								</div>
								<div class="col-sm-6 text-center m-t-0">
								  <img src="'.base_url('assets/img/dealer.png').'" alt="" > 
								</div>
								<div class="col-sm-3 text-center p-t-50 p-b-50">
								  <a title="'.$fName.'" class="network-connect" href="'.$fURL.'"> 
								  <div class="thumbnail-wrapper d80 circular b-a b-grey pull-none">
									<img src="'.$fImage.'" alt="">
								  </div>
								  <h3 class="fs-14 font-semibold">'.$fName.'</h3>
								  </a>
								</div>
							  </div>
							  <div class="clearfix"></div>
							  <div class="text-center m-t-0 p-t-0 m-b-20">
							  <h2 class="fs-16 lh-26"><a title="'.$tName.'" class="network-connect" href="'.$tURL.'">'.$tName.'</a> has been appointed as an official dealer network of <a title="'.$fName.'" class="network-connect" href="'.$fURL.'">'.$fName.'</a></h2>
							  <p class="text-center">"If you want to go fast, go alone, if you want to go far, go with others."</p>
							 
							<div class="clearfix"></div>
							</div>
							  
							</div>'; 
			
			//Inserting into post table
			$data = array(
					'title'					=>		$postTitle,
					'description'			=>		$postDesc,
					'is_company_news'		=>		1,		
					'post_type'				=>		0,		
					'user_id'				=>		1,		
					'status'				=>		1,		
					'created_date'			=>		date('Y-m-d H:i:s'),		
					'privacy_id'			=>		8,
					'c_id'					=>		0,
					'post_from'				=>		'Dealer',
					'post_track_id'			=>		$trackID,			
			);
			$postID = $this->insertRecord('tbl_post', $data);
			if($postID)
			{
					//Inserting into post access group
					$aData = array(
						'company_group'		=>		$fromCompanyID,
						'post_id'			=>		$postID
					);
				   $aID = $this->insertRecord('tbl_access_group', $aData);
			}
			
			//Inserting into post table
			$data2 = array(
					'title'					=>		$postTitle2,
					'description'			=>		$postDesc2,
					'is_company_news'		=>		1,		
					'post_type'				=>		0,		
					'user_id'				=>		1,		
					'status'				=>		1,		
					'created_date'			=>		date('Y-m-d H:i:s'),		
					'privacy_id'			=>		8,
					'c_id'					=>		0,
					'post_from'				=>		'Dealer',
					'post_track_id'			=>		$trackID,			
			);
			$postID2 = $this->insertRecord('tbl_post', $data2);
			if($postID2)
			{
					//Inserting into post access group
					$aData2 = array(
						'company_group'		=>		$toCompanyID,
						'post_id'			=>		$postID2
					);
				   $aID2 = $this->insertRecord('tbl_access_group', $aData2);
			}
			
			//Third autopost to send the dealer networks
			if($dealerNetworkCompaniesIDs!="")
			{
				//Inserting into post table
				$data3 = array(
						'title'					=>		$postTitle3,
						'description'			=>		$postDesc3,
						'is_company_news'		=>		1,		
						'post_type'				=>		0,		
						'user_id'				=>		1,		
						'status'				=>		1,		
						'created_date'			=>		date('Y-m-d H:i:s'),		
						'privacy_id'			=>		8,
						'c_id'					=>		0			
				);
				$postID3 = $this->insertRecord('tbl_post', $data3);
				if($postID3)
				{
						//Inserting into post access group
						$aData3 = array(
							'company_group'		=>		$dealerNetworkCompaniesIDs,
							'post_id'			=>		$postID3
						);
					   $aID3 = $this->insertRecord('tbl_access_group', $aData3);
				}
			}
			
			
		}
		else{
			return false;	
		}
		
	}
	
	public function postOnNewsFeed($watermark,$title, $description, $image, $url, $user_id, $privacy_id, $groups,$post_share_type,$post_from="None",$post_track_id=0,$replace=false)
	{
 			$ret = false;
 			$noImage = base_url().'assets/dashboard/img/no-img-one.jpg';
			$imgCount = count($image);
		    $minusImgs = $imgCount - 4;
		    $plusImgs = ($imgCount > 4) ? '<span class="more">+'.$minusImgs.'</span>' : '';
		    $imagesName = ($watermark == 1) ? "uploads/wm_det_" : "uploads/det_";

 			if($post_from == "Listing") {
	
 				if($image == $noImage)
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="" href="'.$url.'">
									<img src="'.base_url().'assets/dashboard/img/no-img-one.jpg" alt="">
								</a>';
				}

				else if($imgCount == 1 || $imgCount == 2)
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="" href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[0]['imgUrl'])) ? base_url().$imagesName.$image[0]['imgUrl'] : $noImage).'" alt="">
								</a>';
				}
				else if($imgCount == 3)
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="pad-btm"
								href="'.$url.'">
								<img src="'.((file_exists('./'.$imagesName.$image[0]['imgUrl'])) ? base_url().$imagesName.$image[0]['imgUrl'] : $noImage).'" alt="">
								</a>
								<a title="'.htmlentities($title).'" class="thum-dive pad-rght"
									href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[1]['imgUrl'])) ? base_url().$imagesName.$image[1]['imgUrl'] : $noImage).'" alt="">
								</a>
								<a title="'.htmlentities($title).'" class="thum-dive pad-lft"
									href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[2]['imgUrl'])) ? base_url().$imagesName.$image[2]['imgUrl'] : $noImage).'" alt="">
								</a>';
				}
				else if($imgCount > 3) 
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="pad-btm"
								href="'.$url.'">
								<img src="'.((file_exists('./'.$imagesName.$image[0]['imgUrl'])) ? base_url().$imagesName.$image[0]['imgUrl'] : $noImage).'" alt="">
								</a>
								<a title="'.htmlentities($title).'" class="thum-dive-th"
									href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[1]['imgUrl'])) ? base_url().$imagesName.$image[1]['imgUrl'] : $noImage).'" alt="">
								</a>
								<a title="'.htmlentities($title).'" class="thum-dive-cen"
									href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[2]['imgUrl'])) ? base_url().$imagesName.$image[2]['imgUrl'] : $noImage).'" alt="">
								</a>
								<a title="'.htmlentities($title).'" class="thum-dive-cen"
									href="'.$url.'">
									<img src="'.((file_exists('./'.$imagesName.$image[3]['imgUrl'])) ? base_url().$imagesName.$image[3]['imgUrl'] : $noImage).'" alt="">
									'.$plusImgs.'
								</a>';
				}
			}
			else if($post_from == "Auction") 
			{

 				if($image == $noImage)
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="" href="'.$url.'">
									<img src="'.base_url().'assets/dashboard/img/no-img-one.jpg" alt="">
								</a>';
				}

				else
				{
					$imageTag = '<a title="'.htmlentities($title).'" class="" href="'.$url.'">
									<img src="'.$image[0]['imgUrl'].'" alt="">
								</a>';
				}
			}
			else
			{
				$imageTag = '<a title="'.htmlentities($title).'" class="" href="'.$url.'">
								<img src="'.$image.'" alt="">
							</a>';
			}
			

			$postDesc = '<div class="panel-body panel-body panel-body0 p-l-0 p-r-0"><a href="'.$url.'"><h5 class="fs-14 font-semibold m-b-0 block">'.$title.'</h5></a>'.(($image!="") ? 
			 '<div class="row m-l-0 m-r-0"><div class="db-listing-img">
				'.$imageTag.'</div></div>' : '').'
				'.(($description != "") ? '<p>'.getShortDesc($description,200).' <a href="'.$url.'" class="post-rm">Read more</a></p>' : '').'
				<div class="clearfix"></div></div>';



			if($replace === false)
			{	
				$data = array(
					'title'					=>		$title,
					'description'			=>		$postDesc,
					'is_company_news'		=>		($privacy_id == "1") ? "2" : "1", //1 = No,  2 = Yes
					'post_type'				=>		0,
					'user_id'				=>		$user_id,
					'status'				=>		1,
					'created_date'			=>		date('Y-m-d H:i:s'),
					'privacy_id'			=>		$privacy_id,
					'c_id'					=>		$this->getCompanyIDbyUserID($user_id),
					'post_hash'				=>		time().rand(1,9999999999999999),
					'post_share_type'		=>		$post_share_type,
					'post_from'				=>		$post_from,
					'post_track_id'			=>		$post_track_id,
				);
				$post_id = $this->insertRecord('tbl_post',$data);
				if($post_id)
				{
					$ret = true;
					//Privacy - Network Groups || Dealer Groups
					if(($privacy_id == "8" || $privacy_id == "9") && $groups!="")
					{
						$ang = explode(",",$groups);
						if(!empty($ang))
						{	
							$groupData = array();
							foreach($ang as $a)
							{
								$groupData[] = array(
								 'group_id'			=>	$a,
								 'post_id'			=>	$post_id,
								 'type'				=>	($privacy_id == "8") ? "Network" : "Dealer"
							  );
								
							}
							if(!empty($groupData))
							{
							  $this->db->insert_batch('tbl_post_groups', $groupData);
							}
						}
					}
				}
			}else if($replace === true && $post_track_id!=""){
					$data = array(
						'title'					=>		$title,
						'description'			=>		$postDesc,
						'post_type'				=>		0,
					);
					$ret = $this->dashboard_common->updateRecord('tbl_post', $data, array('post_from' => $post_from, 'post_track_id' => $post_track_id,'user_id' => $user_id));
				
			}
		return $ret;
	}
	
	public function resharePost($postData, $user_id, $privacy_id, $groups,$post_share_type)
	{
			$ret = false;
			if(!empty($postData))
			{	
				if($postData['parent_id'] == "" || $postData['parent_id'] == 0)
				{
					$postData['parent_id'] = $postData['id'];
				}
				unset($postData['id']);
				$postData['post_hash']			=		time().rand(1,9999999999999999);
				$postData['user_id']			=		$user_id;
				$postData['c_id']				=		$this->getCompanyIDbyUserID($user_id);
				$postData['privacy_id']			=		$privacy_id;
				$postData['created_date']		=		date('Y-m-d H:i:s');
				$postData['post_share_type']	=		$post_share_type;
				$postData['status']				=		1;
				$postData['is_company_news']	=		($privacy_id == "1") ? "2" : "1"; //1 = No,  2 = Yes
				$post_id = $this->insertRecord('tbl_post',$postData);
				if($post_id)
				{
					$ret = true;
					//Privacy - Network Groups || Dealer Groups
					if(($privacy_id == "8" || $privacy_id == "9") && $groups!="")
					{
						$ang = explode(",",$groups);
						if(!empty($ang))
						{	
							$groupData = array();
							foreach($ang as $a)
							{
								$groupData[] = array(
								 'group_id'			=>	$a,
								 'post_id'			=>	$post_id,
								 'type'				=>	($privacy_id == "8") ? "Network" : "Dealer"
							  );
								
							}
							if(!empty($groupData))
							{
							  $this->db->insert_batch('tbl_post_groups', $groupData);
							}
						}
					}
				}
			}
		return $ret;
	}
	
	
	public function getCompanyIDsByGroupIDs($user_id=0,$ngids="")
	{
		$comapnyIDs = "";
		if($ngids!="")
		{
			//getting company ids by group ids
			$gcids = $this->runQuery("SELECT GROUP_CONCAT(ng.networks) cids FROM tbl_network_group ng WHERE ng.id IN(".$this->db->escape_str($ngids).")",1);
			if(isset($gcids['cids']) && $gcids['cids'] != "")
			{
				//Checking if both companies are connected
				$company_id = $this->getCompanyIDbyUserID($user_id);
				$query = "SELECT GROUP_CONCAT(network_company) cids FROM `tbl_my_network` n WHERE my_company = ".$this->db->escape_str($company_id)." AND network_company IN(".$gcids['cids'].") AND n.status = 2";
				$cids = $this->runQuery($query,1);
				if(isset($cids['cids']) && $cids['cids'] != "")
				{
					$comapnyIDs = $cids['cids'];
				}
			}
		}
		return $comapnyIDs;
			
	}

	public function insertPageViews($track_id, $type, $user_id=0){
        if($track_id != '' && $type != ''){
        	$saveData = [
	        		'track_id'    => $track_id,
				    'type'        => $type,
				    'user_id'     => $user_id,
				    'date'        => date('Y-m-d H:i:s'),
				    'ip_address'  => $_SERVER['REMOTE_ADDR'],
				    'user_agent'  => $this->input->user_agent()
			    ];
        	$this->db->insert('tbl_page_views', $saveData);
        }
	}
	
	public function clearUserSession($redirect=true)
	{
		$user_id = $this->session->userdata('user_id');
		$this->setHistoryForLogout($user_id);
		$this->load->model('dashboard/dashboard_model');
		$this->dashboard_model->online_status(0,true);
        //$this->session->sess_destroy();
		$userSessionKeys = array(
			'user_id',
			'company_id',
			'package_id',
			'is_operator',
			'is_lineAdmin',
			'last_page'
		);
		$this->session->unset_userdata($userSessionKeys);
		delete_cookie('krank_web');
		delete_cookie('krank_login_history');
		delete_cookie('mobile_popup');
		delete_cookie('pro_cmp_popup');
		if($redirect)
		{
        	redirect(base_url('login'));
		}
	}
	public function checkUserStatus($user_id)
	{
		$where = array(
			'u.id'		=>		$user_id,
			'c.status'	=>		1,
			'u.status'	=>		1
		);
		
		return $this->db->from('tbl_user u')->join('tbl_company c', 'c.id = u.company_id', 'inner')->where($where)->count_all_results();
	}
	
	public function checkUserForLogout($user_id)
	{
		$this->load->library('encryption');
		$history_id = $this->encryption->decrypt(get_cookie('krank_login_history'));
		if($history_id != "")
		{
			$where = array(
				'history_id'					=>		$history_id,
				'history_user_id'				=>		$user_id,
				'history_force_logout'			=>		'Yes',
			);
			return $this->db->from('tbl_user_login_history')->where($where)->count_all_results();
		}
		
		
	}
	public function setHistoryForLogout($user_id)
	{
		$this->load->library('encryption');
		$history_id = $this->encryption->decrypt(get_cookie('krank_login_history'));
		if($history_id != "")
		{
			$where = array(
				'history_id'					=>		$history_id,
				'history_user_id'				=>		$user_id,
			);
			
			$this->updateRecord('tbl_user_login_history', array('history_force_logout'=>'Yes'), $where);
		}
		
		
	}
	
	public function checkCookie()
	{
		$user_id = $this->session->userdata('user_id');
		if($user_id!="" && ($this->checkUserStatus($user_id) == 0 || $this->checkUserForLogout($user_id) > 0))
		{
			$this->clearUserSession(false);
		}
		else if(get_cookie('krank_web')!=""&&$user_id=="")
		{
			$this->load->library('encryption');
			$user_id = $this->encryption->decrypt(get_cookie('krank_web'));				
			$where = array(
				'u.id' 			=> $user_id,
				'u.status'		=>	1,
				'c.status'		=>	1
			  );
			$userData = $this->db->select('u.id, u.company_id, c.package_id,u.type,u.is_line_admin,u.password,c.status as companyStatus, u.status userStatus')->from('tbl_user u')->join('tbl_company c','c.id = u.company_id')->where($where)->get()->row_array();
			if(!empty($userData))
			{	
				 $this->session->set_userdata('user_id',$userData['id']);
				 $this->session->set_userdata('company_id',$userData['company_id']);
				 $this->session->set_userdata('package_id',$userData['package_id']);
				 $this->session->set_userdata('is_operator',$userData['type']);
				 $this->session->set_userdata('is_lineAdmin',$userData['is_line_admin']);
				 $this->load->model('dashboard/dashboard_model');
				 $this->dashboard_model->online_status(1,true);
			}
		}
	}

	public function insertReportSpam($user_id, $report_type, $track_id, $track_type, $report_comments=''){
        if($user_id != '' && $track_id != '' && $report_type != ''){
        	$saveData = [
        			'user_id'         => $user_id,
        			'report_type'     => $report_type,
	        		'track_id'        => $track_id,
				    'track_type'      => $track_type,
				    'report_comments' => $report_comments,
				    'created_date'    => date('Y-m-d H:i:s')
			    ];
        	$query = $this->db->insert('tbl_report_spam', $saveData);
        	if($query){
        		return true;
        	}else{
        		return false;
        	}
        }
	}
	
	public function receiverDevice($reciverId){
        $this->db->select("token.token_id, device.id, device.device_id AS device_name, device.device_token, device.device_type");
        $this->db->join("tbl_device_token device", "token.token_id=device.device_token_id", "inner");
		if(is_array($reciverId))
		{
        	$this->db->where_in("token.user_id" , $reciverId);
		}else{
			$this->db->where("token.user_id" , $reciverId);
		}
		$this->db->where("token.access_token !=", 'Logout');
		$this->db->group_by('device.device_token');
		$this->db->order_by("device.device_type ASC");
        $deviceData = $this->db->get("tbl_auth_token token")->result_array();
        return $deviceData;
    }
	
	public function getUserDataForPush($id=0)
	{
		$data = array();
		$cols = "u.id, u.first_name, u.profile_pic user_pic, u.company_id, c.company_name, c.profile_pic company_pic, c.company_name";
		$where = array(
			'u.id' => $id,
		);
		$data = $this->db->select($cols)->from('tbl_user u')->join('tbl_company c', 'u.company_id = c.id', 'inner')->where($where)->get()->row_array();	
		if(!empty($data))
		{
			$data['user_pic'] = ($data['user_pic']!="" && file_exists('./uploads/images/'.$data['user_pic'])) ? base_url('uploads/images/'.$data['user_pic']) : base_url('uploads/images/target-avatar.jpg');
			$data['company_pic'] = ($data['company_pic']!="" && file_exists('./uploads/images/'.$data['company_pic'])) ? base_url('uploads/images/'.$data['company_pic']) : base_url('uploads/images/company-icon-120.jpg');	
		}
		
		return $data;	
	}

	public function getMyNetworkUsers($privacy_id=1,$type='All')
    {
    	$user_id        = $this->session->userdata('user_id');
    	$company_id = $this->getCompanyIDbyUserID($user_id);
        
    	if($privacy_id==6 || $privacy_id==1 || $privacy_id==7)
    	{
    		if($privacy_id==6)
    		{
    			$companySql = $company_id;
    		}
    		else
    		{
    			$companySql = "SELECT cm.id FROM `tbl_company` AS cm INNER JOIN tbl_my_network mn ON mn.network_company=cm.id WHERE (((mn.my_company=".$company_id." AND mn.network_company !=".$company_id.") OR (mn.my_company=".$company_id." AND mn.network_company=".$company_id.")) AND mn.status=2)";
    		}

        	$sql = "SELECT IFNULL(GROUP_CONCAT(u.id),'') userIds FROM tbl_user u INNER JOIN tbl_personalize_notification pn ON pn.user_id = u.id WHERE (FIND_IN_SET('".$type."',personalized) > 0 OR FIND_IN_SET('All',personalized) > 0) AND pn.sender_id = ".$user_id." AND u.id != ".$user_id." AND company_id IN ($companySql) AND u.status = 1 ORDER BY u.id ASC";
    	} elseif($privacy_id==5)
    	{
    		$sql = "SELECT GROUP_CONCAT(IF(mc.my_connection='$user_id',mc.network_connection,mc.my_connection)) userIds FROM `tbl_my_connection` mc INNER JOIN tbl_personalize_notification pn ON pn.user_id = mc.network_connection WHERE (FIND_IN_SET('".$type."',personalized) > 0 OR FIND_IN_SET('All',personalized) > 0) AND pn.sender_id = ".$user_id." AND my_connection = '$user_id' AND STATUS = 2";

    	} elseif($privacy_id==55)
    	{
    		$sql = "SELECT GROUP_CONCAT(IF(mc.my_connection='$user_id',mc.network_connection,mc.my_connection)) userIds FROM `tbl_my_connection` mc INNER JOIN tbl_personalize_notification pn ON pn.user_id = mc.network_connection WHERE my_connection = '$user_id' AND pn.sender_id = ".$user_id." AND STATUS = 2 AND con_type = 'Private' ";
    	}  
    	if(!empty($sql))
    	{
    		$row = $this->runQuery($sql,1); 

	    	return $row;
    	}
    	else
    	{
    		return 0;
    	}
        
  }
	
	public function sendPush($type, $from_user_id, $to_user_id, $track_id=0, $track_type = "None", $cKey="",$pushText="",$joined="",$device_type='all',$thumbnail='',$admin=0,$listing_type='')
	{
		$fromData = $this->getUserDataForPush($from_user_id);
		
		/*$deviceData = $this->dashboard_common->receiverDevice($to_user_id);
		
		$deviceList = array();
		if(!empty($deviceData))
		{
			foreach($deviceData as $key=>$val){
				$deviceList[] = $val["device_token"];
			}
		}*/
		//$deviceList = array_unique($deviceList);

		$trackAssets = array(
			'Listing'		=>		array(
				'table'		=>	'tbl_listing',
				'pKey'		=>	'id',
				'title'		=>	'listing_name',
				'slug'		=>	'slug',
				'uri'		=>	'listing',
			),
			'Article'		=>		array(
				'table'		=>	'tbl_articles',
				'pKey'		=>	'article_id',
				'title'		=>	'article_name',
				'slug'		=>	'article_slug',
				'uri'		=>	'article',
			),
			'Auction'		=>		array(
				'table'		=>	'tbl_auction',
				'pKey'		=>	'id',
				'title'		=>	'auction_title',
				'slug'		=>	'auction_slug',
				'uri'		=>	AUCTION_URI,
			),
			'Group'		=>		array(
				'table'		=>	'tbl_group_chat',
				'pKey'		=>	'group_id',
				'title'		=>	'group_name',
				'slug'		=>	'',
				'uri'		=>	'',
			),
			
			
		);  
		$iosType = "";
		$assetName = "";
		$thumbnailImage = "";
		
		if($track_id != 0 && $track_type != "None" && $track_type!="" && array_key_exists($track_type, $trackAssets))
		{
			if($track_type == "Group")
			{
				$gData = $this->runQuery("SELECT group_name FROM `tbl_group_chat_members` m INNER JOIN tbl_group_chat g ON g.group_id = m.member_group_id WHERE member_id = ".$track_id,1);
			  $assetName = (!empty($gData)) ? $gData['group_name'] : '';
			}else{
				$assetName = $this->dashboard_common->getSingleField($trackAssets[$track_type]['title'], $trackAssets[$track_type]['table'], array($trackAssets[$track_type]['pKey'] => $track_id));

			}
			if(strtolower($track_type) == 'listing')
			{
				$krankShareImgUrl = "";
				$krankShareImgUrl = $this->getListingImgLink($track_id);
				if($krankShareImgUrl != '0')
				{
					$thumbnailImage = ((file_exists('./uploads/li_'.$krankShareImgUrl[0]['imgUrl']) && !empty($krankShareImgUrl[0]['imgUrl'])) ? base_url().'uploads/li_'.$krankShareImgUrl[0]['imgUrl'] : '');
				}

				$iosType = $listing_type;

			}
			elseif(strtolower($track_type) == 'auction')
			{
				$krankShareImgUrl = "";
				$krankShareImgUrl = $this->getAuctionMainImageshare($track_id);
				if(!empty($krankShareImgUrl))
				{
					$thumbnailImage = $krankShareImgUrl[0]['imgUrl'];
				}
				$iosType = 'Auction';
				
			}
			elseif(strtolower($track_type) == 'article')
			{
				$iosType = 'Article';
			}

		}
		
		$typesArray		=		array(
			'network_request'			=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$fromData['id'],
					'message'	=>		'has sent you a network request'.(($assetName!="") ? ' via '.strtolower($track_type).' '.$assetName : '').'.',
					'type'		=>		'network_request',
					'thumbnail' =>      $fromData['company_pic'],
					'track_type' =>     ''
			),
			'connection_request'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$fromData['id'],
					'message'	=>		'has sent you a connection request'.(($assetName!="") ? ' via '.strtolower($track_type).' '.$assetName : '').'.',
					'type'		=>		'connection_request',
					'thumbnail' =>      $fromData['user_pic'],
					'track_type' =>     ''
			),
			'dealer'			=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$fromData['id'],
					'message'	=>		'has sent you a dealer request'.(($assetName!="") ? ' via '.strtolower($track_type).' '.$assetName : '').'.',
					'type'	=>		'dealer',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'tag'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has tagged you in a '.$track_type.'.',
					'type'		=>		'tag',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'post_like'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has liked your post.',
					'type'		=>		'post_like',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'post_comment'			=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has commented on your post.',
					'type'		=>		'post_like',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'comment_reply_like'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has liked your reply.',
					'type'		=>		'comment_reply_like',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'comments_child'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has replied to a comment.',
					'type'		=>		'comments_child',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'comment_like'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has liked your reply.',
					'type'		=>		'comment_like',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_removed'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'removed you from a '.$assetName.'.',
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_removed_notify'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has been removed from a '.$assetName.'.',
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_exit'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has exit from a '.$assetName.'.',
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_add'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has added you in a '.$assetName.'.',
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_joined'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		'has joined a '.$assetName.'.',
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'group_chat_msg'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'].' has messaged you on a group.',
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		$pushText,
					'type'		=>		'group_chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'chat'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'].' has messaged you.',
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		$pushText,
					'type'		=>		'chat',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'new_user'		=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$fromData['id'],
					'message'	=>		$joined,
					'type'		=>		'new_user',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			'listing'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		(($admin == 1) ? 'You might be interested in ' : '').$pushText,
					'type'		=>		'listing',
					'thumbnail' =>      $thumbnailImage,
					'track_type' =>     ($admin == 1) ? $listing_type : ''
			),
			'article'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		(($admin == 1) ? 'You might be interested in ' : '').$pushText,
					'type'		=>		'article',
					'thumbnail' =>      $thumbnail,
					'track_type' =>     ($admin == 1) ? 'Article' : ''
			),
			'auction'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		(($admin == 1) ? 'You might be interested in ' : '').$pushText,
					'type'		=>		'auction',
					'thumbnail' =>      $thumbnailImage,
					'track_type' =>     ($admin == 1) ? 'Auction' : ''
			),
			'activity'						=>		array(
					'title'		=>		$fromData['first_name'].' @ '.$fromData['company_name'],
					'img'		=>		$fromData['user_pic'],
					'link_id'	=>		$track_id,
					'message'	=>		$pushText,
					'type'		=>		'activity',
					'thumbnail' =>      '',
					'track_type' =>     ''
			),
			
		
		);
		
		if(!empty($fromData) && array_key_exists($type, $typesArray) === true)
		{
			//$deviceType = $deviceData[0]['device_type'];
			
			//$badgeCount = $this->getTotalUserNotificaiton($to_user_id);
			
			if(SERVER_TYPE == "local" || SERVER_TYPE == "dev" || SERVER_TYPE == "uat" || SERVER_TYPE == "live")
			{
				$notificationTypes = array(
					"network_request"				=>			1,
					"connection_request"			=>			2,
					"dealer"						=>			3,
					"group_msg"						=>			4,
					"listing"						=>			5,
					"tag"							=>			6,
					"comments"						=>			7,
					"post_like"						=>			8,
					"comments_child"				=>			9,
					"comment_like"					=>			10,
					"comment_reply_like"			=>			11,
					"chat" 							=> 			12,
					"group_chat" 					=> 			13,
					"new_user" 					    => 			14,
					"article" 					    => 			15,
					"auction" 					    => 			16,
					"activity" 					    => 			17
				);

				$payload = array(
					'notification'	=> 
						array(
								'title'		=>	(string) (($admin == 1) ? (string) $iosType : (string) $typesArray[$type]['title']),
								'body'		=>	(string) (($admin == 1) ? (string) $typesArray[$type]['message'] ."\n Posted by ". (string) $typesArray[$type]['title'] : (string) $typesArray[$type]['message']),
								//'badge'		=>	(string) $badgeCount,
								"sound" 	=> 	(string) "default"
						),
				  
				  'data'			=>
				  		array(
				  			    'title'		=>	(string) $typesArray[$type]['title'],
								'body'		=>	(string) $typesArray[$type]['message'],
								'nt' 		=> 	(string) ((array_key_exists($typesArray[$type]['type'], $notificationTypes)) ?  $notificationTypes[$typesArray[$type]["type"]] : ""),
								'id' 		=>	(string) $typesArray[$type]['link_id'],
								'img'		=>	(string) $typesArray[$type]['img'],
								'thumbnail' =>  (string) $typesArray[$type]['thumbnail'],
								'track_type' =>  (string) $typesArray[$type]['track_type'],
								'is_admin' =>  (string) $admin,
								//'description' =>  (string) $typesArray[$type]['description'],
								//'badge'		=>	(string) $badgeCount
				  		),
				);
				
				$options = array(
				  		'priority'			=> 	"high",
				  		'mutableContent' => true
				);
				if($cKey!="")
				{
					$options['collapseKey'] = (string) $cKey;
				}
				
				$pushData = array(
					'payload'		=>		$payload,
					'options'		=>		$options,
					'user_ids'		=>		$to_user_id,
					'deviceType'	=> $device_type				
				);
				
				$this->load->library('Socketio');
				$client = $this->socketio->getClient(SOCKET_ADMIN_TOKEN);
				if(is_object($client))
				{
					$client->of('/misc');
					$client->emit('push-notification', $pushData);
					$client->close();	
				}
				
			}else{
				$notificationData = array(
					'title'					=>			$typesArray[$type]['title'],
					'message'				=>			$typesArray[$type]['message'],
					'img'					=>			$typesArray[$type]['img'],
					"notification_type"		=>			$typesArray[$type]['type'],
					"link_id"				=>			$typesArray[$type]['link_id'],
					
				);
				if($cKey!="")
				{
					$notificationData['collapse_key'] = $cKey;
				}
				send_fcm_notification($notificationData, $deviceList);
			}
		}
		
	}
	
	public function getTotalUserNotificaiton($user_id="")
	{
		$totalNotifications = 0;
		if($user_id!="")
		{
			$this->load->model('notification/notification_model');
			$this->load->model('msg/msg_model');
		 	$getNotification 			= $this->notification_model->getRequestCount($user_id);
			$totalUnreadNotification 	= (int) (!empty($getNotification) && isset($getNotification[0]['nc']) && $getNotification[0]['nc'] != "") ? $getNotification[0]['nc'] : 0;
			$totalUnreadMessages 		= (int) $this->msg_model->countUnreadMsgs($user_id);
			$totalNotifications 		=  $totalUnreadNotification + $totalUnreadMessages;
			
		}
		return $totalNotifications;
	}
	
	public function setUserMeta($user_id,$name,$value)
	{
		$ret = false;
		$table = 'tbl_user_meta';
		if($user_id != "" && $name != "" && $value != "")
		{
			$data = $where = array('user_id' => $user_id, 'name' =>	$name);
			$data['value']	=	$value; 
			if($this->countRecords($table,$where) > 0)
			{
				$ret = $this->updateRecord($table, $data, $where);
			}else{
				$data['created_date'] = date('Y-m-d H:i:s');
				$ret = $this->insertRecord($table, $data);
			}
		}
		return $ret;
	}
	
	public function getUserMeta($user_id, $name)
	{
		$ret = "";
		$table = 'tbl_user_meta';
		if($user_id != "" && $name != "")
		{
			$where = array('user_id' => $user_id, 'name' =>	$name);
			$ret = $this->getSingleField('value', $table, $where);
		}
		return $ret;
	}

	public function user_default_image($string,$user_id)
	{
		$filePath = './uploads/images/krank_avatar_'.$user_id.'.png';
		if($string!="")
		{


			$krAssets          = './assets/krank_avatar/';
			$robotoBoldItalic  = $krAssets."Cousine-Bold.ttf";

			$image    =  imagecreate(150, 150); 
			
			$bgColors = array(
			'0' => array(
				'r' => 109,
				'g' => 181,
				'b' => 169
			),
			'1' => array(
				'r' => 97,
				'g' => 163,
				'b' => 170
			),
			'2' => array(
				'r' => 107,
				'g' => 163,
				'b' => 101
			),
			'3' => array(
				'r' => 90,
				'g' => 111,
				'b' => 150
			),
			'4' => array(
				'r' => 195,
				'g' => 110,
				'b' => 110
			),
			'5' => array(
				'r' => 137,
				'g' => 81,
				'b' => 81
			),
			'6' => array(
				'r' => 157,
				'g' => 139,
				'b' => 90
			),
			'7' => array(
				'r' => 131,
				'g' => 150,
				'b' => 94
			),
			'8' => array(
				'r' => 93,
				'g' => 149,
				'b' => 130
			),
			'9' => array(
				'r' => 102,
				'g' => 91,
				'b' => 149
			),
			'10' => array(
				'r' => 190,
				'g' => 138,
				'b' => 139
			),
			'11' => array(
				'r' => 154,
				'g' => 186,
				'b' => 192
			),
			'12' => array(
				'r' => 149,
				'g' => 184,
				'b' => 214
			),
			'13' => array(
				'r' => 24,
				'g' => 52,
				'b' => 80
			),
			'14' => array(
				'r' => 0,
				'g' => 128,
				'b' => 125
			),
			'15' => array(
				'r' => 128,
				'g' => 214,
				'b' => 251
			),
			'16' => array(
				'r' => 97,
				'g' => 140,
				'b' => 236
			),
			'17' => array(
				'r' => 252,
				'g' => 99,
				'b' => 118
			),
			'18' => array(
				'r' => 255,
				'g' => 158,
				'b' => 100
			),
			'19' => array(
				'r' => 226,
				'g' => 109,
				'b' => 147
			),
			'20' => array(
				'r' => 103,
				'g' => 103,
				'b' => 235
			),
			'21' => array(
				'r' => 111,
				'g' => 204,
				'b' => 219
			),
			'22' => array(
				'r' => 239,
				'g' => 188,
				'b' => 80
			),
			'23' => array(
				'r' => 147,
				'g' => 163,
				'b' => 172
			),
			'24' => array(
				'r' => 144,
				'g' => 120,
				'b' => 200
			),
			'25' => array(
				'r' => 242,
				'g' => 144,
				'b' => 107
			),
			'26' => array(
				'r' => 159,
				'g' => 136,
				'b' => 126
			),
			'27' => array(
				'r' => 182,
				'g' => 207,
				'b' => 142
			)
			

		);

			$bg = rand(0,9);
			//$alpha = strtoupper("abcdefghijklmnopqrstuvwxyz");
			//$string = $alpha[rand(0,25)].$alpha[rand(0,25)];
			$background_color  =  imagecolorallocate($image, $bgColors[$bg]['r'], $bgColors[$bg]['g'], $bgColors[$bg]['b']); 
			$text_color        =  imagecolorallocate($image, 255, 255, 255); 
			imagettftext($image, 50, 0, 35, 95, $text_color, $robotoBoldItalic, strtoupper($string));
			imagepng($image,$filePath); 
			imagedestroy($image);
		}		
	}
	
	public function sendOnlineStatusToNode($user_id, $online_status)
	{
		if($user_id!="" && (int) $online_status >= 0 && (int) $online_status <=3)
		{ 
			$this->load->library('Socketio');
			$client = $this->socketio->getClient(SOCKET_ADMIN_TOKEN);
			if(is_object($client))
			{
				$onlineData = array(
					'u'		=>		$user_id,
					's'		=>		$online_status
				);
				$client->of('/misc');
				$client->emit('user-online-status', $onlineData);
				$client->close();	
			}
		}
	}

	public function myNetworkPrivacy($company_id)
  {
    $query = "SELECT GROUP_CONCAT(mn.network_company) network_company FROM tbl_my_network mn WHERE mn.my_company = ".$this->db->escape_str($company_id)." AND mn.status = 2";
    
    $data = $this->dashboard_common->runQuery($query,1);
    if (!empty($data['network_company'])){
        return $data['network_company'];
    }else{
        return false;
    }
  }

  public function myConnectionPrivacy($user_id)
  {
    $query = "SELECT GROUP_CONCAT(mc.network_connection) network_connection FROM tbl_my_connection mc WHERE mc.my_connection = ".$this->db->escape_str($user_id)." AND mc.status = 2";
    
    $data = $this->dashboard_common->runQuery($query,1);
    if (!empty($data['network_connection'])){
        return $data['network_connection'];
    }else{
        return false;
    }
  }

  public function myPrivateConnectionPrivacy($user_id)
  {
    $query = "SELECT GROUP_CONCAT(mc.my_connection) my_connection FROM tbl_my_connection mc WHERE mc.network_connection = ".$this->db->escape_str($user_id)." AND mc.status = 2 AND mc.con_type = 'Private'";
    
    $data = $this->dashboard_common->runQuery($query,1);
    if (!empty($data['my_connection'])){
        return $data['my_connection'];
    }else{
        return false;
    }
  }


 /**
  * Add entry in tbl_user_persona table.
  *
  * Adding user activity to user persona table, to create the user persona by analiysing its activity
  *
  * @param int $user_id application user id
  * @param enum $persona_type ('Company Profile','User Profile','Auction','Listing','Article','Post') 
  * @param int $track_id user visited module primary id
  * @author Tahir Iqbal <ti@krank.com>
  * @return void
  */
	public function addUserPersona($user_id,$persona_type,$track_id,$initial=0)
	{
		if(empty($user_id) || empty($persona_type) || empty($track_id))
			return false;
			
		$data = ['user_id'=>$user_id, 'persona_type'=>$persona_type,'company_id'=>$this->getCompanyIDbyUserID($user_id), 'track_id'=>$track_id];
		
		if($initial==1)
		{
			$data['total_visits'] = 0;
		}


		$persona = $this->getSingleRecord('tbl_user_persona',$data);	
		
		if( !$persona )
		{
			$data['created_date'] = date("Y-m-d H:i:s");
			$this->insertRecord('tbl_user_persona', $data);	
		}
		else
		{
            if((time() - 120) > strtotime($persona['modified_date'])) 
            {

				$update['total_visits'] = $persona['total_visits'] +1;

				if($initial==1)
				{
					$update['total_visits'] = 0;
				}

				$update['modified_date'] = date("Y-m-d H:i:s");
				$this->updateRecord('tbl_user_persona',$update ,$data);		
			}	
		}
		
	}


 /**
  * Add entry in tbl_user_search_history table.
  *
  * Adding user search keyword in tbl_user_search_history table, to create the user search history
  *
  * @param int $user_id application user id
  * @param enum $search_type ('All','Sale Listing','Rent Listing','Article','Auction','People','Network') 
  * @param string $keywords user search keywords
  * @author Tahir Iqbal <ti@krank.com>
  * @return void
  */
	public function addUserSearchHistory($user_id,$search_type,$keywords)
	{
		if(empty($user_id) || empty($search_type) || empty($keywords))
			return false;
			
		$data = ['user_id'=>$user_id, 'search_type'=>$search_type, 'keywords'=>$keywords];

		$search = $this->getSingleRecord('tbl_user_search_history',$data);	
		
		if( !$search )
		{
			$data['created_date'] = date("Y-m-d H:i:s");
			$this->insertRecord('tbl_user_search_history', $data);	
		}
		
	}

	public function getListingImgLink($id)
	{
		$sql="select IFNULL(name,0) AS imgUrl from tbl_listing_image where listing_id = ".$this->db->escape_str($id)." AND  SUBSTRING_INDEX(tbl_listing_image.name,'.',-1) IN  ('jpg','jpeg','png')";
		 $query = $this->db->query($sql);


	    if($query->num_rows() > 0)
	    {
	      $row  = $query->result_array();

	        return  $row;
	    }
	    else
	    {
	      return 0;
	    }

	}


	public function getAuctionMainImageshare($auction_id)
	{
		$query = "SELECT 
		al.id,
		(SELECT 
		NAME 
		FROM
		tbl_listing_image 
		WHERE listing_id = al.listing_id 
		AND SUBSTRING_INDEX(tbl_listing_image.name, '.', - 1) IN ('jpg', 'jpeg', 'png') 
		LIMIT 1
		
		) AS imgUrl, (SELECT watermark FROM tbl_listing l WHERE l.id = al.listing_id) watermark
		FROM
		tbl_auction_listing AS al 
		WHERE auction_id  = ".$this->db->escape_str($auction_id);
		$imgData = $this->dashboard_common->runQuery($query);

	    foreach ($imgData as $key => $val) {

	      if(empty($imgData))
	      {
	        $imageData[$key]['imgUrl'] = $this->imagethumb->image('./assets/dashboard/img/no-img-one.jpg',667,405);
	      }
	      else if($val['watermark'] == "Yes" && $val['imgUrl']!="" && $val['imgUrl']!= "no-img.jpg" && file_exists('./uploads/wm_det_'.$val['imgUrl']))
	      {
	        $imageData[$key]['imgUrl'] = base_url('uploads/wm_det_'.$val['imgUrl'].'?time='.uniqid());
	      }else if(isset($val['imgUrl']) && $val['imgUrl']!= "" && file_exists('./uploads/det_'.$val['imgUrl']))
	      {
	        $imageData[$key]['imgUrl'] = base_url('uploads/det_'.$val['imgUrl']);
	      }else{
	        $imageData[$key]['imgUrl'] = $this->imagethumb->image('./assets/dashboard/img/no-img-one.jpg',667,405);
	      }

	    }

		return $imageData;
		
		
	}
	
}

?>