<?php
    class crud {
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        public function insert($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                $sql = "INSERT INTO attendee(firstname, last_name, dateofbirth, emailaddress, contactnumber, specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                $stmt = $this -> db -> prepare($sql);

                //to link/bind value to the sql string
                $stmt -> bindparam(':fname',$fname);
                $stmt -> bindparam(':lname',$lname);
                $stmt -> bindparam(':dob',$dob);
                $stmt -> bindparam(':email',$email);
                $stmt -> bindparam(':contact',$contact);
                $stmt -> bindparam(':specialty',$specialty);

                //to execute the statement
                $stmt -> execute();
                return true;

            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }

        }

        public function getAttendees() {
            try {
                $sql = "SELECT * FROM attendee AS a INNER JOIN specialty AS s ON a.specialty_id = s.specialty_id ORDER BY a.attendee_id";
                $result = $this -> db -> query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }
            
        }

        public function getAttendeeDetail($id) {
            try {
                $sql = 'SELECT * FROM attendee AS a INNER JOIN specialty AS s ON a.specialty_id = s.specialty_id WHERE a.attendee_id = :id' ;
                $stmt = $this -> db -> prepare($sql);
                $stmt -> bindparam(':id',$id);
                $stmt -> execute();
                $result = $stmt -> fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }
        }

        public function getSpecialties() {
            try {
                $sql = "SELECT * FROM specialty";
                $result = $this -> db -> query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }
        }


        public function updateAttendeeDetails($id,$fname, $lname, $dob, $email, $contact, $specialty) {
            try {
                $sql = "UPDATE attendee SET firstname = :fname, last_name = :lname, dateofbirth = :dob, emailaddress = :email, contactnumber = :contact, specialty_id = :specialty WHERE attendee_id = :id";
                $stmt = $this -> db -> prepare($sql);
                $stmt -> bindparam(':id',$id);
                $stmt -> bindparam(':fname',$fname);
                $stmt -> bindparam(':lname',$lname);
                $stmt -> bindparam(':dob',$dob);
                $stmt -> bindparam(':email',$email);
                $stmt -> bindparam(':contact',$contact);
                $stmt -> bindparam(':specialty',$specialty);
                $stmt -> execute();
                return true;
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }

        }


        public function deleteAttendee($id) {
            try {
                $sql = 'DELETE FROM attendee WHERE attendee_id = :id' ;
                $stmt = $this -> db -> prepare($sql);
                $stmt -> bindparam(':id',$id);
                $stmt -> execute();
                return true;
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }
            
        }

    }
?>