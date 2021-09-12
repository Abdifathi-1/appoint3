<?php
class DB
{
    private $dbHost = "localhost";
    private $dbUsername = "ubuntu";
    private $dbPassword = "chronixx";
    private $dbName = "appoint";
    private $db;
    public function __construct($DB_con)
    {
        //Connect to the database
        try{
            $DB_con = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName,$this->dbUsername,$this->dbPassword);
            $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->db = $DB_con;
        }
        catch(PDOException $e)
        {
            die("Failed to Connect with MYSQL: " . $e->getMessage());
        }
    }
    /**
     * Test and clean input data
     */
    public function testinput($data)
    {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
    /**
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table,$data)
    {
        if(!empty($data) && is_array($data))
        {
            $columns = '';
            $values = '';
            $i = 0;
            if(!array_key_exists('created',$data))
            {
                $data['created_at'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified',$data))
            {
                $data['modified_at'] = date("Y-m-d H:i:s");
            }
            $columnString = implode(',',array_keys($data));
            $valueString = ":" .implode(',:',array_keys($data));
            $sql = "INSERT INTO ".$table." (".$columnString.") VALUES
            (".$valueString.")";
            $query = $this->db->prepare($sql);
            foreach($data as $key=>$val)
            {
                $query->bindValue(':'.$key,$val);
            }
            $insert = $query->execute();
            return $insert?$this->db->lastInsertId():false;
        }
        else
        {
            return false;
        }
    }
    public function checkRow($table,$conditions = array())
    {
        $sql = ' SELECT * FROM ' . $table;
        if(!empty($conditions) && is_array($conditions))
        {
            $columns = '';
            $values = '';
            $sql .= ' WHERE ';
            $keys = array_keys($conditions);
            for($i=0;$i<count($keys);$i++)
            {
                $pre = ($i > 0)?' OR ':'';
                $sql .= $pre . $keys[$i] .'=:' . $keys[$i];
          
            }
            $query = $this->db->prepare($sql);
            foreach($conditions as $key=>$val)
            {
                $query->bindValue(':'.$key,$val);
            }
            $query->execute();
            
            return $query->rowCount();
        }
    }
/**
 * Update data into the database
 * @param string name of the table
 * @param array the data for updating into the table
 * @param array where condition on updating data
 */
    public function update($table,$data,$conditions)
    {
        if(!empty($data) && is_array($data))
        {
            $colvalset= '';
            $whereSql= '';
            $i = 0;
            if(!array_key_exists('modified_at',$data))
            {
                $data['modified_at'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val)
            {
                $pre = ($i > 0)?', ':'';
                $colvalset .=$pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions) && is_array($conditions))
            {
                $whereSql .=' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value)
                {
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .=$pre.$key."='".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalset.$whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update?true:false;
        }
        else
        {
            return false;
        }

    }
    public function add_record($ref,$signs,$lab_results,$prescriptions,$disease,$doctor,$visibility)
	{
		try
		{
			
			
			$stmt = $this->db->prepare("INSERT INTO records_history(ref,signs,lab_results,prescriptions,disease,doctor,hidden)
		                                               VALUES(:ref,:signs,:lab_results,:prescriptions,:disease,:doctor,:hidden)");

			$stmt->bindparam(":ref", $ref);
			$stmt->bindparam(":signs", $signs);
			$stmt->bindparam(":lab_results", $lab_results);
			$stmt->bindparam(":prescriptions", $prescriptions);
			$stmt->bindparam(":disease", $disease);
			$stmt->bindparam(":doctor", $doctor);
			$stmt->bindparam(":hidden", $visibility);
			$stmt->execute();

			return $stmt;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
    public function login($umail,$upass)
	{
		try
		{
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:ema  LIMIT 1");
         
		    $stmt->bindParam(":ema",$umail);
			$stmt->execute();
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            // $tableName= 'users';
            // $userData = array(
            //     'verified' => 1
            // );
            // $conditions = array(
            //     'email' => $umail
            // );
            // $update = $this->update($tableName,$userData,$conditions);
			if($stmt->rowCount() > 0)
			{
				if(password_verify($upass,$userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['email'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

}
?>