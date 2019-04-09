@extends('layouts.master')

@section('title')
เพิ่มข้อมูลกิจกรรม
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มข้อมูลกิจกรรม
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/activities')}}">กิจกรรม</a></li>
        <li class="active">เพิ่มข้อมูลกิจกรรม</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

    	<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กรอกข้อมูลกิจกรรม</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form method="post" action="{{url('admin/activities')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                  <label >ชื่อกิจกรรม</label>
                  <input type="text" class="form-control" name="act_name" placeholder="ชื่อกิจกรรม">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">รายละเอียด</label>
                  <textarea type="text" class="form-control" name="act_detail" placeholder="รายละเอียด"></textarea>
                </div>
                <div class="form-group">
                  <label >วันที่เริ่มกิจกรรม</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="act_start_date" autocomplete="off" placeholder="วันที่เริ่มกิจกรรม">
                  </div>
                </div>
                <div class="form-group">
                  <label >วันที่สิ้นสุดกิจกรรม</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="act_end_date" autocomplete="off" placeholder="วันที่สิ้นสุดกิจกรรม">
                  </div>
                  
                </div>

                

                <div class="form-group">
                  <label >รูปภาพกิจกรรม</label>
                  <input type="file" name="act_image" class="form-control" accept="image/*">
                  <p class="help-block"></p>
                </div>
        
                </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    //Date picker
    $('.datepicker').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
    })
  });
</script>
@endsection