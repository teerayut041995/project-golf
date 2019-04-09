@extends('layouts.master')

@section('title')
แก้ไขข้อมูลโปรโมชัน 
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        แก้ไขข้อมูลโปรโมชัน
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/promotions')}}">โปรโมชัน</a></li>
        <li class="active">แก้ไขข้อมูลโปรโมชัน</li>
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
            <form method="post" action="{{url('admin/promotions' , $promotion->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                  <label >ชื่อโปรโมชัน</label>
                  <input type="text" class="form-control" name="pro_name" placeholder="ชื่อกิจกรรม" value="{{$promotion->pro_name}}" required>
                </div>
                <div class="form-group">
                  <label >ราคาโปรโมชัน</label>
                  <input type="text" class="form-control" name="pro_price" placeholder="ราคาโปรโมชัน" value="{{$promotion->pro_price}}" required>
                </div>
                <div class="form-group">
                  <label>รายละเอียด</label>
                  <textarea id="editor1" name="pro_detail" rows="10" cols="80" placeholder="รายละเอียด">{{$promotion->pro_detail}}</textarea>
                </div>
                <div class="form-group">
                  <label >วันที่เริ่มโปรโมชัน</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="pro_start_date" autocomplete="off" placeholder="วันที่เริ่มกิจกรรม" value="{{$promotion->pro_start_date}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label >วันที่สิ้นสุดโปรโมชัน</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" name="pro_end_date" autocomplete="off" value="{{$promotion->pro_end_date}}" placeholder="วันที่สิ้นสุดกิจกรรม" required>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label >อัพเดตรูปภาพโปรโมชัน</label>
                  <input type="file" name="pro_image" class="form-control" accept="image/*">
                  <input type="hidden" name="pro_image_old" class="form-control" value="{{$promotion->pro_image}}">
                  <p class="help-block"></p>
                </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                          @if($promotion->pro_image != '')
                            <img src="{{url('images/promotion' , $promotion->pro_image)}}" style="width: 100%;">
                          @else
                            <p>ยังไม่มีรูปภาพ</p>
                            <img src="{{url('images/default/no-image-promotion.png')}}" style="width: 100%;">
                          @endif
                      </div>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึกการเปลี่นแปลง</button>
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