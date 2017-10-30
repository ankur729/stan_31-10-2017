<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use App\Hostel;
use App\Country;
use App\RoomSharing;
use App\State;
use App\City;
use App\Complaint;
use App\RequestType;
use App\RRequest;
use App\CommunicateCategory;
use App\CommunicateSubCategory;
use App\Communicate;
use App\CommunicateReply;

use App\Http\Controllers\Controller;

class ProfileController extends Controller{
    
    public function index($id=''){
		
        $studentid = $id;
		$session_value = session('student_id');
		$complaintObj = new Complaint;
		
		 		
		if($session_value!=''){
			
		try{
        $students=Student::findOrFail($session_value);
        $roomtype=RoomSharing::findOrFail($students['s_room']);
        $hostel=Hostel::findOrFail($students['s_hostel']);
		//$totalcomplaint = $complaintObj->complaintCountById($session_value);
		$complaintdata = $complaintObj->complaintRecord($session_value);
		
        }
         catch(\Illuminate\Database\QueryException $ex){
            \Session::flash('message','Query Exception Occurred. Call Developer!');
			return \Redirect::back();
         }		
		 
		 return view('pages.front.my-account',compact('students','complaintdata','h'));
			
		}else{
			return view('layouts.master.front.index');			
		}
		
    }
	
/* public function studentcomplaint($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!=''){			
			return view('pages.front.student-complaint');
		}else{
			return view('layouts.master.front.index');			
		}
		
} */

public function foodmenu($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!=''){			
			return view('pages.front.food-menu');
		}else{
			return view('layouts.master.front.index');			
		}
		
}

public function invoice($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!=''){			
			return view('pages.front.invoice');
		}else{
			return view('layouts.master.front.index');			
		}
		
}

