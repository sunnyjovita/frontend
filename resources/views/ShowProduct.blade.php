@extends('master')

@section('content')
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>My products</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/css/product.css">

</head>
 @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif


              @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('message') }}
              </div>
              @endif



<body style="height: 100%;">
    <section>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>My products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#"> Create New Product</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered" >
        <tr>
            <!-- <th>No</th> -->
            <th width="200px">Image</th>
            <th width="200px">Name</th>
            <th width="200px">Price</th>
            <th width="200px">Action</th>
        </tr>

        <div class="trending-wrapper">
  <!-- <h3>Trending products</h3> -->

  

  

  

  

    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</section>
     <!--jQuery Library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Popper JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--compiled Javascript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--owl carousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--javascript-->
    <script type="text/javascript" src="/js/main.js"></script>
</body>
</html>

@endsection
