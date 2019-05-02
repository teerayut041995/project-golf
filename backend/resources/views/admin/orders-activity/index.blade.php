@extends('layouts.master')

@section('title')
รายการสั่งซื้อกิจกรรม
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลกิจกรรม
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/promotions')}}">กิจกรรม</a></li>
        <li class="active">ข้อมูลกิจกรรมทั้งหมด</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">ข้อมูลกิจกรรมทั้งหมด</h3>
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
                              <th style="width: 15%;">สมาชิกที่ซื้อกิจกรรม</th>
                              <th>ราคา</th>
                              <th style="width: 15%;">ระยะเวลากิจกรรม</th>
                              <th style="width: 15%;">สถานะ</th>
                              <th style="width: 10%;">จัดการข้อมูล</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                              <td>{{$order->activity->act_name}}</td>
                              <td>
                                <a href="{{url('admin/users' , $order->user->id)}}">{{$order->user->name}}
                                </a>
                              </td>
                              <td>{{number_format($order->amount)}}</td>
                              <td>
                                {{createDateThai($order->start_date)}} - 
                                {{createDateThai($order->end_date)}}
                                <?php

                              $now = Carbon\Carbon::now();
                              if ($now < $order->start_date) {
                                ?>
                                <span class="pull-center-container">
                                  <small class="label pull-center bg-green">ยังไม่เริ่มกิจกรรม</small>
                                </span>
                                <?php
                              } else if ($now > $order->end_date) {
                                ?>
                                <span class="pull-center-container">
                                  <small class="label pull-center bg-red">หมดเวลากิจกรรมแล้ว</small>
                                </span>
                                <?php
                              } else {
                                $start_date = Carbon\Carbon::parse($order->start_date);
                                $end_date = Carbon\Carbon::parse($order->end_date);
                                if($now->between($start_date,$end_date)){
                                ?>
                                <span class="pull-center-container">
                                  <small class="label pull-center bg-blue">อยู่ในช่วงกิจกรรม</small>
                                </span>
                                <?php
                                }
                              }    
                              ?>
                              </td>
                              <td>
                              @if($order->order_status == 'new')
                                ยังไม่แจ้งชำระเงิน
                              @elseif($order->order_status == 'playment')
                                แจ้งชำระเงินแล้ว
                              @elseif($order->order_status == 'confirm')
                                ยืนยันการชำระเงินแล้ว
                              @elseif($order->order_status == 'not_confirm')
                                ข้อมูลการชำระเงินไม่ถูกต้อง
                              @else
                                ยกเลิกการสั่งซื้อ
                              @endif
                              </td>
                              <td>
                                  <a href="{{url('/admin/orders/activities' , $order->id)}}" class="btn btn-info btn-xs btn-block">ตรวจสอบข้อมูล</a>
                                  
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