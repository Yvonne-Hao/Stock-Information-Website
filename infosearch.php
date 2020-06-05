<?php
  echo "
  <div style = 'text-align: center; padding:1.5%'>
        <img src='logo3.png' height='70' weight='120' alt='logo'></div>
  <style>table,td,th{text-align: left;border-collapse: collapse;border:1px solid black;font-size:20px;}th,td{padding:15px;} </style>";
  echo "<div style = 'text-align:left; width:85%; padding:1.5%;font-family: sans-serif; font-size:16px; margin-left: 5%;'>";


$user = 'root';
$pw = '';
$host = 'localhost';
$db = 'search';

$connect = mysqli_connect($host, $user, $pw, $db) or die("Could not connect");

// Query the database using PHP
$sql  = "SELECT * FROM info 
         WHERE ticker = '".$_GET["company"]."' " ;
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();

$input = $_GET['company'];

if(empty($input)) {
      echo "Both of the Stock ticker code and Information types are required.";}

elseif(empty($row)){
  echo "There is no information associate with '". $_GET["company"]. "' in our database. Please select one of the company from the following code: AMZN, APPL, TSLA. ";}
  
    if(mysqli_num_rows($result) > 0){
      echo "<h1>" .$row['Company'] . " (" .$row['ticker'] .")<hr></h1>";
    if(isset($_GET['Info1'])) {
        echo "<h2>Stock Price Information</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Recent</th>";
        echo "<th>Highest in 365 days  </th>";
        echo "<th>Lowest in 365 days  </th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['recent'] . "</td>";
        echo "<td>" . $row["high"] . "</td>";
        echo "<td>" . $row["low"] . "</td>";
        echo "</tr></table><br><br>";}

    if(isset($_GET['Info2'])) {
        echo "<h2>Company Summary Information</h2>";
        echo "<table><tr><td>". $row['summary'] ."</td></tr></table><br><br>";}

    if(isset($_GET['Info3'])){
        echo "<h2>Detailed Company Information</h2>";
        echo "<table><tr><th>More Information</th></tr>";
        echo "<tr><td>" . $row['detail'] . "</td></tr></table><br>";
        echo "<table><tr><th>Top Three Officers</th><th>Biography</th></tr>";
        echo "<tr><td><img src=" . $row['officer1'] . "></td><td><br>" . $row['bio1'] . "</td></tr>";
        echo "<tr><td><img src=" . $row['officer2'] . "></td><td><br>" . $row['bio2'] . "</td></tr>";
        echo "<tr><td><img src=" . $row['officer3'] . "></td><td><br>" . $row['bio3'] . "</td></tr></table></style><br><br>";}}

    
      
       

    







    

    




      
  
    
      
        
    
       
      

    


  

// Close connection
mysqli_close($connect);

?>