public function studentprofile($id=''){
	
	    $studentid = $id;
		$session_value = session('student_id');		

		$student_data='';
		try{			
			// $student_data=Student::findOrFail($session_value);
			// $countries=Country::all();
   //          $roomtype=RoomSharing::findOrFail($student_data['s_room']);
   //          $hostel=Hostel::findOrFail($student_data['s_hostel']);	
            $student_data_pre = \DB::table('students')
            
            ->join('countries', 'students.s_nationality', '=', 'countries.id')
            ->join('cities', 'students.s_city', '=', 'cities.id')
          	 ->join('states', 'students.s_state', '=', 'states.id')
            ->select('students.*', 'countries.name as countryname','cities.name as cityname',
            	'states.name as statename')
            ->get();	
       
         
            foreach ($student_data_pre as $value) {

            	echo $value->id;
            	if($value->id==$session_value){
            		echo 'found';
            		$student_data=$value;
            		
            	}
            	
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            \Session::flash('message','Query Exception Occurred. Call Developer!');
			return \Redirect::back();
        }		
		
		if($session_value!=''){		
		
			return view('pages.front.student-profile',compact('student_data','countries'));
		}else{
			return view('layouts.master.front.index');			
		}		
		
}
 
public function voxpopuli($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		$communicate_categories=CommunicateCategory::all();
		$communicate_subcategories=CommunicateSubCategory::all();
		$communicates=Communicate::all();
		$commuincate_replies=CommunicateReply::where('student_id',$session_value)->get();

	//	$ff=Communicate::find(4)->replies()->get();
    $fetch_communicates=Communicate::where('student_id',$session_value)->get();

	$fetch_communicates= \DB::table('communicates')
    ->join('communicate_categories', 'communicates.m_cat','=','communicate_categories.id')
    ->join('communicate_sub_categories', 'communicates.m_sub_cat','=','communicate_sub_categories.id')
    ->select('communicates.*','communicate_categories.name as category_name','communicate_categories.id as category_id','communicate_sub_categories.name as sub_category_name','communicate_sub_categories.id as sub_category_id')
    ->where('communicates.student_id','=',$session_value)
    ->get();

    	 $arr=[];
    	foreach($fetch_communicates as $key=>$communicate)
    	{
    		 
    		$rpl=Communicate::find($communicate->id)->replies()->get();
    		$arr[$key]=$communicate;
    		$arr[$key]->replies= $rpl;
    	}

    	$communicates_replies=$arr;
       
		
		//dd($ff);
		//print_r($commuincate_replies);
		//	return $communicates_replies;

		if($session_value!=''){	

			return view('pages.front.vox-populi',compact('communicate_categories','communicates_replies'));

		}else{

			return view('layouts.master.front.index');	

		}
		
}
  

  public function voxpopuliSearch(Request $request){

  		//return $request->all();


		$session_value = session('student_id');
		
		$communicate_categories=CommunicateCategory::all();
		$communicate_subcategories=CommunicateSubCategory::all();
		$communicates=Communicate::all();
		$commuincate_replies=CommunicateReply::where('student_id',$session_value)->get();

	//	$ff=Communicate::find(4)->replies()->get();
    $fetch_communicates=Communicate::where('student_id',$session_value)->get();


				if($request->search_cat !='' && $request->search_sub_cat !=''){

			$query= \DB::table('communicates')
		    ->join('communicate_categories', 'communicates.m_cat','=','communicate_categories.id')
		    ->join('communicate_sub_categories', 'communicates.m_sub_cat','=','communicate_sub_categories.id')
		    ->select('communicates.*','communicate_categories.name as category_name','communicate_categories.id as category_id','communicate_sub_categories.name as sub_category_name','communicate_sub_categories.id as sub_category_id')
		     ->where('communicates.student_id','=',$session_value)
		    ->where('communicates.m_cat','=',$request->search_cat)
		    ->where('communicates.m_sub_cat','=',$request->search_sub_cat)
		    ->get();

		   // return $query;
		     $arr=[];
    	foreach($query as $key=>$communicate)
    	{
    		 
    		$rpl=Communicate::find($communicate->id)->replies()->get();

     
    		$arr[$key]=$communicate;
    		$arr[$key]->replies= $rpl;
    	}
    		 
		    $communicates_replies=$arr;
		}

		else{

						$communicate_categories=CommunicateCategory::all();
		$communicate_subcategories=CommunicateSubCategory::all();
		$communicates=Communicate::all();
		$commuincate_replies=CommunicateReply::where('student_id',$session_value)->get();

	//	$ff=Communicate::find(4)->replies()->get();
    $fetch_communicates=Communicate::where('student_id',$session_value)->get();

	$fetch_communicates= \DB::table('communicates')
    ->join('communicate_categories', 'communicates.m_cat','=','communicate_categories.id')
    ->join('communicate_sub_categories', 'communicates.m_sub_cat','=','communicate_sub_categories.id')
    ->select('communicates.*','communicate_categories.name as category_name','communicate_categories.id as category_id','communicate_sub_categories.name as sub_category_name','communicate_sub_categories.id as sub_category_id')
    ->where('communicates.student_id','=',$session_value)
    ->get();

    	 $arr=[];
    	foreach($fetch_communicates as $key=>$communicate)
    	{
    		 
    		$rpl=Communicate::find($communicate->id)->replies()->get();
    		$arr[$key]=$communicate;
    		$arr[$key]->replies= $rpl;
    	}

    	$communicates_replies=$arr;
       
		
		//dd($ff);
		//print_r($commuincate_replies);
		//	return $communicates_replies;

		if($session_value!=''){	

			 return redirect('/vox-populi');

		}else{

			return view('layouts.master.front.index');	

		}


		}
		   
	// 	//dd($ff);
	// 	//print_r($commuincate_replies);
	// 	//	return $communicates_replies;

		if($session_value!=''){	

			 
			return view('pages.front.vox-populi',compact('communicate_categories','communicates_replies'));

		}else{

			return view('layouts.master.front.index');	

		}





  }
public function latenightout($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		$requesttypes=RequestType::all();
		$myrequests= \DB::table('r_requests')
            ->join('request_types', 'r_requests.r_cat', '=', 'request_types.id')
          
            ->select('r_requests.r_date','r_requests.status', 'request_types.r_type_name')
            ->get();
	//	$myrequests=RRequest::where('r_student',$session_value)->select('r_date')->get();
			
			// return $myrequests;

		if($session_value!=''){			
			return view('pages.front.late-night-out',compact('requesttypes','myrequests'));
		}else{
			return view('layouts.master.front.index');			
		}
		
}

public function latenightoutSave(Request $request){

	//return $request->all();
	$r_request=new RRequest;

	$r_request->r_student=session('student_id');
	$r_request->r_cat=$request->category;
	$r_request->r_type=$request->urgency_type;
	$r_request->r_date=$request->request_date;
	$r_request->r_time=$request->request_time;
	$r_request->r_l_date=$request->request_leaving_date;
	$r_request->r_l_time=$request->request_leaving_time;
	$r_request->r_r_date=$request->request_return_date;
	$r_request->r_r_time=$request->request_return_date;
	$r_request->status=0;

	$r_request->save();

	  \Session::flash('message','Your Complaint Successfully Recieved. We Will Reach You Shortly.!');

	   return \Redirect::back();

} 

public function stanzasocial($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!=''){			
			return view('pages.front.stanza-social');
		}else{
			return view('layouts.master.front.index');			
		}
		
} 

