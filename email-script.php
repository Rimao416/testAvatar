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