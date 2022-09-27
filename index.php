<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 1-3</title>

    <!-- WEBSITE ICON -->
    <link rel="icon" href="Static/Imgs/webicon.svg">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        @font-face {
    font-family: Mont-SB;
    src: url(Static/Fonts/Montserrat-SemiBold.ttf);
    }

    @font-face {
        font-family: Mont-Black;
        src: url(Static/Fonts/Montserrat-Black.ttf);
    }
    </style>
</head>
<body>

<!------------------------- START -- ACTIVITY ONE ------------------------> 
<?php

$philhealth = 354.85;
$pag_ibig = 100.00;
$sss = 581.30;
$errSal = "";
$salary = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (empty($_POST['salary'])){
        $errSal = "<span 
                        style='color:red;
                        font-style: italic;
                        '>Salary is required.
                    </span>";
    }
    else{
        $salary = $_POST['salary'];
        $_SESSION['salary']=$salary;
    }
}
?>

<section class="act-one-h text-start d-flex align-items-center" id="act1">
    <div class="container act-one" id="act-one">
        <div class="employee-sal">
            <h1>NET INCOME <br>CALCULATOR</h1>
            <p class="mb-2">Enter Employee’s Salary:</p>
            <form method = "post">
            <table border = "0">
            <div class="input-group mb-3"> 
                <input type="number" step="0.01" name="salary" class="form-control" placeholder="0.00" autocomplete="off" value="<?php if(isset($_POST['salary'])){echo $_POST['salary'];}?>">
            </div>
            <div class="error mb-3">
                <?php echo $errSal;?>
            </div>
            <input type="submit" name="submit" value="CALCULATE"   class="btn btn-primary mb-3">
            </form>
        </div>
    </div>
</section>

    
<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    if(!empty($_POST['salary'])){
        $gross = $_POST['salary'];

        $deduc = $gross - $philhealth - $pag_ibig - $sss;
        $tax = 0.0318 * $deduc; 
    
        $net = $deduc - $tax;
        $net = number_format($net, 2, '.', '.');

        // echo "<br>";
        // echo "Philhealth :" . $philhealth . "<br>". "Pag-Ibig :". $pag_ibig . "<br>". "SSS :". $sss . "<br>". "Tax:" . number_format($tax, 2, '.', '.');
        // echo "<br>";
        // echo "<br>";
        echo "<p style='font-size: 1.25rem; font-family: Mont-SB; margin-top:1.5rem;'>CALCULATED NET INCOME:</p>";
        echo '<h2 style="font-size: 5rem; font-family: Mont-Black;">'.$net.'</h2>';
    }
}
?>
<!------------------------- END -- ACTIVITY ONE ------------------------>

<!------------------------- START -- ACTIVITY TWO-THREE ------------------------> 
<?php 
if (empty($_POST['name'])){
    $errName = "<span 
                    style='color:red;
                    font-style: italic;
                    '>Name is required.
                </span>";
}
else{
    $employee = $_POST['name'];
    $_SESSION['name']=$name;
}

if (empty($_POST['employee'])){
    $errEmp = "<span 
                    style='color:red;
                    font-style: italic;
                    '>Employee Number is required.
                </span>";
}
else{
    $employee = $_POST['employee'];
    $_SESSION['employee']=$employee;
}

if (empty($_POST['address'])){
    $errAdd = "<span 
                    style='color:red;
                    font-style: italic;
                    '>Name is required.
                </span>";
}
else{
    $address = $_POST['address'];
    $_SESSION['address']=$address;
}

if (empty($_POST['place'])){
    $errPlace = "<span 
                    style='color:red;
                    font-style: italic;
                    '>Birth place is required.
                </span>";
}
else{
    $place = $_POST['place'];
    $_SESSION['place']=$place;
}
?>

<div class="act-two-three-h d-flex align-items-center" id="act23">
    <div class="container act-two-three">
        <div class="registration">
            <h1>REGISTRATION <br>FORM</h1>
            <div class="row">
                <div class="col">
                <form  method="POST">
                    <div class="input-group mb-3 "> 
                        <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off" require >
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="text" name="employee" class="form-control" placeholder="Employee Number" autocomplete="off" require>
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="text" name="address" class="form-control" placeholder="Address" autocomplete="off" require >
                    </div>
                    <!-- <div class="input-group mb-3"> 
                        <input type="text" name="bday" class="form-control" placeholder="Birthday" autocomplete="off">
                    </div> -->
                    <div class="birthday">
                        <div class="select-btn">
                            <p class="bday-title mb-2">Birthday (MM-DD-YYYY)</p>
                            <select name="month">
                                <?php 
                                    for($m=1; $m<=12; $m++)
                                    {
                                        echo "<option >$m</option>";
                                    }
                                ?> 
                            </select>   
                            <select name="day">
                                <?php 
                                    
                                    for($d=1; $d<=31; $d++){
                                        echo "<option>$d</option>";
                                    }
                                ?> 
                            </select>  
                            <select name="year">
                                    <?php 
                                        for($y=1972; $y<=2022; $y++){
                            
                                            echo "<option>$y</option>";
                                        }
                                    ?> 
                            </select>  
                        </div>
                    </div>  
                    <?php
                    echo $bday;
                    echo"<br>";
                    $bday;
                    $Month = $_POST['month'];
                    $Day = $_POST['day'];
                    $Year = $_POST['year'];

                    if($Month % 2 == 0){
                        if($Month == 2 && $Day > 28){
                        $bday = "February has 28 days only. Please enter a valid birthday.";
                        echo $bday;


                        }elseif ($Day > 30){
                        $bday = "This month has 30 days only. Please enter a valid birthday.";
                        echo $bday;

                        }else{
                        $bday = $Month .", ". $Day . ", ". $Year;
                        }
                        
                    }else{
                        $bday = $Month .", ". $Day . ", ". $Year;
                    }                                   
                    ?>
                    <div class="input-group mb-3"> 
                        <input type="text" name="place" class="form-control" placeholder="Birth Place" autocomplete="off" >
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="number" name="contact" class="form-control" placeholder="Contact Number" autocomplete="off" >
                    </div>
                    <div class="input-group mb-3"> 
                        <input type="email" name="email" class="form-control" placeholder="Email Address" autocomplete="off" >
                    </div>
                    <input type="submit" name="register" value="REGISTER" class="btn btn-primary mb-3">
                </form>
                </div>
                <div class="col mt-0">
                <?php
                echo "<br>";
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">NAME: </h2> '.$name.'';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">EMPLOYEE NO.: '.$employee.'</h2>';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">ADDRESS: '.$address.'</h2>';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">BIRTHDAY: '.$address.'</h2>';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">BIRTH PLACE: '.$place.'</h2>';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">CONTACT NO.: '.$contact.'</h2>';
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">EMAIL ADDRESS: '.$email.'</h2>';
                echo "<br>";
                echo "<br>";
                
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">PHILHEALTH:</h2> '. $philhealth .''; 
                echo '<h2 style="font-size: 1rem; font-family: Mont-SB;">PAG-IBIG:</h2> '. $pag_ibig .''; 
                "<br>". "Pag-Ibig :". $pag_ibig . 
                "<br>". "SSS :". $sss . 
                "<br>". "Tax:" . number_format($tax, 2, '.', '.');
                echo "<br>";
                echo "<br>";
                echo "<p style='font-size: 1.25rem; font-family: Mont-SB; margin-top:1.5rem;'>NET INCOME:</p>";
                echo '<h2 style="font-size: 3rem; font-family: Mont-Black;">'.$net.'</h2>'
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------- END -- ACTIVITY TWO-THREE ------------------------> 
</body>
</html>