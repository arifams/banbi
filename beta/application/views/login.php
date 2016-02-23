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
        <link href="<?php echo base_url() ?>assets/public/css/custom.css" rel="stylesheet">

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <section class="space10">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <h1>Login</h1>

                        <p>Please login</p>

                        <?php if ($this->session->flashdata('login_failed')) : ?>
                            <div class="alert alert-danger">
                                Login failed. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($this->session->flashdata('access_denied')) : ?>
                            <div class="alert alert-danger">
                                Access denied. Please login to access the page.
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo current_url() ?>" method="post">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="hidden" name="submit" value="1" />
                                <button class="btn btn-success">Login</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>

        <!-- Core JavaScript Files -->
        <script src="<?php echo base_url() ?>assets/public/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/public/js/jquery.easing.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url() ?>assets/public/js/banbibe_js.js"></script>

    </body>

</html>