public function stanzaboard($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!='')
		{			
			return view('pages.front.stanza-board');
		}
		else
		{
			return view('layouts.master.front.index');			
		}

	} 

public function download($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		if($session_value!=''){			
			return view('pages.front.download');
		}else{
			return view('layouts.master.front.index');			
		}
		
} 

public function studentprofileupdate($id=''){
       
		$studentid = $id;
		$session_value = session('student_id');
		
		
		$complaintObj = new Complaint;
		
		$studentid = $id;
		$session_value = session('student_id');
		
		
		try{
			
			$student_data=Student::findOrFail($session_value);
			$countries=Country::all();
			$states=State::where('country_id',$student_data->s_country)->get();
            $cities=City::where('state_id',$student_data->s_state)->get();
            $roomtype=RoomSharing::findOrFail($student_data['s_room']);
            $hostel=Hostel::findOrFail($student_data['s_hostel']);			
        }
        catch(\Illuminate\Database\QueryException $ex){
            \Session::flash('message','Query Exception Occurred. Call Developer!');
			return \Redirect::back();
        }
		
		
		
		
		if($session_value!=''){		
		
			return view('pages.front.student-profile-update',compact('student_data','countries','states','cities'));
		}else{
			return view('layouts.master.front.index');			
		}	
		
		
		
} 





