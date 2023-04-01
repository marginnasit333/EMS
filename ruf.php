include 'classes/db1.php';     
                $INSERT="INSERT INTO participent (en,name,branch,sem,email,phone,college) VALUES('$en','$name','$branch',$sem,'$email','$phone','$college')";

                $INSERT.="INSERT INTO registered (en,event_id) VALUES('$en','$event_id')";

          
                if($conn->multi_query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='en.php';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this en');
                    window.location.href='en.php';
                    </script>";
                }
               
                $conn->close();