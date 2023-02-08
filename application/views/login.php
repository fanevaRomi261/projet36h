<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <title>log in</title>
</head>
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
        console.log(event.target.responseText);
        msg=(JSON.parse(event.target.responseText));
        
        if(msg.statuscode==200){
                window.location.href="<?php echo base_url('home');?>";
        }
        else{
            document.getElementById("message").innerHTML="misy diso fa avereno fa azafady";
        }
   
    });


    xhr.open("POST", "<?php echo base_url('verify/verifyLogin');?>");
    xhr.send(formData);
}

    var form = document.getElementById("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        sendForm();
    });

});
    
    </script>


<body>
    <div class="lehibe">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url('assets/images/signin-image.jpg'); ?>" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in(Admin)</h2>
                        <form method="POST" class="register-form" id="form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" value="admin" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" value="1234" placeholder="Password"/>
                            </div>
                            <p id="message" style="color: red;"></p>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                        <div class="social-login">

                            <p><span class="social-label"><a href="<?php echo base_url('usercontroller/signup'); ?>" class="signup-image-link">sign up</a></span></p>
                        </div>
                        <p><a href="<?php echo base_url('usercontroller/client'); ?>" class="signup-image-link">login client</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>