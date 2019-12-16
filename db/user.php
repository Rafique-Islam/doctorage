<?php

    class user
    {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username, $password, $fname, $lname, $email, $gender, $address, $image)
        {
            try
            {
                $result = $this->getUserByUserName($username);

                if ($result['num'] > 0)
                {
                    return false;
                }
                else
                {
                    $newusername = strtolower(trim($username));
                    $newpassword = strtolower(trim($password));
                    $new_password = md5($newpassword.$newusername);
                   
                    $sql = "INSERT INTO users(username, password, FirstName, LastName, Address, genderId, EmailAddress, UserPhoto)
                                VALUES (:user, :pass, :fname, :lname, :address, :gender, :email, :photo)";

                    if (empty($image))
                    {                    
                        $image = 'NULL';
                    }
                                        
                    $stmt = $this->db->prepare($sql);

                    $stmt->bindparam(':user', $username);
                    $stmt->bindparam(':pass', $new_password);
                    $stmt->bindparam(':fname', $fname);
                    $stmt->bindparam(':lname', $lname);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':gender', $gender);
                    $stmt->bindparam(':address', $address);
                    $stmt->bindparam(':photo', $image);

                    $stmt->execute();
                    return true;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getUser($username, $password)
        {
            try
            {               
                $sql = "SELECT * FROM users WHERE username = :user AND password = :pass";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':user', $username);
                $stmt->bindparam(':pass', $password);
                $result = $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }


        public function getUserByUserName($username)
        {
            try
            {
                $sql = "SELECT COUNT(*) as num FROM users WHERE username = :user";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':user', $username);
                $result = $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }
    }

?>