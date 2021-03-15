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
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setResidence($residence){
        $this->residence = $residence;
    }
    public function getResidence(){
        return $this->residence;
    }

public function register($pdo){
        $passwordHash = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        try{
        $stmt = $pdo->prepare ("INSERT INTO Registration (Full_Name,Email,Residence,Password) VALUES(?,?,?,?)");
        $stmt->execute([$this->getName(),$this->getEmail(),$this->getResidence(),$passwordHash]);
        return "Registration was successful";
        }
        catch (PDOException $e){
            return $e->getMessage();
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
                if (password_verify($this->getPassword(),$row['Password']))
                { 
                    
                    echo '<script>window.location.href="homepage.html"</script>';  
                                   
                } 
                else
                { 
                    echo '<script>alert("Email or password is not correct")</script>';              
                    echo '<script>window.location.href="lLogin.html"</script>';
                } 
            } 
            catch (PDOException $e) 
            {            	
                return $e->getMessage();            
            }        
        }

}


?>