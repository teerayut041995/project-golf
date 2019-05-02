<li>
  <a href="{{url('/admin/orders/promotions', $notification->data['order_id'])}}">
    <!-- <div class="pull-left">
      <img src="{{asset('template/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div> -->
    <h4 style="position: relative;left: -40px;">
      {{$notification->data['user']}}
      <small style="position: relative;right: -100px;"><i class="fa fa-clock-o"></i> 
        {{Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}
      </small>
    </h4 >
      <p style="position: relative;left: -40px;">ได้สั่งซื้อโปรโมชันจากเว็บไซต์ของคุณ</p>
    </a>
</li>