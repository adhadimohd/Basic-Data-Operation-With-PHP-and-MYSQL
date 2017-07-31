<?php
// Title : Basic PHP & MYSQL Database Operation
// Author : adhadi mohd
// this code demonstrate my ability to code with php and mysql.
// i am using MYSQLI to extract data from mysql.
//
//
// 1. Connect to db
// 2. Create table
// 3. Insert table
// 4. Retrieve data


$con = @new mysqli('localhost','root', '', 'erpdb');



// 1. how to connect
if ($con->connect_error) {
  echo $con->connect_error;

  // exit upon error
  exit();

}
echo "1. Connected to mysql<br>";


// 2. Php and MYSQL code on create some table
// i am creating some user table
$query = "CREATE TABLE if not exists users (";
$query .= "  userId int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
$query .= "  firstname varchar(32), ";
$query .= "  lastname varchar(32), ";
$query .= "  emailaddress varchar(64), ";
$query .= "  created_at datetime ";
$query .= ");";


$result = $con->query( $query);
if ($result) {
  echo "2. Table creation was success.<br>";
}
else
{
  die ("Database Query failed. ". mysqli_error($con));
}


// 3. inserting some data into the table.
$query = "insert into users (firstname, lastname, emailaddress, created_at) values ('Adhadi', 'Mohd', 'adhadi@gmail.com', now())";
$result = $con->query( $query);
if ($result) {
  echo "3. Data insert was a success.<br>";
}
else
{
  die ("Data insert failed. ". mysqli_error($con));
}


// 4. fetching data from user tables
$query = "select * from users";
$result = $con->query($query);
if ($result) {
  echo "4. Data retrieval successful. <br>";
  while ($row = mysqli_fetch_row($result))
  {
    var_dump($row);
    echo "<hr />";
  }
}
else {
  die ("Data reading failed ". mysqli_error($con));
}


$con->close();
?>
