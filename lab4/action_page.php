      <?php
      $subject = array();
      $score = array();
      
      $file = fopen($_POST['filename'],"r");
      $i = 0;
      while(($row = fgetcsv($file,0,","))!== FALSE)
        {
          if($i != 0 ){
            $subject[] = $row[0];
            $score[] = $row[1];
          }
          $i++;
        }
      fclose($file);
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css">
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

<div class="table">
  <table  class="table" style="width:90%;text-align:center;width:70%; margin-left:15%; margin-right:15%" >
    <thead>
      <tr>
      <th>Subject</th>
      <th>Score</th>  
      </tr>
    </thead>
    <tbody>
    <?php
      $subject = array();
      $score = array();
      
      $file = fopen($_POST['filename'],"r");
      $i = 0;
      $sum = 0;
      while(($row = fgetcsv($file,0,","))!== FALSE)
        {
          if($i != 0 ){
            $subject[] = $row[0];
            $score[] = $row[1];
            $sum = $sum + $row[1];
          }
          $i++;
        }
        for($j=0 ; $j<$i-1 ; $j++){
          echo"<tr>";
          echo"<th> $subject[$j]";
          echo"<th> $score[$j]";
          echo"</th></tr>";
        }
      fclose($file);
      ?>
      
    </tbody>
  </table>
</div>
<?php
        $max = 0;
        $maxstr = "";
        $min = 100;
        $minstr = "";
        $avg = $sum/count($subject);
      for($i=0;$i<count($score);$i++){
        if($score[$i] > $max){
          $max = $score[$i];
        }
        if($score[$i] < $min){
          $min = $score[$i];
        }
      }
      for($i=0;$i<count($score);$i++){
        if($score[$i]==$min){
          $minstr = $subject[$i]."  ".$minstr;
        }
        if($score[$i]==$max){
          $maxstr = $subject[$i]."  ".$maxstr;
        }
      }
      ?>
      <h2 style="text-align:center">MAXIMUM SCORE<h2>
      <p class = "outputmax" style="background-color: #d29fd2;border: 3px solid black;color: #54548f;text-align:center;width:70%; margin-left:15%; margin-right:15%" >
        
        <?php
          echo"$maxstr   ";
          echo"= $max<br>";

        ?>
      </p>
      <h2 style="text-align:center">MINIMUM SCORE<h2>
      <p class = "outputmin"  style="background-color: #a4abd9;border: 3px solid black;color: #3b6a1d;;text-align:center;width:70%; margin-left:15%; margin-right:15%">
        <?php
          echo"$minstr   ";
          echo"= $min<br>";
        ?>
      </p>
      <h2 style="text-align:center">AVERAGE SCORE<h2>
      <p class = "outputavg"  style="background-color: #cadbb0;border: 3px solid black;color:#0000AA;text-align:center;width:70%; margin-left:15%; margin-right:15%">
      <?php
      echo"AverageScore = $avg<br>";
      ?>  
      </p>
    </body>
</html>
