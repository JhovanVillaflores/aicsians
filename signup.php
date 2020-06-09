<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>aicsians</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">

</head>

<body>
    <!-- Start: Navigation with Button -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="http://localhost/aicsians/">AICSIANS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                </ul>
                <span class="navbar-text actions">
                  <a class="login" href="http://localhost/aicsians/#login">Log In</a>
                  <a class="btn btn-light action-button" role="button" href="signup">Sign Up</a>
                </span>
            </div>
        </div>
    </nav>
    <!-- End: Navigation with Button -->
    <!-- Start: Registration Form with Photo -->
    <div class="register-photo" >
        <!-- Start: Form Container -->
        <div class="form-container">
            <form method="post" action="" id="signup-form">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" id="first_name" type="text" name="first_name" placeholder="Firstname" required></div>
                <div class="form-group"><input class="form-control" id="middle_name" type="text" name="middle_name" placeholder="Middlename"></div>
                <div class="form-group"><input class="form-control" id="last_name"type="text" name="last_name" placeholder="Lastname" required></div>
                <hr>
                <div class="form-group"><input class="form-control" id="student_no" type="text" name="student_no" placeholder="Student Number" required></div>
                <div class="form-group"><input class="form-control" id="username" type="text" name="username" placeholder="Username" required></div>
                <div class="form-group"><input class="form-control" id="email" type="email" name="email" placeholder="Email" required></div>

                <div class="col ">
                  <label for="gender">Track</label>
                  <select class="form-control" id="gender">
                    <option>Academic Track</option>
                    <option>Technical Vocational</option>
                  </select>
                </div>
                <div class="form-group"><input class="form-control" type="password" id="pass1" name="password" placeholder="Password" required></div>
                <div class="form-group"><input class="form-control" type="password" id="pass"name="password-repeat" placeholder="Password (repeat)" required></div>
                <div id="verify">  </div>

                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a class="already" href="index">You already have an account? Login here.</a></form>
        </div>
        <!-- End: Form Container -->
    </div>
    <!-- End: Registration Form with Photo -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/register.js" charset="utf-8"></script>

    <!-- Start: Footer Clean -->
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Start: Services
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div> -->
                    <!-- End: Services -->
                    <!-- Start: About
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div> -->
                    <!-- End: About -->
                    <!-- Start: Careers
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>-->
                    <!-- End: Careers -->
                    <!-- Start: Social Icons -->
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">AICSIANS © 2020</p>
                    </div>
                    <!-- End: Social Icons -->
                </div>
            </div>
        </footer>
    </div>
    <!-- End: Footer Clean -->

</body>

</html>
