@extends('layouts.master')

@section('title')
รายละเอียดการสั่งซื้อโปรโมชัน
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        รายละเอียดการสั่งซื้อโปรโมชัน
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/orders/promotions')}}">รายการสั่งซื้อโปรโมชัน</a></li>
        <li class="active">{{$order->promotion->pro_name}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
       <div class="row">
         <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">ข้อมูลการสั่งซื้อ</h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-3"><strong>ชื่อโปรโมชั่น</strong></div>
                <div class="col-md-9">{{$order->promotion->pro_name}}</div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>ระยะเวลาโปรโมชัน</strong></div>
                <div class="col-md-9">
                  {{createDateThai($order->start_date)}} - {{createDateThai($order->end_date)}} ({{checkDuration($order->start_date, $order->end_date)}})
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>ราคา</strong></div>
                <div class="col-md-9">
                  {{$order->amount}}
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>สั่งซื้อโดย</strong></div>
                <div class="col-md-9">
                  {{$order->user->name}}
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>วันที่สั่งซื้อ</strong></div>
                <div class="col-md-9">
                  {{createDateThai($order->created_at)}}
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>วันที่มาใช้บริการ</strong></div>
                <div class="col-md-9">
                  {{createDateThai($order->service_date)}}
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>สถานะการสั่งซื้อ</strong></div>
                <div class="col-md-9">
                  {{checkOrderStatus($order->order_status)}}
                </div>
              </div>
              <p></p>
              <div class="row">
                <div class="col-md-3"><strong>รายละเอียดเพิ่มเติ่ม</strong></div>
                <div class="col-md-9">
                  {{$order->message}}
                </div>
              </div>

            </div>
            <!-- /.box-body -->
         </div>

       </div>

       <div class="col-md-6">
           <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">ข้อมูลการแจ้งชำระเงิน</h3>
              </div>
              <div class="box-body">
                @if($order->bank_id != '')
                  @if (session('status'))
                    <div class="alert alert-info">
                      {{ session('status') }}
                    </div>
                  @endif
                  <div class="row">
                    <div class="col-md-3"><strong>โอนมายังธนาคาร</strong></div>
                    <div class="col-md-9">{{$order->bank->bank_name}}</div>
                  </div>
                  <p></p>
                  <div class="row">
                    <div class="col-md-3"><strong>วันที่ชำระเงิน</strong></div>
                    <div class="col-md-9">{{createDateThai($order->payment_date)}}</div>
                  </div>
                  <p></p>
                  <div class="row">
                    <div class="col-md-3"><strong>เวลา</strong></div>
                    <div class="col-md-9">{{$order->payment_time}}</div>
                  </div>
                  <p></p>
                  <div class="row">
                    <div class="col-md-3"><strong>จำนวนเงิน</strong></div>
                    <div class="col-md-9">{{$order->payment_amount}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><strong>หลักฐานการชำระเงิน</strong></div>
                    <div class="col-md-8">
                      <img src="{{url('images/promotion-payment', $order->payment_image)}}" style="width: 100%;">
                    </div>
                  </div>
                  <form method="POST" action="{{url('/admin/orders/promotions' , $order->id)}}">
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label>สถานะการตรวจสอบข้อมูลการชำระเงิน</label>
                        <br>
                        <input type="radio" name="order_status" value="confirm"> ข้อมูลถูกต้อง ยืนยันการชำระเงิน<br>
                        <input type="radio" name="order_status" value="not_confirm"> ข้อมูลไม่ถูกต้อง ปฏิเสธการชำระเงิน<br>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">รายละเอียดเพิ่มเติม</label>
                        <input type="text" class="form-control" name="message" placeholder="รายละเอียดเพิ่มเติม">
                      </div>
                      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                  </form>
                @else
                  ยังไม่มีข้อมูลการชำระเงิน
                @endif
              </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
