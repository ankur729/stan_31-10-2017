<?php 
$body_class ="";
$meta_title ="Stanza Living : My Account";
$meta_keyword ="Stanza Living,Premium student";
$meta_description ="Premium student accommodation in India - move over PGs and hostels!";
//print_r($results);die;

//echo "Student Session ID==>".$value = session('student_id');
//dd(session()->all());
//print_r($results);die;

?>


@extends('layouts.master.front.index')

@section('styles')

@endsection

@section('content')



<div class="create-complaint-popup">
	<div class="design-box">
		<div class="complaint-box">
			<h4 class="title">New Complaint <span class="close"><img src="{{ URL::asset('front/images/icon/close.png')}}"></span></h4>
			<div class="coloum-div">
				<input type="text" name="" placeholder="problem subject" class="input-box">
			</div>
			<div class="coloum-div">
				<select class="select-option">
					<option>select your category</option>
					@foreach($communicate_categories as $category)
					<option>{{$category->named}}</option>

					@endforeach
				<!-- 	<option>Housekeeping</option>
					<option>Security</option>
					<option>Personnel</option>
					<option>Stanza Social</option>
					<option>Stanza Springboard</option>
					<option>Other Stanzens</option>
					<option>Others</option> -->
				</select>
			</div>
			<div class="coloum-div">
				<div class="col-md-70 border-right left">
					<select class="select-option">
						<option>urgency of complaint </option>
						<option>Emergency</option>
						<option>Regular </option>
					</select>
				</div>
				<div class="col-md-30 left padding-left-10px"><!-- 
					<input type="text" value="" id="demo-2" placeholder="date of problem" class="input-box"> -->
				</div>
			</div>
			<div class="coloum-div">
				<input type="file" name="" class="input-file">
			</div>
			<div class="coloum-div">
				<textarea class="textarea" placeholder="type your complaint details"></textarea>
			</div>
			<div class="coloum-div center"><input type="submit" name="" class="submit-btn"></div>
		</div>
	</div>
