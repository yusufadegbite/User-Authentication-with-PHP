<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $data = [$username, $email, $password];
    $file = fopen('../storage/users.csv', 'ra+');

    while ($row = fgetcsv($file)) {
        if ($row[1] == $email) {
            echo 'User already exists';
            exit();
        }
    }
    //write the data to a file
    fputcsv($file, $data);

    fclose($file);
    
    // echo "OKAY";
}
echo "User Successfully registered";


