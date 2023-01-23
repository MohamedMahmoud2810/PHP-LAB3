<?php
        
        $name = $email = $group = $details = $gender = $agree = "" ;
        $nameErr = $emailErr = $groupErr = $detailsErr = $genderErr = $agreeErr = "";

        // validate user data in form
        if($_SERVER["REQUEST_METHOD"]== "POST"){

            if(empty($_POST["name"])){
                $nameErr = "Name is required";
            }else{
                $yourName = "Your Name is : ";
                $name = validate_data($_POST["name"]);
                if(preg_match("/[a-zA-Z' ]*$/",$name)){
                    $nameErr = "Enter Only Charaters And White Space";
                }
            }

            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            }else{
                $yourEmail = "Your Email is : ";
                $email = validate_data($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if(empty($_POST["group"])){
                $groupErr = "";
            }else{
                $yourGroup = "Your Group is : ";
                $group = validate_data($_POST["group"]);
            }

            if(empty($_POST["details"])){
                $detailsErr = "";
            }else{
                $yourDetails = "Your Details is : ";
                $details = validate_data($_POST["details"]);
            }

            if(empty($_POST["gender"])){
                $genderErr = "gender is required";
            }else{
                $yourGender = "Your Gender is : ";
                $gender = validate_data($_POST["gender"]);
            }

            if(empty($_POST["agree"])){
                $agreeErr = "agree is required";
            }else{
                $yourStatus = "Your Status is : ";
                $agree = validate_data($_POST["agree"]);
            }


        
        
        }



        // Handle User Data
        function validate_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .required{
            color:red;
        }
        .data{
            width:300px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
    
    

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
    <legend>Student Data</legend>
        <center>


        Name: <input type="text" name="name" class="data" value="<?php echo $name?>">
        <span class="required">* <?php echo $nameErr?> </span>
        <br><br>


        E-mail: <input type="text" name="email" class="data" value="<?php echo $email?>">
        <span class="required">* <?php echo $emailErr?> </span>
        <br><br>


        Group #  <input type="text" name="group" class="data" value="<?php echo $group?>">
        <span class="required">* <?php echo $groupErr?> </span>
        <br><br>


        Class Details: <textarea name="details" rows="5" cols="40"><?php echo $details?></textarea>
        <br><br>


        Gender:
            <input type="radio" name="gender" value="female" 
            <?php if (isset($gender) && $gender=="female") echo "checked";?>>
            Female
            
            <input type="radio" name="gender" value="male" 
            <?php if (isset($gender) && $gender=="male") echo "checked";?>>
            Male
            
        <span class="required">* <?php echo $genderErr?> </span>
        <br><br>




        Select Courses:
        <select name="courses[]" size="4" multiple tabindex="1">
            <option value="PHP">PHP</option>
            <option value="Java Script">java script</option>
            <option value="MYSQL">MYSQL</option>
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>
            <option value="JQUERY">JQUERY</option>
        </select>
        <br><br>
        <input type="checkbox"  name="agree" value="agreed" >
        <span class="required">* <?php echo $agreeErr?> </span>
        <br><br>
        <input class="sybmit" type="submit" name="submit" value="Submit">


        

            
            <?php
            //Display data of user in page
                echo "<h2>Your Input:</h2>";
                echo $yourName.$name;
                echo "<br>";
                echo $yourEmail.$email;
                echo "<br>";
                echo $yourGroup.$group;
                echo "<br>";
                echo $yourDetails.$details;
                echo "<br>";
                echo $yourGender.$gender;
                echo "<br>";
                echo $yourStatus.$agree;
                echo "<br>";
                if(isset($_POST["submit"]))
                {

                    if(isset($_POST["courses"])){
                        foreach ($_POST['courses'] as $courses) 
                            print $courses." " ;
                    }else{
                        echo "select an option first ! ";
                    }
                }
            ?>
        </center>
        </fieldset>
    </form>
    
</body>
</html>

