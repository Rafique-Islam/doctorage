<?php

    class crud
    {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insert($fname, $lname, $dob, $email, $contact, $specialty)
        {
            try
            {
                $sql = "INSERT INTO attendees(firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id)
                        VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);

                $stmt->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $address, $gender)
        {
            try
            {
                $sql = "UPDATE `users` SET `firstname` = :fname, `lastname` = :lname, `Address` = :address, 
                        `genderId` = :gender
                        WHERE `id` = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':address', $address);
                $stmt->bindparam(':gender', $gender);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getUerUploadedFiles($id)
        {
            try
            {
                $sql = "SELECT * FROM fileupload WHERE `UserId` = :id AND IsDeleted = 'false'";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getSpecialties()
        {
            try
            {
                $sql = "SELECT * FROM gender";
                $result = $this->db->query($sql);
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getSubscribersDetails($id)
        {
            try
            {
                $sql = "SELECT * FROM users WHERE `id` != :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getAttendeeDetails($id)
        {
            try
            {
                $sql = "SELECT * FROM users WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
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

        public function getAdminDetails($id)
        {
            try
            {
                $sql = "SELECT * FROM users a INNER JOIN gender s ON a.genderId = s.GenerId WHERE a.id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
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

        public function deleteFile($id, $isdeleted)
        {
            try
            {
                $sql = "UPDATE `fileupload` SET `IsDeleted` = :deletevalue
                WHERE `FileUploadId` = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':deletevalue', $isdeleted);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function deleteUser($id)
        {
            try
            {
                $sql = "DELETE FROM `Users` WHERE `id` = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function RecordFileUpload($filename, $userid, $importdate, $savedestination, $isdeleted)
        {
            try
            {
                $sql = "INSERT INTO `fileupload`(`FileName`, `UserId`, `TimeOfUpload`, `FilePath`, `IsDeleted`) 
                        VALUES (:uploadedfilename, :user, :uploadtime, :savedpath, :filestatus)";
                
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':uploadedfilename', $filename);
                $stmt->bindparam(':user', $userid);
                $stmt->bindparam(':uploadtime', $importdate);
                $stmt->bindparam(':savedpath', $savedestination);
                $stmt->bindparam(':filestatus', $isdeleted);

                $stmt->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getmessage();
                return false;
            }
        }

        public function getUserByEmailAddress($emailAddress)
        {
            try
            {
                $sql = "SELECT COUNT(*) as num FROM users WHERE EmailAddress = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $emailAddress);
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