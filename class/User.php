<?php    
 class User
 {


    private $userId;
    private $firstName;
    private $lastName;
    private $birthday;
    private $email;
    private $maggiorenne;




    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }



    public function GetAge()
    {
        $dataDiNascita=$this->getBirthday();
        $b_day= new DateTime($dataDiNascita);
        $Oggi= new DateTime();
        $result=$Oggi->diff($b_day);
        
       return $result->format('%y');
    }

    public function isAdult()
    {
        $eta=$this->GetAge();
        return $eta>18;
    }
   

    /**
     * Get the value of maggiorenne
     */ 
    public function getMaggiorenne()
    {
        return $this->maggiorenne;
    }

    /**
     * Set the value of maggiorenne
     *
     * @return  self
     */ 
    public function setMaggiorenne($maggiorenne)
    {
        $this->maggiorenne = $maggiorenne;

        return $this;
    }


 
 }


 






?>