<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Dojo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="app-title text-center">Projects</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <p id="validation-text" class="text-danger"></p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="button" class="btn btn-primary" id="loginButton">Login</button>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        $("#loginButton").click(function () { 

            var username = $("#username");
            var password = $("#password");

            if(username.val()==''){
                username.css('border','1px solid red');
                $("#validation-text").html('Fill Username');
            }
            if(password.val()==''){
                password.css('border','1px solid red');
                $("#validation-text").html('Fill password');
            }
            if(username.val()=='' && password.val()==''){
                username.css('border','1px solid red');
                password.css('border','1px solid red');
                $("#validation-text").html('Fill username and password');
            }
            
            if(username.val()!='' && password.val()!=''){
                $.ajax({
                method: "POST",
                url: "insert.php",
                success: function(res){
                    alert(res);
                },
                data: { username: username.val(), password: password.val() },
                });
            }

        });
    </script>
</body>
</html>