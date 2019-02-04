<?php
//sellform.php

$error = '';
$name = '';
$email = '';
$phone = '';
$bookno = '';
$l0 = '';
$l1 = '';
$l6 = '';
$l7 = '';
$l8 = '';
$l9 = '';
$l10 = '';
$l11 = '';

function clean_text($string) {
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"])) {
    if(empty($_POST["name"])) {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    } else {
      $name = clean_text($_POST["name"]);
      if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
      }
    } 
    
    if(empty($_POST["email"])) {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
 
    if(empty($_POST["phone"])) {
        $error .= '<p><label class="text-danger">Phone Number is required</label></p>';
    } else {
        $phone = clean_text($_POST["phone"]);
    }
 
    if(empty($_POST["bookno"])) {
        $error .= '<p><label class="text-danger">Book Number is required</label></p>';
    } else {
        $bookno = clean_text($_POST["bookno"]);
    }
    
    $read_file = fopen('data.csv', 'r');
    $file_open = fopen('customers.csv', 'a');
    $no_rows = count(file('customers.csv'));
    if($no_rows > 1) {
        $no_rows = ($no_rows - 1) + 1;
    }
    
    $line = fgetcsv($read_file);
    
    while(($line = fgetcsv($read_file)) !== FALSE) {
        if ($line[1] == $bookno && $line[0] == 'Avail') { 
            $l0 = $line[0];
            $l1 = $line[1];
            $l6 = $line[6];
            $l7 = $line[7];
            $l8 = $line[8];
            $l9 = $line[9];
            $l10 = $line[10];
            $l11 = $line[11];
                        
            fwrite($file_open, $name);
            fwrite($file_open, ",");
            fwrite($file_open, $email);
            fwrite($file_open, ",");
            fwrite($file_open, $phone);
            fwrite($file_open, ",");
            fwrite($file_open, $l6);
            fwrite($file_open, ",");
            fwrite($file_open, $l7);
            fwrite($file_open, ",");
            fwrite($file_open, $l8);
            fwrite($file_open, ",");
            fwrite($file_open, $l9);
            fwrite($file_open, ",");
            fwrite($file_open, $l11);
            fwrite($file_open, "\r\n");
            
            fclose($file_open);
            fclose($read_file);
            
            $error .= '<label class="text-success">Thank you for buying with us</label>';
            
            break;
        } else {
            $error .= '<label class="text-danger">Error: Please select an available book</label>';
            break;
        }
    }
                  
    $name = '';
    $email = '';
    $phone = '';
    $bookno = '';
    $l0 = '';
    $l1 = '';
    $l6 = '';
    $l7 = '';
    $l8 = '';
    $l9 = '';
    $l11 = '';
    
    //header("Location: ". $l10);
    $l10 = '';
    //die();
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Buy Book</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="css/reset.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins|Sarabun" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <link rel="icon" href="img/logo.png">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/styles.css">
</head>
 
<body>
  <br />
  <div class="container">
       <a href="buyer.html"><p align="left"><i class="fas fa-book-open"> Back to Books</i></p></a>
  <header><h2><img src="img/header.png" alt="logo" height="125px" width="650px"></h2></header>    
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Buying Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
    <div class="form-group">
      <label>Enter Phone Number</label>
      <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Book Number</label>
      <input type="number" name="bookno" class="form-control" placeholder="Enter Book Number" value="<?php echo $bookno; ?>" />
     </div>   
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
