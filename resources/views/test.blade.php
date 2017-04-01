@extends('site.layout.menu')
@section('Breadcrumbs','功能導入測試頁' )

@section('content')



<div class="container">

  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

@endsection