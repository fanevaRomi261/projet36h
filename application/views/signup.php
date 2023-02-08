<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>sign up</title>
</head>
<body>
    <script type="text/javascript">
        window.addEventListener("load",function(){

        function sendForm(){
            var xhr; 
            try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
            catch (e) 
            {
                try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
                catch (e2) 
                {
                try {  xhr = new XMLHttpRequest();  }
                catch (e3) {  xhr = false;   }
                }
            }

            var formData = new FormData(form);


            xhr.addEventListener("load",function(event){
                var msg=event.target.responseText;

                var p=document.getElementById("mess");
                if(msg == "mety"){
                    p.style.color="green";
                    p.innerHTML="succes";

                    document.getElementById("nom").value="";
                    document.getElementById("pass").value="";
                } else {
                    p.style.color="red";
                    p.innerHTML=msg;
                }
            });

            xhr.open("post", "../verify/insertUser");
            xhr.send(formData);
        }

        var form = document.getElementById("form");

        form.addEventListener("submit", function (event) {
            event.preventDefault();
            sendForm();
        });

        });


    </script>
    <div class="lehibe">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" id="form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="nom" placeholder="Your Name"/>
                            </div>
                            <!-- <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Your Email"/>
                            </div> -->
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <p id="mess"></p>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" class="form-submit" value="Register"/>
                            </div>
                            <p><a href="<?php echo base_url('usercontroller'); ?>" class="signup-image-link">log in(admin)</a></p>
                            <p><a href="<?php echo base_url('usercontroller/client'); ?>" class="signup-image-link">log in(client)</a></p>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../assets/images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>