public function updateprofile(Request $request){
	
	
	$session_value = session('student_id');

	// $this->validate($request, [  's_firstname' => 'required' ,
    //                               's_lastname'=>'required',									  
    //                               's_parentname'=>'required',
	// 								  's_email'=>'required',
	// 								  's_contact'=>'required',
	// 								  's_dob'=>'required',
	// 								  's_gender'=>'required',
	// 								  's_marital_status'=>'required',									  
	// 								  's_college'=>'required',
	// 								  's_course'=>'required',
	// 								  's_year'=>'required',
	// 								  's_country'=>'required',
	// 								  's_bloodgroup'=>'required',
	// 								  's_joindate'=>'required',									  
	// 								  's_address'=>'required',
	// 								  's_city'=>'required',
	// 								  's_state'=>'required',
	// 								  's_pincode'=>'required',
	// 								  's_street'=>'required',
	// 								  's_landmark'=>'required'									  
    //                                      ]);
									  
									  
									  if($request->student_idproof=='' && $request->s_idproof==''){
										$this->validate($request, [  's_idproof'     =>'required|image|mimes:jpeg,png,jpg'   
										  ]); 
									  }


				$imgidproofname='';
				if($request->file('s_idproof')){
				$file = $request->file('s_idproof');
				$imgidproofname = time().$file->getClientOriginalName();			     			
				$destinationPath = public_path().'/images/student/' ;
				$file->move($destinationPath,$imgidproofname);
				}else{
				  $imgidproofname=$request->student_idproof;	
				}

		
      
				try{
						
						
					/* $studentupd= Student::where([
					['id', '=',$session_value]						
					])									
					*/						
					Student::where('id', $session_value)
					->update([
						's_firstname' =>$request->s_firstname,
						's_lastname'=>$request->s_lastname,
						's_parentname'=>$request->s_parentname,
						's_email'=>$request->s_email,
						's_contact'=>$request->s_contact,
						's_dob'=>$request->s_dob,
						's_gender'=>$request->s_gender,
						's_marital_status'=>$request->s_marital_status,
						's_idproof'=>$imgidproofname,
						's_college'=>$request->s_college,
						's_course'=>$request->s_course,
						's_year'=>$request->s_year,
						's_country'=>$request->s_country,
						's_bloodgroup'=>$request->s_bloodgroup,
						's_joindate'=>$request->s_joindate,
						's_address'=>$request->s_address,
						's_city'=>$request->s_city,
						's_state'=>$request->s_state,
						's_pincode'=>$request->s_pincode,
						's_street'=>$request->s_street,
						's_landmark'=>$request->s_landmark,
						's_regno'=>$request->s_regno,
						's_medicalhistory'=>$request->s_medicalhistory,
						's_emrg_name'=>$request->s_emrg_name,
						's_emrg_email'=>$request->s_emrg_email,
						's_emrg_phone'=>$request->s_emrg_phone,
						's_emrg_address'=>$request->s_emrg_address,
						's_status'=>'1'
						]);
						
					}
					catch(\Illuminate\Database\QueryException $ex){
					\Session::flash('message','Query Exception Occurred. Call Developer!');
					return \Redirect::back();
					}
					
				\Session::flash('message','Profile Successfully Updated !');
                return \Redirect('student-profile-update');
             
				
				
				
	
	/*
	$complaint = new Complaint;
	$session_value = session('student_id');
	
		 $this->validate($request, [ 'complaint_subject' => 'required' ,
									'complaint_category' => 'required' ,
									'complaint_subcategory' => 'required' ,
									'complaint_time' => 'required' ,
									's_idproof'     =>'required|image|mimes:jpeg,png,jpg',
									'complaint_address' => 'required',
								]); 
										   
		
		$imgname='';
         
          if($request->file('s_idproof')){

            $file = $request->file('s_idproof');
            $imgname = time().$file->getClientOriginalName();			     			
            $destinationPath = public_path().'/images/complaint/' ;
            $file->move($destinationPath,$imgname);
        }

		
										   
		$complaint->student_id=$session_value;
		$complaint->c_problem=$request->complaint_subject;
        $complaint->c_category=$request->complaint_category;
		$complaint->c_subcategory=$request->complaint_subcategory;
		$complaint->c_time=$request->complaint_time;
		$complaint->c_image=$imgname;
		$complaint->c_address=$request->complaint_address;
		$complaint->c_status='Pending';
		
		
										   
        
		try{
		$complaint->save();
		}
		 catch(\Illuminate\Database\QueryException $ex){
            \Session::flash('message','Query Exception Occurred. Call Developer!');
			return \Redirect::back();
        }
		
        \Session::flash('message','Successfully Added !');
         return \Redirect('student-complaint');					

		 
		 
		 
		 $results = User::where(function($q) use ($request) {
    $q->orWhere('email', 'like', '%john@example.org%');
    $q->orWhere('first_name', 'like', '%John%');
    $q->orWhere('last_name', 'like', '%Doe%');
})->get();

$results = User::where(function($q) use ($request) {
    $q->orWhere('email', 'like', '%john@example.org%');
    $q->orWhere('first_name', 'like', '%John%');
    $q->orWhere('last_name', 'like', '%Doe%');
})->toSql();
dd($results)
	 */

   }

public function findstates(Request $request, $id=null){ 
            $states=State::where('country_id',$_GET['c_id'])->get();
            $states=$states->toArray();
            foreach ($states as $value) {              
                echo "<option value=".$value['id'].">".$value['name']."</option>";
            }            
    }

public function findcities(Request $request){   
            $cities=City::where('state_id',$_GET['s_id'])->get();
            $cities=$cities->toArray();
            foreach ($cities as $value) {
                echo "<option value=".$value['id'].">".$value['name']."</option>";
            }           
    }
   
}
