<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<html lang="en">
<head>
</head>
<div style = "text-align: center"id = "signup_form">
<h1>enQueue Registration</h1>
<form class="pure-form pure-form-aligned"role="form" method ="post" id = "signnup" action = "signupcheck.php">
    <fieldset>
        <div class="pure-control-group">
			<input id="name" name = "name" type="text" placeholder="First and Last Name">
        </div>

        <div class="pure-control-group">
            <input id="password" name = "password" type="password" placeholder="Password">
        </div>
		<div class = "pure-control-group">
			<input id= "password2" name = "password2"type = "password" placeholder = "Re-enter your Password">
	</div>	
        <div class="pure-control-group">
            <input id="email" name = "email" type="email" placeholder="SCU Gmail Address">
        </div>

            <button type="submit" name = "submit_signup"id = "submit_signup" class="pure-button pure-button-primary">Submit</button>
    </fieldset>
</form>
</div>
</html>
