<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('resources/assets/system/img/logo-small.png')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/plugins/fontawesome/css/fontawesome.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('resources/assets/system/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/css/neuorol-style.css')}}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">

                    <form action="{{URL::to('/access')}}" method="POST" class="login-userset">
                        {{ csrf_field() }}
                        <div class="login-logo">
                            <img src="{{asset('resources/assets/system/img/logo.png')}}" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <div class="form-login">
                            <label>Employee ID</label>
                            <div class="form-addons">
                                <input type="text" placeholder="Enter your employee ID" name="id">
                                <img src="{{asset('resources/assets/system/img/icons/mail.svg')}}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input" placeholder="Enter your password" name="password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <div class="alreadyuser">
                                <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                            </div>
                        </div>
                        <div class="form-login">
                            <input type="submit" class="btn btn-login" value="Sign In" style="padding: 0px;">
                        </div>
                        <div class="signinform text-center">
                            <h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
                        </div>
                        <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div>
                        <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('resources/assets/system/img/icons/google.png')}}" class="me-2" alt="google">
                                        Sign Up using Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('resources/assets/system/img/icons/facebook.png')}}" class="me-2" alt="google">
                                        Sign Up using Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="login-img">
                    <img src="{{asset('resources/assets/system/img/login-image.jpg')}}" alt="img">
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('resources/assets/system/admin/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('resources/assets/system/admin/js/feather.min.js')}}"></script>

    <script src="{{asset('resources/assets/system/admin/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('resources/assets/system/admin/js/script.js')}}"></script>

</body>

</html>