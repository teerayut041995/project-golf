@extends('layouts.master')

@section('title')
ข้อมูลกิจกรรม
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลกิจกรรม
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/activities')}}">กิจกรรม</a></li>
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
                              <th>ชื่อกิจกรรม</th>
                              <th>รายละเอียด</th>
                              <th style="width: 15%;">วันที่เริ่มกิจกรรม</th>
                              <th style="width: 15%;">วันที่สิ้นสุดกิจกรรม</th>
                              <th style="width: 10%;">รูปภาพ</th>
                              <th style="width: 10%;">จัดการข้อมูล</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activities as $activity)
                            <tr>
                              <td>{{$activity->act_name}}</td>
                              <td>{{$activity->act_detail}}</td>
                              <td>{{createDateThai($activity->act_start_date)}}</td>
                              <td>{{createDateThai($activity->act_end_date)}}</td>
                              <td>
                                  <img src="{{url('images/activity' , $activity->act_image)}}" style="width: 80px;height: 80px;">
                              </td>
                              <td>
                                  <a href="{{url('/admin/activities/'.$activity->id.'/edit')}}" class="btn btn-success btn-xs btn-block">แก้ไข</a>
                                  <br>
                                    <form class="delete" action="{{ url('/admin/activities', $activity->id) }}" method="POST">
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
          'lengthChange': false,
          'searching'   : false,
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