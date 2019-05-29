<html>
    <head>
        <link rel="stylesheet" href="contactus.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        error_reporting(E_ERROR | E_PARSE);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["comments"])) { ?>
                    <span id="snackbar">Fill all the mandatory details</span>
                    <script>
                        function save(){
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        }save();
                    </script>
          <?php }
                else { ?>
                    <span id="snackbar">Your Response has been saved</span>
                    <script>
                        function save(){
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        }save();
                    </script>
             <?php  } 
             
            }?>
        <div id="container">
            <h2 style="color:rgb(50, 50,50)">Contact Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div>
                    name <span style="color:red;" title="this feild is required">*</span><br>
                </div><br>
                <input name="name" type="text" class="field" ><br>
                
                <div >
                    Email <span style="color:red;" title="this feild is required">*</span><br>
                </div><br>
                <input name="mail" type="email" class="field" >
                    <div id="aftermail" style="margin-top: -25px;">The content of this field is kept private and will not be shown publicly.
                </div><br>

                <div >
                    Subject
                </div><br>
                <input name="subjects" type="text" class="field" ><br>

                <div >
                    Comments <span style="color:red;" title="this feild is required">*</span>
                </div><br>
                <textarea name="comments" type="text" class="field" style="height:60px;" rows="5;" ></textarea><br>

                <button id="save" style="text-decoration: none;">save</button>
            </form>
        </div>
    <?php
    $username = $_POST["name"]   ;
    $mail     = $_POST["mail"]   ;
    $subject  = $_POST["subjects"];
    $comments = $_POST["comments"];

    $con = mysqli_connect("localhost","root","root123",'project');
   mysqli_query($con,"INSERT INTO project.details(user,email,subjects,comments)
        VALUES ('$username','$mail','$subject','$comments')");
    mysqli_close($con);
    // $to = "smaransshetty097@gmail.com";
    // $subject = "Registered users";
    // $body = "username : ".$username."\nemail : ".$mail."\nsubject : ".$subject."\ncomments : ".$comments; 
    // mail($to,$subject,$comments);
?>

</body>
</html>