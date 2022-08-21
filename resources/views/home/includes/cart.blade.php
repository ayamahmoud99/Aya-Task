<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Aya shop</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
<style>
    .center{
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;
        width: 50%;
        text-align: center;
        padding: 30px;
    }
</style>
</head>
<body>
<div class="hero_area">

@include('home.includes.header')

    <table class=" center table" >
        <thead>
        <tr>
            <th scope="col">product_title</th>
            <th scope="col">product_quantity</th>
            <th scope="col">price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
        <tr>
            <th scope="row">{{$cart->product_title}}</th>

            <td>{{$cart->product_quantity}}</td>
            <td>{{$cart->product_title}}</td>
            <td></td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- footer start -->
@include('home.includes.footer')
<!-- footer end -->

<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
