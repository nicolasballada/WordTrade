<?php
//seller.php

$error = '';
$name = '';
$email = '';
$studentid = '';
$phone = '';
$title = '';
$author = '';
$isbn = '';
$price = '';
$paypal = '';
$desc = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"])) {
 if(empty($_POST["name"])) {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["studentid"]))
 {
  $error .= '<p><label class="text-danger">Student ID is required</label></p>';
 }
 else
 {
  $studentid = clean_text($_POST["studentid"]);
 }
 if(empty($_POST["phone"]))
 {
  $error .= '<p><label class="text-danger">Phone Number is required</label></p>';
 }
 else
 {
  $phone = clean_text($_POST["phone"]);
 }
 if(empty($_POST["title"]))
 {
  $error .= '<p><label class="text-danger">Title is required</label></p>';
 }
 else
 {
  $title = clean_text($_POST["title"]);
 }
 if(empty($_POST["author"]))
 {
  $error .= '<p><label class="text-danger">Author is required</label></p>';
 }
 else
 {
  $author = clean_text($_POST["author"]);
 }
 if(empty($_POST["isbn"]))
 {
  $error .= '<p><label class="text-danger">ISBN Number is required</label></p>';
 }
 else
 {
  $isbn = clean_text($_POST["isbn"]);
 }
 if(empty($_POST["price"]))
 {
  $error .= '<p><label class="text-danger">Price is required</label></p>';
 }
 else
 {
  $price = clean_text($_POST["price"]);
 }
 if(empty($_POST["paypal"]))
 {
  $error .= '<p><label class="text-danger">Paypal Link is required</label></p>';
 }
 else
 {
  $paypal = clean_text($_POST["paypal"]);
 }
 if(empty($_POST["desc"]))
 {
  $error .= '<p><label class="text-danger">Description is required</label></p>';
 }
 else
 {
  $desc = clean_text($_POST["desc"]);
 }
    
  $file_open = fopen('data.csv', 'a');
  $no_rows = count(file('data.csv'));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
    
  fwrite($file_open, 'Avail');
  fwrite($file_open, ",");
  fwrite($file_open, $no_rows);
  fwrite($file_open, ",");
  fwrite($file_open, $name);
  fwrite($file_open, ",");
  fwrite($file_open, $email);
  fwrite($file_open, ",");
  fwrite($file_open, $studentid);
  fwrite($file_open, ",");
  fwrite($file_open, $phone);
  fwrite($file_open, ",");
  fwrite($file_open, $title);
  fwrite($file_open, ",");
  fwrite($file_open, $author);
  fwrite($file_open, ",");
  fwrite($file_open, $isbn);
  fwrite($file_open, ",");
  fwrite($file_open, $price);
  fwrite($file_open, ",");
  fwrite($file_open, $paypal);
  fwrite($file_open, ",");
  fwrite($file_open, $desc);
  fwrite($file_open, "\r\n");
  fclose($file_open);
    
  $error = '<label class="text-success">Thank you for selling with us</label>';
  $name = '';
  $email = '';
  $phone = '';
  $title = '';
  $author = '';
  $isbn = '';
  $price = '';
  $paypal = '';
  $desc = '';

}

?>
<!DOCTYPE html>

<html>
 
<head>
  <title>Sell Book</title>   
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
  <br/>
  <div class="container">
       <a href="index.html"><p align="left"><i class="fas fa-igloo"> Home</i></p></a>
  <header><h2><img src="img/header.png" alt="logo" height="125px" width="650px"></h2></header>    
   <br />
   
    <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Seller Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter UMass Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
        
    <div class="form-group">
      <label>Enter Student ID</label>
      <input type="number" name="studentid" class="form-control" placeholder="Enter Student ID" value="<?php echo $studentid; ?>" />
     </div>
        
    <div class="form-group">
      <label>Enter Phone Number</label>
      <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone; ?>" />
     </div>
    <div class="form-group">
      <label>Enter Book Title</label>
      <input type="text" name="title" class="form-control" placeholder="Enter Book Title" value="<?php echo $title; ?>" />
     </div>
    <div class="form-group">
      <label>Enter Author Name</label>
      <input type="text" name="author" class="form-control" placeholder="Enter Author Name" value="<?php echo $author; ?>" />
     </div>
    <div class="form-group">
      <label>Enter Book ISBN</label>
      <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" value="<?php echo $isbn; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Price (in USD)</label>
      <input type="number" name="price" class="form-control" placeholder="Enter Price" value="<?php echo $price; ?>" />
     </div>
    <div class="form-group">
      <label><a href="https://www.paypal.com/paypalme">Enter Paypal Money Request Link</a></label>
      <input type="url" name="paypal" class="form-control" placeholder="Enter Paypal Money Request Link" value="<?php echo $paypal; ?>" />
     </div>        
     <div class="form-group">
      <label>Enter Description of Use (current condition, damages, and format of book i.e. hardcover, paperback, loose leaf, etc.)</label>
      <textarea name="desc" class="form-control" placeholder="Enter Description of Use"><?php echo $desc; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>

</body>
</html>