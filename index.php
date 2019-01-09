<?php
 include 'conn.php';

 ?>
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
    <style>.padding-five-percent{padding: 5%;}</style>
    <h1 class="app-title text-center">Add User</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12"></div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="action card padding-five-percent">
                    <p id="validation-text" class="text-danger"></p>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="button" class="btn btn-primary" id="createUserButton">Create User</button>
                </div>
                <br><br>
                <div class="action card padding-five-percent">
                    <h1 class="text-center">Users</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody id="users">
                            <?php
                            
                            $limit = 5;
                            $sql = "SELECT * FROM users LIMIT $limit";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows > 0){
                                while($rows = $result->fetch_assoc()){
                                    echo'
                                        <tr>

                                <td>'.$rows['uname'].'</td>
                                <td>'.$rows['pwd'].'</td>
                                

                            </tr>
                                    ';
                                }
                            }
                            ?>
                            

                        </tbody>
                    </table>
                    <button type="button" id="fetchUsersButton" class="btn btn-primary">Fetch 2 More</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12"></div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        //Create Call
        $("#createUserButton").click(function () { 

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
                async: true,
                url: "insert.php",
                success: function(res){
                    alert(res);
                },
                data: { username: username.val(), password: password.val() },
                });
            }

        });
        //Read 
        var offset = 5;
        
        $("#fetchUsersButton").click(function () { 

            
        
            //alert(limit);

            $.ajax({
                method: "POST",
                async: true,
                url: "fetch.php",
                success: function(res){
                    $("#users").append(res);
                },
                data: {limit: 2,offset: offset},
                });
            
            offset=offset+2;
        });
    </script>
</body>
</html>