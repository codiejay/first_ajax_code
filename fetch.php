<?php

    include 'conn.php';

    //$start = $_POST['start'];
    $offset = $_POST['offset'];

    $sql = "SELECT * FROM users LIMIT 2 OFFSET $offset";

    $result = mysqli_query($conn,$sql);
    $response='';
    if($result->num_rows>0){
        while($rows=$result->fetch_assoc()){
            $response.= '
            <tr>

                                <td>'.$rows['uname'].'</td>
                                <td>'.$rows['pwd'].'</td>
                                

                            </tr>
            ';
        }
        exit($response);
    }