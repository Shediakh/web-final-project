<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
    <link rel="stylesheet" href="./css/sp.css" type="text/css">
<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Log in to get the best manoushe experience!</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form action="BE/controllers/login.php" method="post" enctype="multipart/form-data">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="text" name="username" placeholder="Username" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <div><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            Not a user? <a href="signup.html"> Sign up</a>
                        </div><br>
                        <input class="button" type="submit" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>