<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Users.css">
    <script>
      $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    </script>
</head>
<body>
<?php include'header.php';?> 
<main>
<section>
  <h1 id="blue">Students</h1>
  <!--User table-->
  <div class="container d-flex justify-content-center"> 
    <table class="">
      <thead class="border-1">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Serial Number</th>
          <th>Gender</th>
          <th>Card UID</th>
          <th>Date</th>
          <th>Device</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0){
                  while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                    <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['serialnumber'];?></td>
                      <td><?php echo $row['gender'];?></td>
                      <td><?php echo $row['card_uid'];?></td>
                      <td><?php echo $row['user_date'];?></td>
                      <td><?php echo $row['device_dep'];?></td>
                  </tr>
        <?php
                }   
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>