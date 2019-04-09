@extends('layouts.master')

@section('title')
ข้อมูลโปรโมชัน
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$promotion->pro_name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/promotions')}}">โปรโมชัน</a></li>
        <li class="active">{{$promotion->pro_name}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
       <div class="row">
         <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-widget">
           
            <!-- /.box-header -->
            <div class="box-body">
              @if($promotion->pro_image != '')
                <img src="{{url('images/promotion' , $promotion->pro_image)}}" style="width: 100%;">
              @else
                <p>ยังไม่มีรูปภาพ</p>
                <img src="{{url('images/default/no-image-promotion.png')}}" style="width: 100%;">
              @endif

              <p></p>
              {!!$promotion->pro_detail!!}
              <p></p>
              <span class="pull-right text-muted">การดู - ครั้ง</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                
                <div class="comment-text">
                      <span class="username">
                        วันที่เริ่มโปรโมชัน
                      </span><!-- /.username -->
                  {{createDateThai($promotion->pro_start_date)}}
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <div class="comment-text">
                      <span class="username">
                        วันที่สิ้นสุดโปรโมชัน
                      </span><!-- /.username -->
                  {{createDateThai($promotion->pro_end_date)}}
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <!-- /.box-comment -->
              <div class="box-comment">
                <div class="comment-text">
                      <span class="username">
                        สถานะ
                      </span><!-- /.username -->
                            <?php

                              $now = Carbon\Carbon::now();
                              if ($now < $promotion->pro_start_date) {
                                ?>
                                <button class="btn btn-info">ยังไม่เริ่มโปรโมชัน</button>
                                <?php
                              } else if ($now > $promotion->pro_end_date) {
                                ?>
                                <button class="btn btn-danger">หมดโปรโมชันแล้ว</button>
                                <?php
                              } else {
                                $start_date = Carbon\Carbon::parse($promotion->pro_start_date);
                                $end_date = Carbon\Carbon::parse($promotion->pro_end_date);
                                if($now->between($start_date,$end_date)){
                                ?>
                                <button class="btn btn-primary">อยู่ในช่วงโปรโมชั่น</button>
                                <?php
                                }
                              }    
                              ?>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
         </div>
       </div>
    </section>
    <!-- /.content -->
@endsection
