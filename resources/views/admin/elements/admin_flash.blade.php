<!-- arafat flash message start -->
@if(Session::has("message"))
<div class="alert alert-dismissible alert-{{Session::get('class', 'success')}} text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>
      {!!Session::get('message')!!}
  </strong>
</div>
@endif
<?php
    Session::forget("message");
?>
<!-- end arafat flash message -->