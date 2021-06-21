
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Tables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
</head>
<body>
<div class="container">
    <h2>Simple Pagination Example using Datatables Js Library</h2>
    <table class="table table-fluid" id="myTable">
    <thead>
    <tr>
            <th>UserName</th>
            <th>Email</th>
            <th>Rights</th>
            <th colspan='2' align='center'>Operations</th>
            
    </tr>
    </thead>
    <tbody>


<?php
    include("connect.php");
    $query = "SELECT * FROM `usertable`";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    
    // echo $result['username'];
    // echo $total;
    if ($total!=0) {
        // $result = mysqli_fetch_assoc($data);
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
            <td>".$result['username']."</td>
            <td>".$result['email']."</td>
            <td>".$result['rights']."</td>
            <td><a href='update.php?id=$result[id]&username=$result[username]&email=$result[email]&rights=$result[rights]'>Update</td>
            <td><a href='delete.php?id=$result[id]'>Delete</td>            
            </tr>                
            ";
          
            
        }
        // echo "Records Found";

    }
    else{
        echo "No Records";
    }
?>


    </tbody>
    </table>
</div>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>
