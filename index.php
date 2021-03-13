<?php
    if(isset($_POST['sendMailBtn'])){
        $fromMail=$_POST['fromEmail'];
        $toMail=$_POST['toEmail'];
        $subjectName=$_POST['subject'];
        $message=$_POST['message'];
        $to=$toMail;
        $subject=$subjectName;
        $headers = "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        $headers .= 'From: Omarkayumba12344445@gmail.com'."\r\n". 'Reply-to: Omarkayumbzsdqdq@gmail.com'."\r\n".'X-Mailer:PHP/'.phpversion();
        $message='<!doctype html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie-edge">
                <title>Document</title>
            </head>
            <body>
            <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width;0;">'.$message.'</span>
                <div class="container">
                '.$message.'<br/>
                Regards<br/>
                '.$fromMail.'
            </div>
            </body>
            </html>';
            $result=mail($to,"APAPASDDQSDQSDQSDQSDQSDQD",$message,$headers);     
            if($result==1){
                echo "<script>alert('ENVOYE')</script>";
            }                   
            

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Send Mail</h5>
                        <form action="email-script.php" method="post" class="form-signin">
                            <div class="form-label-group">
                                <label for="inputEmail">From <span style="color:#FF0000">*</span></label>
                                <input type="text" name="fromEmail" id="fromEmail" class="form-control" value="Omarkayumba12345@gmail.com">
                            </div><br>
                            <div class="form-label-group">
                                <label for="inputEmail">From <span style="color:#FF0000">*</span></label>
                                <input type="text" name="toEmail" id="toEmail" class="form-control" value="Omarkayumba12345@gmail.com">
                            </div><br>
                            <div class="form-label-group">
                                <label for="inputEmail">From <span style="color:#FF0000">*</span></label>
                                <input type="text" name="subject" id="subject" class="form-control" value="subject">
                            </div><br>
                            <div class="form-label-group">
                                <label for="inputEmail">From <span style="color:#FF0000">*</span></label>
                                <input type="text" name="message" id="message" class="form-control" value="Omarkayumba12345@gmail.com">
                            </div><br>
                            <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase">Send Mail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>