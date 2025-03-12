<?php
try {
    $con = mysqli_connect("localhost", "root", "", "noraml_user");
    // try {
    //     $q = "CREATE DATABASE IF NOT EXISTS `noraml_user`";

    //     if ($con->query($q)) {
    //         echo "Database Created Successfully";
    //     }
    // } catch (Exception $e) {
    //     echo "Error in Creating Database" . $e->getMessage();
    // }

    // // create Registration table

    //  if(is_file("registration")){

    //  }
    //  else{
    //     try {
    //         $registration = "CREATE TABLE `registration` (
    //   `id` int primary key AUTO_INCREMENT,
    //   `firstname` char(20) NOT NULL,
    //   `lastname` char(20) NOT NULL,
    //   `email` varchar(50) NOT NULL unique,
    //   `mobile` bigint NOT NULL,
    //   `password` varchar(30) NOT NULL,
    //   `profile_picture` varchar(100) NOT NULL DEFAULT 'default.jpg',
    //   `role` char(10)  NOT NULL DEFAULT 'User',
    //   `status` char(10) NOT NULL DEFAULT 'Inactive'
    // )";
    //         if ($con->query($registration)) {
    //             echo "Table Created Successfully";
    //         }
    //     } catch (Exception $e) {
    //         echo "Error in Creating Table" . $e->getMessage();
    //     }
    //  }
} catch (Exception $e) {
    echo "Error in Connecting with Database Server" . $e->getMessage();;
}
?>