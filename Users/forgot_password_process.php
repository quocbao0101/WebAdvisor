<?php
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'binspike@gmail.com';                     // SMTP username
        $mail->Password   = '0914276259';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('binspike@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'Mã OTP của bạn là : '.$code.'.';

        include "../database/data.php"; 

        if($conn->connect_error) {
            die('Không thể kết nối tới CSDL.');
        }
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $verifyQuery = mysqli_query($conn,$sql);
        

        if(mysqli_num_rows($verifyQuery)) {
            $sql1 = "UPDATE users SET code = '$code' WHERE email = '$email'";
            $codeQuery = mysqli_query($conn ,$sql1);
            $mail->send();
            echo "<script>
                    alert('Mã OTP đã gửi đến email của bạn vui lòng xác nhận.');
                    window.location.href='otp.php?email=$email';
            </script>";

        }
        else {
            echo "<script>
                    alert('Email của bạn chưa đăng ký.');
                    window.location.href='forgot_password.php';
            </script>";
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Tin nhắn không gửi được. Mailer Error: {$mail->ErrorInfo}";
    }    
?>
