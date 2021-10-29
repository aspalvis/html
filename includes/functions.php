<?php
class email{
    public $email_addr;
    public $platform_id;
    public $platform_name;
    // Setting properties
    public function setData($email_addres)
    {
        require_once "db.php";
        require_once "config.php";
        
        $this->email_addr = $email_addres;
        $arr = explode('@',$email_addres);
        $this->platform_name = $arr[1];
        $sql="SELECT `platform_id` FROM `email_platform` WHERE `platform_name` = '$arr[1]';";
        $result = mysqli_query( $connection, $sql);
        $fetched=mysqli_fetch_assoc($result);
        $this->platform_id=$fetched['platform_id'];

        //Make record into platform table if values doesnt exists
        if ($this->platform_id == null) {
          $sql_pop_platform="INSERT INTO `email_platform` (`platform_id`,`platform_name`)
          VALUES (NULL,'$this->platform_name');";
            if ($connection->query($sql_pop_platform) === TRUE){
                $result = mysqli_query( $connection, $sql);
                $fetched=mysqli_fetch_assoc($result);
                $this->platform_id=$fetched['platform_id'];
            }else {
                echo "Error: " . $sql_pop . "<br>" . $connection->error;
            }
        }
    }
    //Populating email
    public function populateTables()
    {
      require "db.php";
      require "config.php";

      $sql_pop_email="INSERT INTO email (`em_id`, `address`, `platform_id`)
      VALUES (NULL,'$this->email_addr','$this->platform_id');";
          if ($connection->query($sql_pop_email) === TRUE){
                header("Location: http://andris-spalvis.magebithr.com/", true, 301);
                exit();
          }else {
              echo "Error: " . $sql_pop . "<br>" . $connection->error;
          }
    }

}
?>