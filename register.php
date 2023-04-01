
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Event Management System</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
    </head>
    <body>
    <?php require 'utils/header.php'; ?>

    <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">  
        <label>Student En:</label><br>
        <input type="text" name="en" class="form-control" required><br><br>

        <label>Student Name:</label><br>
        <input type="text" name="name" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="branch" class="form-control" required><br><br>

        <label>Semester:</label><br>
        <input type="text" name="sem" class="form-control" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"  class="form-control" required ><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"  class="form-control" required><br><br>

        <label>College:</label><br>
        <input type="text" name="college"  class="form-control" required><br><br>

        <label>Event ID:</label><br>
        <input type="number" name="event_id" class="form-control" required><br><br>

        <button type="submit" name="update" required>Submit</button><br><br>
        <a href="en.php" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>

<?php

    if (isset($_POST["update"]))
    {
        $en=$_POST["en"];
        $name=$_POST["name"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];
        $event_id=$_POST["event_id"];


        if( !empty($en) || !empty($name) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) || !empty($event_id))
        {
        
            include 'classes/db1.php';
        
        
   
            $INSERT="INSERT INTO participent (en,name,branch,sem,email,phone,college) VALUES('$en','$name','$branch',$sem,'$email','$phone','$college');";
    
                $INSERT.= "INSERT INTO registered (en,event_id) VALUES('$en','$event_id');";
                
    
            if($conn->multi_query($INSERT)===True){
              echo "<script>
              alert('Registered Successfully!');
              window.location.href='en.php';
              </script>";
            }
            else
            {
              echo"<script>
              alert(' Already registered this En');
              window.location.href='en.php';
              </script>";
            }
         
            $conn->close();
          
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>