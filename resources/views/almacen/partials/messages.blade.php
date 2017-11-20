@if(Session::has('update'))

  <div class="alert alert-dismissable" role="alert" style="background:#bcdff1; color:#31708f; padding:10px 5px 15px 20px;!important">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>{{Session::get('update')}}</strong> 
  </div>
@endif

@if(Session::has('save'))
  <div class="alert alert-dismissable" role="alert" style="background:#dff0d8; color:#3c763d; padding:10px 5px 15px 20px; !important">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>{{Session::get('save')}}</strong> 
  </div>
@endif