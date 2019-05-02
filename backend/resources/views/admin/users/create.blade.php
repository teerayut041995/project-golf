@extends('layouts.master')

@section('title')
เพิ่มข้อมูลธนาคาร
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มข้อมูลธนาคาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/banks')}}">ข้อมูลธนาคาร</a></li>
        <li class="active">เพิ่มข้อมูลธนาคาร</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

    	<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กรอกข้อมูลธนาคาร</h3>
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
            <form method="post" action="{{url('admin/banks')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                  <label >ชื่อธนาคาร</label>
                  <input type="text" class="form-control" name="bank_name" placeholder="ธนาคาร">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">สาขา</label>
                  <input type="text" class="form-control" name="bank_branch" placeholder="สาขา">
                </div>
                <div class="form-group">
                  <label >ชื่อบัญชี</label>
                  <input type="text" class="form-control" name="account_name" placeholder="ชื่อบัญชี">
                </div>
                <div class="form-group">
                  <label >หมายเลขบัญชี</label>
                  <input type="text" class="form-control" name="account_number" placeholder="หมายเลขบัญชี">
                </div>

                <div class="form-group">
                  <label >พร้อมเพย์ QR CODE</label>
                  <input type="file" name="promptpay_qr" class="form-control" accept="image/*">
                  <p class="help-block">สามารถเว้นว่างได้</p>
                </div>
                <div class="form-group">
                  <label >หมายเลขพร้อมเพย์</label>
                  <input type="text" class="form-control" name="promptpay_number" placeholder="หมายเลขพร้อมเพย์">
                </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
