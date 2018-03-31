<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sky Food</title>
    <link rel="icon" href="/share_foods/assets/img/icon/hamberger.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/share_foods/assets/css/sharefood.css">
</head>

<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        @include('/share_foods.partials.header')
        @yield('public.content')
        @include('/share_foods.partials.footer')
    </div>
    <!-- Modal Login-->
    <div id="modal-signIn" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content content">
                <div class="wrp-ctn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sign In</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sharefood.auth.login') }}" data-toggle="validator" role="form" name="form" id="form-signIn" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-12 username">
                                <div class="form-group item">
                                    <label for="input-uerName">Email</label>
                                    <input type="text" id="input-uername" name="email" class="form-control" required />
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 password">
                                <div class="form-group item">
                                    <label for="input-uerName">Password</label>
                                    <input type="password" name="password" id="input-pass" class="form-control" data-minlength="6" required data-error="Mật khẩu ít nhất 6 kí tự" />
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group button-action">
                                    <input type="submit" class=" btn btn-bg" value="Sign in" required />
                                </div>
                            </div>
                            <div class="col-md-12 forgotPass">
                                <div class="form-group ">
                                    <a data-toggle="modal" data-target="#modal-forgot-pass" data-dismiss="modal" href="">Forgot password?</a>
                                </div>
                            </div>
                            <div class="col-md-12 creatAccount">
                                <div class="form-group ">
                                    <p>
                                        Don't have an account?<a data-toggle="modal" data-target="#modal-signUp" data-dismiss="modal" href="">Creat an account</a>
                                    </p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-forgot-pass" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content content">
                <div class="wrp-ctn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <form data-toggle="validator" role="form" name="form" id="form-signIn" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12 username">
                                <div class="form-group item">
                                    <label for="input-uerName">Username</label>
                                    <input type="text" id="input-uername" class="form-control" required />
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group button-action">
                                    <input type="submit" class=" btn btn-bg" value="Send" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-signUp" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content content">
                <div class="wrp-ctn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">sign up</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sharefood.auth.signup') }}" data-toggle="validator" role="form" name="form" id="form-signUp" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}
                            <div class="col-md-12 username">
                                <div class="form-group item">
                                    <label>Email</label>
                                    <input type="email" class="form-control input-userName" name="email" required>
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 password">
                                <div class="form-group item">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control input-pass" id="pass" data-minlength="6" required data-error="Mật khẩu phải ít nhất 6 kí tự">
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 confirmPass">
                                <div class="form-group item">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control input-confirmPass" data-match="#pass" data-minlength="6" required data-match-error="Mật khẩu không trùng khớp">
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 firstName">
                                <div class="form-group item">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="form-control input-firstName" required>
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 lastName">
                                <div class="form-group item">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control input-lastName" required>
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 gender">
                                <div class="form-group item">
                                    <label>Gender</label>
                                    <input type="radio" name="gender" value="1" checked> Male
                                    <input type="radio" name="gender" value="2"> Female
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group button-action">
                                    <input type="submit" class=" btn btn-bg" value="Sign up" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-search" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content content">
                <div class="wrp-ctn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">search</h4>
                    </div>
                    <div class="modal-body">
                        <form data-toggle="validator" role="form" name="form" id="form-search" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <div class="form-group item">
                                    <input type="text" class="form-control" required>
                                    <div class="underline"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group button-action">
                                    <input type="submit" class=" btn btn-bg" value="Search" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery Library -->
    <script src="/share_foods/assets/js/jquery/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script src="/share_foods/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/share_foods/assets/js/validator.min.js"></script>
    <script src="/share_foods/assets/js/wow.min.js"></script>
    <script src="/share_foods/assets/js/slick.js"></script>
    <script src="/share_foods/assets/js/rater.js"></script>
    <script src="/share_foods/assets/js/jquery/jquery.cropit.js"></script>
    <script src="/share_foods/assets/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbJTv1mpf9Tm1fWBip0XKIuE1tBcv9GMc&callback=initMap" async defer></script>
</body>

</html>