</div>



	<div class="container">
		<div class="work-body">
			
			<form method="post" action="{{url('admin/communicate/store')}}"  enctype="multipart/form-data">
			<!-- complaint box start here -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="complaint-box">
				<h4 class="title">Vox Populi</h4>
				<div class="coloum-div">
					<input type="text" name="m_topic" placeholder="Topic of discussion" class="input-box">
					<span class="instruction-msg">Upto 100 Characters is valid for the subject.</span>
				</div>
				<div class="coloum-div">
					<div class="col-md-50 left border-right">
						<select class="select-option" name="m_cat" id="communicate_category">
							<option>Select your category</option>
						@foreach($communicate_categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>

					@endforeach
						</select>
					</div>
					<div class="col-md-50 left padding-left-10px">
						<select class="select-option" name="m_sub_cat" id="communicate_subcategory">
							
						</select>
					</div>
				</div>
				<div class="coloum-div">
					<div class="left col-md-50 border-right">
						<!-- <div class="col-md-70 border-right left">
							<select class="select-option">
								<option>Urgency of complaint </option>
								<option>Emergency</option>
								<option>Regular </option>
							</select>
						</div> -->
						<div class="col-md-70 left padding-left-10px">
							<input type="text" value="" name="m_date" id="demo-2" placeholder="Date of problem" class="input-box">
						</div>
					</div>
					<div class="col-md-50 left padding-left-10px relative">
						<span class="info">Please upload your Id Proof</span>
						<input type="file" name="files" accept="image/*" class="input-file">
						<!-- <span class="vox-mandatory">*</span> -->
					</div>
				</div>


				<!-- custom html -->
				<div class="coloum-div">
					<div class="left col-md-50 border-right">

						<div class="col-md-70 left padding-left-10px">
							<input type="text" value="" name="m_person_name" id="demo-2" placeholder="Person Name" class="input-box">
						</div>
					</div>
					<div class="col-md-50 left padding-left-10px relative">
						<input type="Number "  name="m_contact"  class="contact-info" placeholder="Person Contact" >
					</div>
				</div>
				<!-- custom html -->

				<div class="coloum-div">
					<textarea class="textarea" name="m_desc" placeholder="We are listening ! Tell us more about the above topic which you want to discuss with us"></textarea>
					<button type="submit" name="" class="submit-btn">Submit</button>
				</div>
			</div>
			<!-- complaint box end here -->
			</form>

			<!-- complaint panel start here -->
			<div class="complaint-panel">
				<h4 class="section-name">Topics List</h4>	
				<ul class="problem-data">
					<li class="problem-list">
						<div class="toggle_probs"></div>
					</li>
				</ul>
			</div>
			<!-- complaint panel end here -->

		<form method="post" action="{{url('vox-populi/search')}}"  enctype="multipart/form-data">
			<!-- accordion section filter-->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="accordion-top">
  	<div class="col-md-20  filter  filter-space">Filter By</div>
  	<div class="col-md-30 left filter-space">
  	<select class="select-option" name="search_cat" id="communicate_category_search">
							<option>Select your category</option>
						@foreach($communicate_categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>

					@endforeach
						</select>
 
  	</div>
 
  	<div class="col-md-30 left">
  	
  	<select class="select-option" name="search_sub_cat" id="communicate_subcategory_search">
	

	</select>

	<button style="display: block;float: right;">Search</button>
  	<!-- 	<select class="select-option">
  			<option>Select Status</option>
  			<option>Successful</option>
  			<option>Not Successful</option>
  		</select> -->
  	</div>
</div>

</form>

 
<!--  accordian starts -->

@foreach($communicates_replies as $communicate)
			<div class="complaint-accordion">
					<div class="accordion-outer">
						<div class="col-md-30  border-right  toggle-bar">
							<div class="span-left">
								<i class="fa fa-star" aria-hidden="true"></i><span class="subject-text">{{$communicate->m_topic}}</span><span class="admin-reply">{{count($communicate->replies)}} admin Reply</span>
							</div>

						 	<div class="accordion-list">
						 	<ul>
						 		<li>For:</li>
						 		<li>{{$communicate->category_name}}<i class="fa fa-angle-right" aria-hidden="true"></i></li>
						 		<li>{{$communicate->sub_category_name}}</li>

						 	</ul>
						 </div>
						</div>
							<div class="col-md-55 complaint-text  border-right toggle-bar">
							<p>{{$communicate->m_desc}}</p>
							</div>
						<div class="col-md-20 dated-section  toggle-bar">
							<div class="right-status">
								<span class="">{{ Carbon\Carbon::parse($communicate->created_at)->format('d-m-Y')}}| {{ Carbon\Carbon::parse($communicate->created_at)->diffForHumans()}}</span>
							</div>
							<div class="right-info">
								<span class="status-img"><img src="{{ URL::asset('front/images/assets/residences/icon/successful.png')}}">
								Successful
								</span>
							</div>
						<!-- <ul>
							<li>27-7-2017</li>
							<li>11:30pm</li>
							<li><img src="{{ URL::asset('front/images/assets/residences/icon/successful.png')}}"><span>Successful</span></li>
						</ul> -->
						</div>
					</div>

						<div class="panel">
						  <p class="panel-content">{{$communicate->m_desc}}
						  </p>
						<!--   <div class="border-full"></div> -->

						@foreach($communicate->replies as $reply)
						  	<div class="panel-text  ">
							<div class="admin-reply-breadcrum">
								<ul>
								<li class="admin-reply">Admin reply</li>
								<li class="admin-reply-text">{{ Carbon\Carbon::parse($reply->created_at)->format('d-m-Y')}} | {{ Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}</li>								</ul>
							</div>
							<p class="border">{{$reply->msg}}</p>
						</div>
						
						@endforeach

						</div>

			</div>
<!-- accordion section ends here -->
	@endforeach


		</div>


	
		</div>
		<!-- right panel start here -->
	</div>

	
@endsection

@push('scripts')
	
<script type="text/javascript">


$(".accordion-outer").click(function(){
	$(this).next(".panel").slideToggle();
});

$(".close").click(function(){
	$(".create-complaint-popup").fadeOut();
});

function create_complaint(){

$(".create-complaint-popup").fadeIn();

}
	
$('#demo-2').fdatepicker();

	
$(".input-div .input-text").on('click keypress',function(){
	$(this).parent("label").addClass("active");
					
	$(this).blur(function(){
		var getitemval=$(this).val();						
			if(getitemval==''){
				$(this).parent("label").removeClass("active");
			}
	
	});
	
});

$('#communicate_category').change(function(){

	//alert($(this).val());
  var c_id=$(this).val();  
  $.ajax({
    type:'GET',
    cache: false,
    url:'getsubcategories',
    data:{c_id:c_id},     
    beforeSend:function(){   
    },
    success:function(data){	

    	//	alert(data);
    $('#communicate_subcategory').html(data);
    }
});
});


$('#communicate_category_search').change(function(){

	//alert($(this).val());
  var c_id=$(this).val();  
  $.ajax({
    type:'GET',
    cache: false,
    url:'getsubcategories',
    data:{c_id:c_id},     
    beforeSend:function(){   
    },
    success:function(data){	

    	//	alert(data);
    $('#communicate_subcategory_search').html(data);
    }
});
});


</script>
@endpush