<html> 
  <head>
    <link rel="stylesheet" href="stylesheet1.css"> 
  </head>
 
  <body> 
    <div class="changepassword">
    <h1>Password Reset</h1> 
        <form  action="changepass.php" method="POST">
            <label for="Password1">Old Password:</label>
            <input type="text" id="Password1" name="Password1"><br>
            <label for="Password2">New Password:</label>
            <input type="text" id="Password2" name="Password2"><br>
            <button type="submit" name="submitpasswords">Update Password</button> 
            
          </form>
        </div>
  </body>
</html>
