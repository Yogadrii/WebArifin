<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login berhasil!";
           
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Email tidak terdaftar!";
    }

    $conn->close();
}
?>
