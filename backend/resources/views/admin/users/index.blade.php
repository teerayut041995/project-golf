@extends('layouts.master')

@section('title')
ข้อมูลสมาชิก
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลสมาชิก
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/banks')}}">ข้อมูลสมาชิก</a></li>
        <li class="active">ข้อมูลสมาชิกทั้งหมด</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">ข้อมูลสมาชิกทั้งหมด</h3>
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
                              <th>ชื่อ</th>
                              <th>เบอร์โทร</th>
                              <th style="width: 15%;">อีเมล</th>
                              <th style="width: 15%;">สมัครสมาชิกวันที่</th>
                              <th style="width: 10%;">จัดการข้อมูล</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            
                            <tr>
                              <td>
                                <a href="{{url('admin/users' , $user->id)}}">{{$user->name}}</a>
                              </td>
                              <td>{{$user->phone}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{createDateThai($user->created_at)}}</td>
                              <td>
                                  <a href="{{url('/admin/users/'.$user->id.'/edit')}}" class="btn btn-success btn-xs btn-block">แก้ไข</a>
                                  <br>
                                    <form class="delete" action="{{ url('/admin/users', $user->id) }}" method="POST">
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