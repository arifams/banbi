<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BANBIBE - Fun easy way to learn Bahasa Indonesia</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>assets/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="<?php echo base_url() ?>assets/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- Custom Theme CSS -->
        <link href="<?php echo base_url() ?>assets/public/css/banbibe_style.css" rel="stylesheet">

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="page-scroll">
                            <a href="#contact">login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <section class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading">banbibe</h1>
                            <p class="intro-text">A fun and nice way for kids <br /> to learn Bahasa Indonesia.</p>
                            <div class="page-scroll">
                                <a href="#contact" class="btn btn-circle">
                                    <i class="fa fa-angle-double-down animated"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Start</h2>

                    <ul class="list-inline banner-social-buttons">
                        <li><a href="#loginModal" data-toggle="modal" class="btn btn-default btn-lg"> <span class="network-name">Login</span></a>
                        </li>
                        <li><a href="#signupModal" data-toggle="modal" class="btn btn-default btn-lg"> <span class="network-name">Sign-up</span></a>
                        </li>
                    </ul>
                    <p><br /></p>
                    <p><br /></p>
                    <p><h5 style="color:lightgrey">aloh@banbi.be</h5></p>
                </div>
            </div>
        </section>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url() ?>" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel">Login</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="******" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="login" value="1" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url() ?>" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel">Sign Up</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="******" />
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password2" class="form-control" placeholder="******" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="signup" value="1" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Core JavaScript Files -->
        <script src="<?php echo base_url() ?>assets/public/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/public/js/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url() ?>assets/public/js/banbibe_js.js"></script>

    </body>

</html>
