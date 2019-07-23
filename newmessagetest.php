

<html>
<body>
<?php 
$servername ="50.62.209.51:3306";
$username = "excel"; 
$password = "3N*bd14s"; 
$database = "excelformat"; 
$mysqli = new mysqli($servername, $username, $password, $database); 
$query = "select * from futurepayment_message";
 
 echo '<center><h2>Contact Form Data</h2><center>';
echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Id</font> </td> 
          <td> <font face="Arial">Name</font> </td> 
          <td> <font face="Arial">Mobile</font> </td> 
          <td> <font face="Arial">Company</font> </td> 
          <td> <font face="Arial">Designation</font> </td> 
		    <td> <font face="Arial">Email</font> </td> 
          <td> <font face="Arial">Message</font> </td> 
          <td> <font face="Arial">Interest</font> </td> 
          <td> <font face="Arial">Interest_Other</font> </td> 
          <td> <font face="Arial">Created_at</font> </td> 
      </tr>';
 

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["name"];
        $field3name = $row["mobile"];
        $field4name = $row["company"];
        $field5name = $row["designation"]; 
		$field6name = $row["email"];
        $field7name = $row["message"];
        $field8name = $row["interest"];
        $field9name = $row["interest_other"];
        $field10name = $row["created_at"];
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
				  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
                  <td>'.$field8name.'</td> 
                  <td>'.$field9name.'</td> 
                  <td>'.$field10name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>