<html>
    <head>
        <title>SignUp</title>
        <link href="../../../public/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../../public/stylesheets/main.css" rel="stylesheet" type="text/css">
        <link href="../../../public/stylesheets/style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="signup-image col-sm-6">
                <img src="../../../public/images/signup.png" style="width:550px; height:550px" alt="abc">
            </div>
            <div class=" signup-form col-sm-6">
                <div class="main">

                    <div  class="wrap">
                        <div class="Regisration">
                            <div class="Regisration-head">
                                <h2 class="Regisration-letter"> WELCOME TO <span style="color: #ff6500">CAS</span>
                                    <br><span style="font-size: 20px"> USER REGISTRATION</span></h2>
                            </div>
                            <form>
                                <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" >
                                <input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
                                <input type="text" value="NIC Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NIC Number';}" >
                                <input type="text" value="Title" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Title';}" >
                                <input type="text" value="Mobile Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mobile number';}" >
                                <!--<input type="password" value=" Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = ' Confirm Password';}" >-->
                                <div class="Remember-me">
                                    <!--div class="p-container">
                                        <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>I agree to the Terms and Conditions</label>
                                        <div class ="clear"></div>
                                    </div>-->
                                    <img src="captcha_code_file.php?rand=<?php echo rand(); ?>"
                                         id="captchaimg" >
                                    <label for="message" ></label><br>
                                    <input id="6_letters_code" value="Enter the code above here " name="6_letters_code" type="text">
                                    <div class="submit" style="margin-left:40%;height: 50px">
                                        <input type="submit" onclick="myFunction()" value="Sign Up" >
                                    </div>
                                     <div class="clear"> </div>
                                </div>

                            </form>
                        </div>
                       <!--<div class="Login">
                            <div class="Login-head">
                                <h3>LOGIN</h3>
                            </div>

                            <form>
                                <div class="ticker">
                                    <h4>Username</h4>
                                    <input type="text" value="John Smith" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'John Smith';}" ><span> </span>
                                    <div class="clear"> </div>
                                </div>
                                <div>
                                    <h4>Username</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
                                    <div class="clear"> </div>
                                </div>
                                <div class="checkbox-grid">
                                    <div class="inline-group green">
                                        <label class="radio"><input type="radio" name="radio-inline"><i> </i>Remember me</label>
                                        <div class="clear"> </div>
                                    </div>

                                </div>

                                <div class="submit-button">
                                    <input type="submit" onclick="myFunction()" value="LOGIN  >" >
                                </div>
                                <div class="clear"> </div>
                        </div>

                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>