



@extends('layouts.master.admin.index')


@section('content')
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @if (count($errors) > 0)
    <div class="alert alert-danger" id="errorMessage">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              <div class="flash-message">
 @if(Session::has('message'))
    <div class="alert-box success" id="successMessage">
      <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
    </div>
@endif
@if(Session::has('duplicate'))
    <div class="alert-box danger" id="successMessage">
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('duplicate') }}</p>
    </div>
@endif
  </div>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 50px;">Add New Facility   </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
       

{!! Form::open(['url' => 'admin/facility/save','method' => 'post','files'=>true]) !!}

{!! csrf_field() !!}


              <!--<div class="box-body">
                   <div class="col-md-12">
                   <div class="form-group">
                  
                  <img id="img_view" src=" {{ URL::to('images/blank_user.png')  }}" alt="your image"  style="width:100px;height:100px" /><br>
                  {!!Form::label('image', 'Add Facility Image ') !!}
                      {!!       Form::file('image',array('id' => 'imgInp')) !!}

                   <div class="form_error"></div>
                   </div>
                 </div>
              </div>-->


          

        
            <div class="box-body">
               <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('category', 'Select Facility') !!}
        
                    {!!  Form::select('category', $myarr, 'null', array('class' => 'form-control','placeholder' => 'Please select Category',)) !!}
                 </div>
                 </div>

              </div>


 <div class="col-xs-6">
             <div class="box-body">
              
                 <div class="form-group">
                  {!!Form::label('name', 'Service') !!}
  

    {!!     Form::text('name', null,  ['class' => 'form-control', 'placeholder' => 'Facility Name']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>


 

              <!-- /.box-body -->
          <div class="box-footer">
              <div class="col-md-12">
                <!--<button type="clear" class="btn btn-default">Cancel</button>-->
                 <a  href="{{url('admin/facility/list')}}" class="btn btn-back " style="margin-bottom:65px;margin-left:-15px;">Back</a>
                <button type="submit" class="btn btn-success" style="margin-bottom:65px;">Add New Facility</button>
              </div>
              </div>
         

            {!! Form::close() !!}

          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->




@endsection


@push('scripts')
<script> 
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_view').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});


$(document).ready(function(){
        setTimeout(function() {
          $('#successMessage').fadeOut('slow');
          $('#errorMessage').fadeOut('slow');
        }, 4000); // <-- time in milliseconds



       


    //      $.get("http://localhost/stanza/public/admin/test", function(data, status){
    //     alert("Data: " + data + "\nStatus: " + status);
    // });
});
    

</script>
@endpush