@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var strength = {
        0: "Worst",
        1: "Bad",
        2: "Weak",
        3: "Good",
        4: "Strong"
    }

    var password = document.getElementById('test1');
    var meter = document.getElementById('password-strength-meter');
    var text = document.getElementById('password-strength-text');

    password.addEventListener('input', function() {
    var val = password.value;
    var result = zxcvbn(val);

    // Update the password strength meter
    meter.value = result.score;

    // Update the text indicator
    if (val !== "") {
        text.innerHTML = "Strength: " + strength[result.score]; 
    } else {
        text.innerHTML = "";
    }
    });
</script>
<style>

</style>

<body style="background-color:AntiqueWhite;">
<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4"></div>
            <div class="col-md-4" style="margin-top: 20px;">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="text-center"><br/>
                                <h3>Daftar Pengguna</h3>
                                <hr>
                            </div>
                                <script>
                                        $(document).ready(function(){
                                        $(':checkbox').change(function(){
                                        if($(this).is(':checked'))
                                        {
                                            $(this).prev('input').attr('type','text');
                                        }
                                        else
                                        {
                                        $(this).prev('input').attr('type','password');
                                        }
                                            });
                                        });
                                </script>
                                    <form action="" method="POST">
                                        
                                        <h7>Nama Penuh:</h7>
                                        <input type="text" class="form-control" placeholder="Fullname" name="staff_name" autofill="off" /><br>

                                        <h7>Email:</h7>
                                        <input type="email" class="form-control" placeholder="Email" name="staff_email" autofill="off" /><br/>

                                        <h7>Nombor Kad Pengenalan:</h7>
                                        <input type="number" class="form-control" placeholder="Contoh: 987654321010" name="matric" autofill="off" /><br>
                                        
                                        <h7>Nombor Telefon:</h7>
                                        <input type="number" class="form-control" placeholder="Contoh: 01234567890" name="username" autofill="off" />
                                        <br>
                                        
                                        <h7>Kata Laluan:</h7>
                                        <input type="password" id="test1" class="form-control" placeholder="Password" name="password" autofill="off" />
                                        <input id="test2" type="checkbox"/>Tunjuk Kata Laluan
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                        <br/><meter max="4" id="password-strength-meter"></meter>
                                        <p id="password-strength-text"></p>
                                        <h6>Sila gunakan sekurang-kurangnya 1 nombor, simbol, huruf besar dan minimum 8 karakter</h6><br/>
                                        
                                        <div class="col-md-12 text-center">
                                        
                                            <button class="btn btn-block btn-success">
                                                <span class="fa fa-send"></span> Daftar
                                            </button>
                                        </div>
                                    </form>
                                        
                                            <div class="col-md-12 text-center">
                                                <br>
                                                <a href="login" class="">Log Masuk Pengguna</a>
                                            </div><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
@endsection
