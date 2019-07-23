
<?php
 include( './dbFunction/functions.php');
if($_REQUEST['name']=='' || $_REQUEST['phone']=='' || $_REQUEST['email']==''){
echo 3;

}else{

   
    $obj = new dbfunctiones();
        $sql="insert into futurepayment_brochure(name,mobile,email,company,designation,message,created_at) "
                . "values('{$_REQUEST['name']}','{$_REQUEST['phone']}',"
                . "'{$_REQUEST['email']}','{$_REQUEST['company']}','{$_REQUEST['designation']}','{$_POST['message']}','".date('Y-m-d')."')";
              
 
               $admin_email="Meghna.dekhtawala@ubm.com,Bonika.sharma@ubm.com,deepak.prajapati@ubm.com,moosab.shaikh@ubm.com,Dhruv.Khanna@ubm.com"; // Admin Email id

               
                
        $user_email=$_REQUEST['email'];
        
        $Email_from = $user_email;
        $Email_to   = $admin_email;
        $Email_subject_user = "Thanks for Downloading Brochure of Future Payment Summit";
        $Email_subject_admin = "Thanks for Downloading Brochure of Future Payment Summit";

        $Email_message_user= "Thank you {$_REQUEST['name']} for downloading further information about FuturePaymentSummit,<br/><br/>
        An attachment of the requested information has been sent to the email ID provided by you. <br/><br/>
        If you have any questions in the meantime, please contact us at +91 (0) 22 6172 7000/ +91 (0) 22 6172 7067.<br/><br/>
        Thanks & Regards,<br/>
        Future Payment Summit<br/> Team <br/>";


        $Email_message_admin =  '<style>td,th{border-top:1px solid #CCC;border-right:1px solid #CCC;}th{background-color:#EEE;}</style>
                        Dear Admin,
                        <br/><br/>
                        <table cellpadding="5" cellspacing="0" style="text-align:left;border-top:1px solid #CCC;border-left:1px solid #CCC;" border="0" width="700">
                        <tr><th colspan="2">Enquiry Detail From India Cyber Security Dialogue 2019</th></tr>

                        <tr>
                            <td>Name </td><td> '. $_REQUEST['name'] .'</td>
                        </tr>
                        
                        <tr>
                            <td>Mobile No </td><td>'.$_REQUEST['phone'].'</td>
                        </tr>
                        <tr>  
                            <td>Email </td><td> '. $_REQUEST['email'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Company Name </td><td> '. $_REQUEST['company'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Designation </td><td> '. $_REQUEST['designation'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Message </td><td> '. $_POST['message'] .'</td> 
                        </tr>
                                                
                 </table> <br/><br/>';







                        /*<tr>
                                <td>Name </td><td> '. $_REQUEST['username'] .'</td>
                        </tr>
                                                <tr><td>Mobile No</td><td>'.$_REQUEST['phone'].'</td></tr>

                        <tr>  <td>Email </td><td> '. $_REQUEST['email'] .'</td> </tr>';
                                                if($_REQUEST['company']!=''){
                                                 $Email_message_admin .='<tr>  <td>Company Name</td><td> '. $_REQUEST['company'] .'</td> </tr>';
                                                }
                        if($_REQUEST['designation']!=''){
                                                    $Email_message_admin .='<tr>                                           
                                                     <td>Designation </td><td> '. $_REQUEST['designation'] .'</td>
                        </tr>';
                                                }    
                                                
                                                $interest='';
                                                
                                                if($_REQUEST['radios']==1)
                                                    $interest='Media Partner';
                                                if($_REQUEST['radios']==2)
                                                    $interest='Sponsorship';
                                                if($_REQUEST['radios']==3)
                                                    $interest='Nomination';
                                                if($_REQUEST['radios']==4)
                                                    $interest='Attending';
                                                if($_REQUEST['radios']==5)
                                                    $interest='Publication';
                                                if($_REQUEST['radios']==8)
                                                    $interest='Partnership';
                                                if($_REQUEST['radios']==6)
                                                    $interest='Others';
                                                
                                                
                              $Email_message_admin .='<tr> <td>Interested In </td><td> '. $interest .'</td></tr>';
                                                
                                                if($_REQUEST['radios']==6 && $_REQUEST['specific_interest']!=''){
                                                    $Email_message_admin .='<tr> <td>Interested In specific </td><td> '. $_REQUEST['specific_interest'] .'</td></tr>';
                                                
                                                    
                                                }
                                                
                                                
                                                
                 $Email_message_admin .='</table> <br/><br/>';*/

                 
                 
        
$headers = array("From: $user_email",
    "Reply-To: $user_email",
    //"Cc: ",
    "Content-Type: text/html; charset=ISO-8859-1\r\n",
         
);
$headers = implode("\r\n", $headers);


           
$admin_mail=mail( $admin_email, $Email_subject_admin,$Email_message_admin, $headers );  
        
        //if($admin_mail)//echo "Admin Sent";
        //else //echo "Admin Fail";



   // $headers2 = 'MIME-Version: 1.0' . "\r\n";
    //$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
   // $headers2 .= 'From:India Packaging Awards' . "\r\n";


    $headers2 = "From: " . 'noreply@futurepaymentsummit.com' . "\r\n";
$headers2 .= "Reply-To: ". strip_tags($admin_email) . "\r\n";

$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
           
            $user_mail=mail($user_email, $Email_subject_user,$Email_message_user,$headers2 );  
            $obj->exeQuery($sql);
        
        if($user_mail){
                                //echo "UserSent";
                        echo 1;

                  }else {    //echo "User Fail";
                        echo 2;

                }

}
?>  







<?php
//recipient
$to = $_REQUEST['email'];

//sender
$from = 'noreply@futurepaymentsummit.com';
$fromName = 'Future Payment Summit';

//email subject
$subject = 'Download Brochure from Future Payment Summit'; 

//attachment file path
$file = "file/FPS-Brochure.pdf";

//email body content
$htmlContent = "<p>Dear {$_REQUEST['name']}, <br/>Thank you for showing interest in FuturePaymentSummit,
       To register as a delegate, please complete our <a href='http://futurepaymentsummit.com/register.html'>online delegate registration form</a></p>
       <p>For assistance or group registrations, please contact us Monday - Friday, 9:30AM - 6:30PM IST at +91 (0) 22 6172 7000/ +91 (0) 22 6172 7067 or email us directly at <a href='mailto:meghna.dekhtawala@ubm.com'> meghna.dekhtawala@ubm.com</a></p>
       Please do not reply to this mail.<br/><br/>
       Kind regards,<br/>
   UBM Conferences <br/>";

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($file)."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 
?>
        
