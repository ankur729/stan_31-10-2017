



@extends('layouts.master.admin.index')


@section('content')
<?php $str=Helper::urlmaker('@$#@ankur gupta%%')?>
           <?php echo $str?>
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
              <h3 class="box-title" style="margin-bottom: 48px;">Edit Information Page   </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

           <div class="col-md-12">
            <div class="form-group">
         <a href="{{url('admin/information/list')}}" class="btn btn-back " style="margin-top: 0px;float: right;">Back</a>
            </div>
          </div>
			
       

{!! Form::model($info,['url' => 'admin/information/udpate','method' => 'put']) !!}



{!! Form::hidden('info_id', $info->id) !!}
              <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('title', 'Page Title ') !!}
	

    {!!     Form::text('title', null,  ['class' => 'form-control', 'placeholder' => 'Page Title']) !!}

				  <div class="form_error"></div>
                 </div>
               </div>
			   </div>

             <div class="box-body">
               <div class="col-xs-6">
                 <div class="form-group">
                  {!!Form::label('desc', 'Short Description') !!}
  

    {!!     Form::text('desc', null,  ['class' => 'form-control', 'placeholder' => 'Short Description']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

           <div class="box-body">
               <div class="col-md-12">
                 <div class="form-group">
                  {!!Form::label('content', 'Content') !!}
  
                   {!!     Form::textarea('content', null,  ['class' => 'form-control', 'placeholder' => 'Short Description','id'=>'editor1']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

         @if($info->id ==1)
              <div class="box-body">
               <div class="col-md-12">
                 <div class="form-group">
                  {!!Form::label('subcontent', 'Sub Content') !!}
  
                   {!!     Form::textarea('subcontent', null,  ['class' => 'form-control', 'placeholder' => 'Short Description','id'=>'editor1']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

         @endif
         <div class="box-body">
               <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('metatitle', 'Meta Tag Title') !!}
  

    {!!     Form::text('metatitle', null,  ['class' => 'form-control', 'placeholder' => 'Meta Tag Title']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>
           <div class="box-body">
               <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('metadesc', 'Meta Tag Description') !!}
  

    {!!     Form::text('metadesc', null,  ['class' => 'form-control', 'placeholder' => 'Meta Tag Description']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>

           <div class="box-body">
               <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('metakeywords', 'Meta Tag Keywords') !!}
  

    {!!     Form::text('metakeywords', null,  ['class' => 'form-control', 'placeholder' => 'Meta Tag Keywords']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>


           <div class="box-body">
               <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('seourl', 'Seo URL') !!}
  

    {!!     Form::text('seourl', null,  ['class' => 'form-control', 'placeholder' => 'Seo URL']) !!}

          <div class="form_error"></div>
                 </div>
               </div>
         </div>
              <!-- /.box-body -->
          <div class="box-footer">
              <div class="col-md-12">
                <!--<button type="clear" class="btn btn-default">Cancel</button>-->
              <a href="{{url('admin/information/list')}}" class="btn btn-back " style="margin-top: 0px;float: right;">Back</a>
                <button type="submit" class="btn btn-warning" style="margin-bottom:65px;">Update Page</button>
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
<style>
.child_checkbox_div{
	margin-left:20px;
}
.access-item-list{
	margin-left:50px;
}
</style>


  <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

  
<script>

CKEDITOR.replace( 'editor1' ); 

$(document).ready(function(){
        setTimeout(function() {
          $('#successMessage').fadeOut('slow');
           $('#errorMessage').fadeOut('slow');
        }, 5000); 
        // <-- time in milliseconds
      
    });



  


</script>

@endsection