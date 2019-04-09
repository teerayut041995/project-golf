@extends('layouts.master')

@section('title')
ข้อมูลธนาคาร
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ข้อมูลธนาคาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{url('/admin/banks')}}">ข้อมูลธนาคาร</a></li>
        <li class="active">ข้อมูลข้อมูลธนาคารทั้งหมด</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">ข้อมูลข้อมูลธนาคารทั้งหมด</h3>
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
                              <th>ชื่อธนาคาร</th>
                              <th>ชื่อบัญชี</th>
                              <th style="width: 15%;">หมายเลขบัญชี</th>
                              <th style="width: 15%;">พร้อมเพย์</th>
                              <th style="width: 10%;">จัดการข้อมูล</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banks as $bank)
                            <?php
                            if ($bank->promptpay_qr != '') {
                                $image = url('images/bank' , $bank->promptpay_qr);
                            } else {
                                $image = url('images/default/no-image-qr-code.png');
                            }
                            ?>
                            <tr>
                              <td>
                                {{$bank->bank_name}}
                                <p class="help-block">{{$bank->bank_branch}}</p>
                              </td>
                              <td>{{$bank->account_name}}</td>
                              <td>{{$bank->account_number}}</td>
                              <td align="center">
                                  <img src="{{$image}}" style="width: 80px;height: 80px;"><br>
                                  {{$bank->promptpay_number}}
                              </td>
                              <td>
                                  <a href="{{url('/admin/banks/'.$bank->id.'/edit')}}" class="btn btn-success btn-xs btn-block">แก้ไข</a>
                                  <br>
                                    <form class="delete" action="{{ url('/admin/banks', $bank->id) }}" method="POST">
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