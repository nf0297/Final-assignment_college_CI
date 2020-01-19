
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page | PT Galih Ayom Paramesti</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?=base_url()?>assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
    </head>
    
    <body class="hold-transition login-page">
        
        <div class="login-box">
            <div class="login-logo">
                <a href="#">PT<b>GAP</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Please Sign in</p>
                <form action="<?=site_url('authentication/process')?>"method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required autofocus/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div> 
                        <div class="col-xs-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>