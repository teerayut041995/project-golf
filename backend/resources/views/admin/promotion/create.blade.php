@extends('layouts.master')

@section('title')
เพิ่มข้อมูลโปรโมชัน
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มข้อมูลโปรโมชัน
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/promotions')}}">โปรโมชัน</a></li>
        <li class="active">เพิ่มข้อมูลโปรโมชัน</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

    	<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กรอกข้อมูลโปรโมชัน</h3>
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
            <form method="post" action="{{url('admin/promotions')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                  <label >ชื่อโปรโมชัน</label>
                  <input type="text" class="form-control" name="pro_name" placeholder="ชื่อกิจกรรม" required>
                </div>
                <div class="form-group">
                  <label >ราคาโปรโมชัน</label>
                  <input type="text" class="form-control" name="pro_price" placeholder="ราคาโปรโมชัน" required>
                </div>
                <div class="form-group">
                  <label>รายละเอียด</label>
                  <textarea id="editor1" name="pro_detail" rows="10" cols="80" placeholder="รายละเอียด"></textarea>
                </div>
                <div class="form-group">
                  <label >วันที่เริ่มโปรโมชัน</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="pro_start_date" autocomplete="off" placeholder="วันที่เริ่มกิจกรรม" required>
                  </div>
                </div>
                <div class="form-group">
                  <label >วันที่สิ้นสุดโปรโมชัน</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="pro_end_date" autocomplete="off" placeholder="วันที่สิ้นสุดกิจกรรม" required>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label >รูปภาพโปรโมชัน</label>
                  <input type="file" name="pro_image" class="form-control" accept="image/*">
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
    });

     CKEDITOR.replace('editor1')
  });
</script>
@endsection