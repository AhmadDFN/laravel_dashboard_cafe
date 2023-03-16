<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | CAFE IK</title>

  @include('layouts.sc_head')
</head>
<body class="hold-transition">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper m-0">    
    <!-- Main content -->
    <div class="content p-0">
      <div class="container-fluid p-0">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@include('layouts.sc_footer')

</body>
</html>
