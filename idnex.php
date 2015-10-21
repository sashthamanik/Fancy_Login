<?php
 /*
*Autor :Sashthamanik 
* Date: 21/10/2015
* Time: 5:19 PM
*/
session_start();//session starts here
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Login Panel</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<!--This is Google recaptch
    <script src="https://www.google.com/recaptcha/api.js"></script>-->

<link rel="stylesheet" type="text/css" href="css/login_style.css"/>
 <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/fancy/dist/fancy.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/stylesheet.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
     
		<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
                        <h3 class="panel-title"> <i class="fa fa-user fa-5x"> </i> 
						  </h3>
						  Administrator Login
                    </div>
                    <div class="panel-body">
                        <form role="form"  action="index.php" name="login" method="post">
                            <fieldset>
                                
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        	    <input class="form-control" placeholder="Username" name="admin_name" type="text" autofocus>
                            </div>
                            <div class="clearfix"></div><br>
                        
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        		<input class="form-control"  type="password" name="admin_pass" placeholder="Password" value=""/>
                            </div>
                        
                            <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input type="submit" name="admin_login" class="btn btn-lg btn-primary btn-block" value="login" />
                              </fieldset>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


	
<?php
/**
 * Created by sashtha.
 * Date: 21/10/2015
 * Time: 5:19 PM
 */
 
 //Here database connection required 
 
include("database/db_conection.php");

if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.
{
    $admin_name=$_POST['admin_name'];
    $admin_pass=$_POST['admin_pass'];

    $admin_query="select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";

    $run_query=mysqli_query($dbcon,$admin_query);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>window.open('home.php','_self')</script>";
		 $_SESSION['admin_name']=$admin_name;//here session is used and value of $user_email store in $_SESSION.
    }
    else {echo"<script>alert('Admin Details are incorrect..!')</script>";}

}

?>
