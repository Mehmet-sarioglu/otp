<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}" type="text/css" media="all" />

</head>
<body>
<!-- Navbar top -->
<div class="navbar-top">
    <div class="title">
        <h1>Profile</h1>
    </div>

    <!-- Navbar -->
    <ul>
        <li>
            <a href="{{ route('logout') }}">
                <i class="fa fa-sign-out-alt fa-2x"></i>
            </a>
        </li>
    </ul>
    <!-- End -->
</div>
<!-- End -->



<!-- Main -->
<div class="main">
    <h2>IDENTITY</h2>
    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <tbody>

                <tr>
                    @if($user->name)
                    <td>Name</td>
                    <td>:</td>
                    <td>{{$user->name}}</td>
                    @else
                        <td>Name</td>
                        <td>:</td>
                        <td>You are new user you can add new name by click <a href="#" onclick="edit()">here</a></td>
                    @endif
                </tr>
                <tr>

                        <td>Phone</td>
                        <td>:</td>
                        <td>{{$user->phoneNum}}</td>


                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src ="{{asset('assets/js/edit.js')}}"  ></script>

</body>
</html>
