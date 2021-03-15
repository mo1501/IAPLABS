<html> 
  <head>
    <link rel="stylesheet" href="stylesheet1.css"> 
  </head>
 
  <body> 
    <div class="div2">
    <h1>Welcome</h1> 
        <form  action="register.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br>
            <label for="password">Password:</label>
            <input type="text" id="pass" name="pass"><br>
            <label for="residence">City of residence:</label>
            <input type="text" id="res" name="res"><br>
            <div>
              <form method="POST" action="" enctype="multipart/form-data"> 
            <input type="file" name="uploadfile" value="" /> 
            <div> 
                <button type="submit" name="upload"> UPLOAD </button> 
            </div> 
            </form>
            </div>
            <button type="submit" name="register">Register</button> 
            
          </form>
        </div>
  </body>
</html>
