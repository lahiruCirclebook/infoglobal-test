<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'Layout/loginLayout.php'; ?>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-black mb-2 mt-5">Welcome Back!</h1>
                        <p class="text-lead text-black">Login Your Account.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Login</h5>
                        </div>
                        <div class="card-body">
                            <form id="login">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Email ID" name="email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Login Now</button>
                                </div>
                                <center>
                                    <p class="text-sm mt-3 mb-0">Create New Account? <a href="register.php" class="text-dark font-weight-bolder">register</a></p>
                                </center>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/plugins/jquery.js"></script>
    <script src="assets/js/plugins/toastr.min.js"></script>
    <script src="assets/js/custom/dashboard-client.js"></script>
    <script src="assets/js/custom/login.js"></script>
</body>

</html>