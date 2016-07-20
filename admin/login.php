<?php
session_start();
if(isset($_SESSION['username']))
{
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Ke sistem Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Selamat Datang Admin Sistem</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" id="login">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username..." name="username" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/TweenLite.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<script>
    $(document).ready(function(){
        var host='api/user.php?menu=loginadmin'
        $('#login').submit(function(){
            //alert(host);
            $.ajax({
                url : host,
                type: "POST",
                data : $('form#login').serialize(),
                dataType: "JSON",
                success: function(respon)
                {
                    if(respon.hasil==='berhasil')
                    {
                        $(location).attr('href','index.php');

                    }
                    else
                    {
                        alert(respon.pesan);
                    }
                }
            });
            return false;
        });
    });

</script>

</body>
</html>