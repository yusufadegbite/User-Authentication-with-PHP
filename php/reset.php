<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password

    $file = fopen('../storage/users.csv', 'r');
    while (!feof($file)) {
        $line = fgetcsv($file);
        if ($line[1] = $email) {
            $line[2] = $password;
            fclose($file);
            $file = fopen('../storage/users.csv', 'w');
            fputcsv($file, $line);
            fclose($file);
            echo "Password rest successfully";
            exit();
        }
    }
}
echo "<h2 style='color: red'>Invalid username or password</h2>";
    //close the file
    fclose($file);

