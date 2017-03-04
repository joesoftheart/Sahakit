<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sahakit System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="index_css.css" rel="stylesheet">
</head>
<body>

    <form name="form1" method="post" action="sendpassword.php">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="well">
            <div class="row">
                <div class="col-md-10 col-lg-offset-1">
                    <label for="username">ชื่อผู้ใช้</label>
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i> </span>
                        <input  name="username" id="username" placeholder="Username" type="text" class="form-control"/>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-10 col-lg-offset-1">
                        <label for="email">อีเมลผู้ใช้</label>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> </span>
                            <input  name="email" id="email" placeholder="Email-Address" type="email" class="form-control"/>
                        </div>
                    </div>
                </div>
                <br>
            <div class="row">
                <div class="col-md-6 col-lg-offset-3">
                    <input type="submit" class="btn btn-success btn-lg" value="Send Password">
                </div>
            </div>
            </div>
    </form>

</body>
</html>
