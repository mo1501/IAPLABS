<?php

Interface Account 
{
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
}
class User{
    protected $name;
    protected $email;
    protected $password;
    protected $password1;
    protected $password2;
    protected $residence;
    //getters and setters
    public function setName ($name)
    {
        $this->name = $name;
    }
    public function getName ()
    {    
        return $this->name;   
    }
    public function setEmail($email){
        $this->$email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function setPassword1($password1){
        $this->password = $password1;
    }
    public function setPassword2($password2){
        $this->password = $password2;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPassword1(){
        return $this->password1;
    }
    public function getPassword2(){
        return $this->password2;
    }
    public function setResidence($residence){
        $this->residence = $residence;
    }
    public function getResidence(){
        return $this->residence;
    }

public function register($pdo){
        $passwordHash = password_hash($this->getPassword1(),PASSWORD_DEFAULT);
        try{
        $sql= 'INSERT INTO Registration (Full_Name, Email, Residence, Pass) VALUES(?,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->getName(),$this->getEmail(),$this->getResidence(),$passwordHash]);
        echo "<script>alert('Registration was Successful');window.location.href = 'homepage.php'</script>";
        }
        catch (PDOException $e){
            return $e->getMessage();
            echo "error";
        }
        }
public function login ($pdo)
        {            
            try 
            {   
                             
                $stmt = $pdo->prepare("SELECT Password FROM users WHERE Email=?");                
                $stmt->execute([$this->getEmail()]);                
                $row = $stmt->fetch();              
                if($row == null)
                {    
                    echo '<script>alert("Account does not exist")</script>';            	
                    echo '<script>window.location.href="lLogin.html"</script>';                
                }                
                if (password_verify($this->getPassword1(),$row['Password']))
                { 
                    
                    echo '<script>window.location.href="homepage.html"</script>';  
                                   
                } 
                else
                { 
                    echo '<script>alert("Email or password is not correct")</script>';              
                    echo '<script>window.location.href="loginpage.php"</script>';
                } 
            } 
            catch (PDOException $e) 
            {            	
                return $e->getMessage();            
            }        
        }
        public function changePassword ($pdo)
        {
           try 
            {
                include_once 'processLogin.php';               
                $stmt = $pdo->prepare("SELECT Password FROM users where Email = '".$_SESSION["email"]."'");
                $stmt->execute();                 
                $row = $stmt->fetch();              
                if(empty($this->getPassword1()) || empty($this->getPassword1()) || empty($this->getPassword2()))
                {
                      echo '<script>alert("Fill in the blanks")</script>';
                      echo '<script>location.href="ChangePassword.php"</script>';
                }
                if($this->getPassword1() != $this->getPassword2())
                {
                    echo '<script>alert("New passwords do not match!")</script>'; 
                }   
                if (password_verify($this->getPassword1(),$row['Password']))
                {   
                    $passwordHash1 = password_hash($this->getPassword1(),PASSWORD_DEFAULT);
                    try 
                    {
                        $stmt1 = $pdo->prepare ("UPDATE users set Password = '".$passwordHash1."' where Email = '".$_SESSION["email"]."'");
                        $stmt1->execute();
                        
                        echo '<script>alert("Password changed successsfully!!")</script>';
                        echo '<script>location.href="ChangePassword.php"</script>';
                    } 
                    catch (PDOException $e) 
                    {            	
                        return $e->getMessage();            
                    } 	
                                   
                }
                else
                {
                    return "Current Password is not Correct!!";
    
                }
    
                
            } 
            catch (PDOException $e) 
            {            	
                return $e->getMessage();            
            }                    
        }
        

}


?>