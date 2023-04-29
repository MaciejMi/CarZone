<?php
    session_start();
    require '../components/connection.php';
    require '../components/authentication.php';

    require_once '../vendor/autoload.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    if (isset($_SESSION['logged'])){
      if ($_SESSION['logged']){
        header("Location: ../index.php");
      }
    }

    define('START_BALANCE', 5000);

    $lastName = trim($_POST['lastName'] ?? NULL);
    $firstName = trim($_POST['firstName'] ?? NULL);
    $email = trim($_POST['email'] ?? NULL);
    $phoneNumber = trim($_POST['phoneNumber'] ?? NULL);
    $password_1 = trim($_POST['password_1'] ?? NULL);
    $password_2 = trim($_POST['password_2'] ?? NULL);

    $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phoneNumber = filter_var($phoneNumber, FILTER_SANITIZE_STRING);
    $password_1 = filter_var($password_1, FILTER_SANITIZE_STRING);
    $password_2 = filter_var($password_2, FILTER_SANITIZE_STRING);

    $datas = [$lastName, $firstName, $email, $phoneNumber, $password_1, $password_2];
    
    if(isset($_POST['lastName']) || isset($_POST['firstName']) || isset($_POST['email']) || isset($_POST['phoneNumber']) || isset($_POST['password_1']) || isset($_POST['password_2'])){
        if (isNullDatas($datas) || !validName($lastName) || !validName($firstName)){
            header('Location: ./sign-up.php?error=Invalid input data');
        }
        if (!arePasswordsEqual($password_1, $password_2)){
            header('Location: ./sign-up.php?error=Passwords aren\'t equal');
        }
        if (!isNullDatas($datas) && validName($lastName) && validName($firstName) && arePasswordsEqual($password_1, $password_2)){
            $query_str = 'SELECT users.id FROM users WHERE users.email = ?';
            $stmt = $conn->prepare($query_str);
            $stmt->execute([$email]);
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result){
              header('Location: ./sign-up.php?error=This email is already used by another user.');
            }
            
            if (!$result){
                $hash = password_hash($password_1, PASSWORD_DEFAULT);
                $verificationCode = rand(100000, 999999);
                $fromEmail = 'carzoneue@outlook.com';
                $fromName = 'CarZone';
                $smtpHost = 'smtp.office365.com'; 
                $smtpPort = 587;
                $smtpUsername = 'carzoneue@outlook.com';
                $smtpPassword = 'PASS';
                $toEmail = $email;

                $mail = new PHPMailer(true);

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                try {
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = $smtpHost;
                    $mail->SMTPAuth = true;
                    $mail->Username = $smtpUsername;
                    $mail->Password = $smtpPassword;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = $smtpPort;

                    $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    
                    <head>
                      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <title>Please activate your account</title>
                      <!--[if mso]><style type="text/css">body, table, td, a { font-family: Arial, Helvetica, sans-serif !important; }</style><![endif]-->
                    </head>
                    
                    <body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
                      <table role="presentation"
                        style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
                        <tbody>
                          <tr>
                            <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
                              <table role="presentation" style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
                                <tbody>
                                  <tr>
                                    <td style="padding: 40px 0px 0px;">
                                      <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                                        <div style="color: rgb(0, 0, 0); text-align: left;">
                                          <h1 style="margin: 1rem 0">Final step!</h1>
                                          <p style="padding-bottom: 16px">Follow this link to verify your email address.</p> 
                                          <p style="padding-bottom: 16px;"><a href="http://localhost/carzone/site/login.php?email=' . $email . '&token=' . $verificationCode . '" target="_blank"
                                              style="padding: 12px 24px; border-radius: 4px; color: #FFF; background-color: #cc1b1b; display: inline-block;margin: 0.5rem 0;">Confirm
                                              now</a></p>
                                          <p style="padding-bottom: 16px">If you did not ask to verify this address, you can ignore this email.</p>
                                          <p style="padding-bottom: 16px">Thanks,<br>The CarZone team</p>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </body>
                    
                    </html>';

                    $mail->setFrom($fromEmail, $fromName);
                    $mail->addAddress($toEmail);
                    $mail->isHTML(true);
                    $mail->Subject = 'Verification Link';
                    $mail->Body = $html;
                    $mail->send();

                    $query_str = 'INSERT INTO users(id, firstname, lastname, phone_number, email, passhash, balance, user_type, verification_code, status) VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, 0)';
                    $stmt = $conn->prepare($query_str);
                    $stmt->execute([$firstName, $lastName, $phoneNumber, $email, $hash, START_BALANCE, 'user', $verificationCode]);
                } catch (Exception $e) {
                    header("Location: ../components/error.php?error=We couldn't send the message.");
                }   
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="CarZone">
    <meta name="description" content="The best online service where you can choose your dream vehicle. ">
    <meta name="keywords" content="cars, vehicles, parts, schop, carshop">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="pl">
    <link rel="icon" type="image/x-icon" href="./../img/logo.png">
    <title>CarZone - Sign Up</title>
    <!-- Tabler icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Main script js -->
    <script src="../js/main.js" defer></script>
</head>

<body>
    <section class="section login">
        <h1>Sign up</h1>
        <form method='POST' action='./sign-up.php?message=We have sent you verification code to your email!'>
            <div>
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" minlength='2' maxlength='80' placeholder="Enter your last name"
                    required>
            </div>
            <div>
                <label for="firstName">First name</label>
                <input type="text" name="firstName" minlength='2' maxlength='80' placeholder="Enter your first name"
                    required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" minlength='5' maxlength='80' placeholder="Enter your email" required>
            </div>
            <div>
                <label for="phoneNumber">Phone number (123-123-123)</label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="phoneNumber"
                    placeholder="Enter your phone number [fx. 123-123-123]" required>
            </div>
            <div>
                <label for="password_1">Password</label>
                <input type="password" name="password_1" minlength='8' maxlength="80" placeholder="Enter your password"
                    required>
            </div>
            <div>
                <label for="password_2">Password</label>
                <input type="password" name="password_2" minlength='8' maxlength="80" placeholder="Enter your password"
                    required>
            </div>
            <button type="submit" class="btn">Sign in</button>
           <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= $_GET['error'] ?></p>
            <?php endif; ?>
            <?php
                if (!isset($_GET['error']) && isset($_GET['message'])):
            ?>
                <p><?= $_GET['message'] ?></p>
            <?php endif ?>
            <div class="info">
                <p>Do you have an account? </p> <a href="./login.html"> Login </a>
            </div>
        </form>
    </section>
</body>

</html>