<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
.error {color: #FF0000;}
</style>
    <title>FORM CSV</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">HOMEPAGE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
            <a href="template.csv" class="download" Download> DOWNLOAD </a>
            </li>

        </ul>

        </ul>
    </div>
</nav>
<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $dateErr = "";
$firstname = $lastname = $date = "";
$firster = $laster = $dateer = $aler = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    $firster = 1;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    $laster = 1;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["date"])) {
    $dateErr = "date is required";
  } else{
    $dateer = 1;
    $date = test_input($_POST["date"]);
  }
  if($dateer ==1 && $firster ==1 && $laster == 1){
    $aler = 1;
  }
  if($dateer ==0 || $firster ==0 || $laster == 0){
    $aler = 0;
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
<h2 style="text-align:center;font-weight:bold;color:blue"> LOGIN </h2>
<a><span class="error">* required field</span></a>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="firstname" id="firstname"value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span>
  Last Name: <input type="text" name="lastname" id="lastname"value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span> 
  <br>
<p>Date: <input type="text" id="datepicker" name="date" id="date" value="<?php echo $date;?>">
<span class="error">* <?php echo $dateErr;?></span></p>
<input type="submit" id="submitid" name="submit" value="SUBMIT">
</form>

<form id = "uploadid"action="/action_page.php" method="post">
<p>     
        <input type="file" name="filename" accept=".csv" /><br>
        <input type='submit' <?php if($aler == 0) {?> disabled="disable" <?php } ?> value='IMPORT'>
</form>
  </p>
  <script src="myscript.js"></script>
</body>
</html>