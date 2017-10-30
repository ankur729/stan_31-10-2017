
@extends('layouts.master.admin.index')

@section('styles')

@endsection

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
              <h3 class="box-title">Create New Invoice   </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
       

{!! Form::open(['url' => 'admin/payment/save','method' => 'post']) !!}

<!-- Login-Field -->




<div class="col-md-2">
  <div class="form-group" style="margin-top: 20px;">
    <button type="submit" class="btn btn-back " style="margin-top: 70px;float: right;">Back</button>
  </div>
</div>
</div>


<div class="Login-header with-border   after-border">
   <h3 class="login-details">Student Details</h3>
</div>





 <div class="box-body">
   <div class="col-xs-6 ">
    <div class="form-group">
       {!!Form::label('reg_no', 'Student Registration Number') !!}
  

    {!!     Form::text('std_reg_no', null,  ['class' => 'form-control reg', 'placeholder' => 'Registration Number']) !!}

      <div class="form_error"></div>
       </div>
      </div>
    </div>

     <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('std_name', 'Student Name') !!}
  

    {!!     Form::text('std_name', null,  ['class' => 'form-control std_name', 'placeholder' => 'Student Name', 'readonly'=>'readonly']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
    </div>



<!-- Login fields ends -->




<!-- Personal-Field -->

<div class="Login-header with-border  Personal-border">
   <h3 class="login-details">Personal Details</h3>
 </div>

<div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('inv_id', 'Invoice ID') !!} 

    {!!     Form::text('inv_id', null,  ['class' => 'form-control inv_id', 'placeholder' => 'Invoice ID']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('inv_date', 'Invoice Date') !!}
  

    {!!     Form::text('inv_date', null,  ['class' => 'form-control inv_date', 'placeholder' => 'YY-mm-dd']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         

    <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('due_date', 'Due Date') !!}
  

    {!!     Form::text('due_date', null,  ['class' => 'form-control due_date', 'placeholder' => 'YY-mm-dd']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

         <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('electricity', 'Total Electricity Charges') !!}
  

    {!!     Form::text('electricity', "0",  ['class' => 'form-control elec', 'placeholder' => 'Total Electricity Charges']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>


     <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('arrears', 'Arrears') !!}
  

    {!!     Form::text('arrears', "0",  ['class' => 'form-control arrears', 'placeholder' => 'Arrears']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

         <div class="box-body">
                       <div class="col-xs-6">
                         <div class="form-group">
                          {!!Form::label('room_rent', 'Room Rent') !!}
          

            {!!     Form::text('room_rent', "0",  ['class' => 'form-control room', 'placeholder' => 'Room Rent']) !!}

                  <div class="form_error"></div>
                         </div>
                       </div>
                 </div>

                 <div class="box-body">
                       <div class="col-xs-7">
                         <div class="form-group">
                          {!!Form::label('inv_amt', 'Invoice Amount') !!}
          

            {!!     Form::text('inv_amt', "0.00",  ['class' => 'form-control inv_amt', 'placeholder' => 'Invoice Amount','readonly'=>'readonly']) !!}

                  <div class="form_error"></div>
                         </div>
                       </div>
                 </div>
                
                   <div class="box-body">
                       <div class="col-xs-7">
                         <div class="form-group">
                          {!!Form::label('tax', 'Tax') !!}
          

            {!!     Form::select('tax', $myarr, null,  ['class' => 'form-control tax', 'placeholder' => '---Please Select Tax---']) !!}

                  <div class="form_error"></div>
                         </div>
                       </div>
                 </div>



              <div class="box-body">
               <div class="col-xs-7">
                 <div class="form-group">
                  {!!Form::label('amt_pay', 'Amount Payable') !!}
  

    {!!     Form::text('amt_pay', "0.00",  ['class' => 'form-control amt_pay', 'placeholder' => 'Amount Payable','readonly'=>'readonly']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>
         <div class="box-body">
                       <div class="col-xs-7">
                         <div class="form-group">
                          {!!Form::label('status', 'Status') !!}
          

            {!!     Form::select('status', array('0'=>'Not Paid', '1'=>'Paid'), null,  ['class' => 'form-control tax']) !!}

                  <div class="form_error"></div>
                         </div>
                       </div>
                 </div>

</div>
       
        <!-- /.box-body -->
          <div class="box-footer">
              <div class="col-md-12">
                <!--<button type="clear" class="btn btn-default">Cancel</button>-->
               <!--  <button type="submit" class="btn btn-back " style="margin-bottom:65px;">Back</button> -->
                <button type="submit" class="btn btn-success " style="margin-bottom:65px;">Create</button>
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
$(".inv_date").datepicker({
    
      dateFormat: "yy-mm-dd",
      
      numberOfMonths: 1,
      changeMonth: true,
        changeYear: true,
      
    });

 $('.inv_date').change(function(){
  if(! $(this).val().match('^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$') )
  {
    alert('Invalid Date Format');
    $(this).val(' ');
    $(this).focus();
  }
});

 $('.reg').change(function(){
var reg_no=$(this).val();
  $.ajax({
    type:'GET',
    cache: false,
    url:'studname',
    data:{reg_no:reg_no},
     
    beforeSend:function(){

    },
    success:function(data){
    $('.std_name').val(data);
 

    }

  });

 });


$('.elec').change(function(){
  var elec=$('.elec').val();
  var arr=$('.arrears').val();
  var room=$('.room').val();
  var sum=parseInt(elec)+parseInt(arr)+parseInt(room);
  $('.inv_amt').val(sum);

});
$('.arrears').change(function(){
  var elec=$('.elec').val();
  var arr=$('.arrears').val();
  var room=$('.room').val();
  var sum=parseInt(elec)+parseInt(arr)+parseInt(room);
 $('.inv_amt').val(sum);


});
$('.room').change(function(){
  var elec=$('.elec').val();
  var arr=$('.arrears').val();
  var room=$('.room').val();
  var sum=parseInt(elec)+parseInt(arr)+parseInt(room);
  $('.inv_amt').val(sum);


});
$('.tax').change(function(){
  var inv_amt=$('.inv_amt').val();
  var tax=$('.tax').val();
  var taxmultiplier=100+parseInt(tax);
  var payable=(parseInt(taxmultiplier)*parseInt(inv_amt))/100;
  $('.amt_pay').val(payable);


});

 $(".due_date").datepicker({
    
      dateFormat: "yy-mm-dd",
      
      numberOfMonths: 1,
      changeMonth: true,
        changeYear: true,
      
    });

 $('.due_date').change(function(){
  if(! $(this).val().match('^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$') )
  {
    alert('Invalid Date Format');
    $(this).val(' ');
    $(this).focus();
  }
});


</script>
  



@endpush


