@extends('layouts.master')

@section('title')
ข้อมูลโปรโมชัน
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลกิจกรรม
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/promotions')}}">โปรโมชัน</a></li>
        <li class="active">ข้อมูลโปรโมชันทั้งหมด</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">ข้อมูลโปรโมชันทั้งหมด</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (session('status'))
                                <div class="alert alert-info">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                          <table id="load-datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ชื่อโปรโมชัน</th>
                              <th>ราคา</th>
                              <th style="width: 15%;">วันที่เริ่มโปรโมชัน</th>
                              <th style="width: 15%;">วันที่สิ้นสุดโปรโมชัน</th>
                              <th style="width: 15%;">สถานะ</th>
                              <th style="width: 10%;">จัดการข้อมูล</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($promotions as $promotion)
                            <tr>
                              <td>{{$promotion->pro_name}}</td>
                              <td>{{number_format($promotion->pro_price)}}</td>
                              <td>{{createDateThai($promotion->pro_start_date)}}</td>
                              <td>{{createDateThai($promotion->pro_end_date)}}</td>
                              <td>
                              <?php

                              $now = Carbon\Carbon::now();
                              if ($now < $promotion->pro_start_date) {
                                ?>
                                <span class="pull-right-container">
                                  <small class="label pull-right bg-green">ยังไม่เริ่มโปรโมชัน</small>
                                </span>
                                <?php
                              } else if ($now > $promotion->pro_end_date) {
                                ?>
                                <span class="pull-right-container">
                                  <small class="label pull-right bg-red">หมดโปรโมชันแล้ว</small>
                                </span>
                                <?php
                              } else {
                                $start_date = Carbon\Carbon::parse($promotion->pro_start_date);
                                $end_date = Carbon\Carbon::parse($promotion->pro_end_date);
                                if($now->between($start_date,$end_date)){
                                ?>
                                <span class="pull-right-container">
                                  <small class="label pull-right bg-blue">อยู่ในช่วงโปรโมชั่น</small>
                                </span>
                                <?php
                                }
                              }    
                              ?>
                              
                              </td>
                              <td>
                                  <a href="{{url('/admin/promotions' , $promotion->id)}}" class="btn btn-info btn-xs btn-block">ดูรายละเอียด</a>
                                  <a href="{{url('/admin/promotions/'.$promotion->id.'/edit')}}" class="btn btn-success btn-xs btn-block">แก้ไข</a>
                                  <br>
                                    <form class="delete" action="{{ url('/admin/promotions', $promotion->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-xs btn-block">ลบ</button>
                                    </form>
                              </td>
                              
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                          </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#load-datatable').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        });

        $(document).on('submit' , '.delete' , function(event){
            if (!confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
               return false; 
            }
        });
    });
</script>
@endsection