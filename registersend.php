
<?php
 include( './dbFunction/functions.php');
if($_REQUEST['name']=='' || $_REQUEST['phone']=='' || $_REQUEST['email']==''){
echo 3;

}else{

   
$obj = new dbfunctiones();
$sql="insert into futurepayment_register(name,mobile,email,company,designation,message,created_at) "
                . "values('{$_REQUEST['name']}','{$_REQUEST['phone']}',"
                . "'{$_REQUEST['email']}','{$_REQUEST['company']}','{$_REQUEST['designation']}','{$_POST['message']}','".date('Y-m-d')."')";
              
 
       $admin_email="Meghna.dekhtawala@ubm.com,Bonika.sharma@ubm.com,deepak.prajapati@ubm.com,moosab.shaikh@ubm.com,Dhruv.Khanna@ubm.com"; // Admin Email id 
               
                
        $user_email=$_REQUEST['email'];
        
        $Email_from = $user_email;
        $Email_to   = $admin_email;
        $Email_subject_user = "Thanks for Enquiry on Future Payment Summit";
        $Email_subject_admin = "Enquiry From Future Payment Summit";

        $Email_message_user= "Dear {$_REQUEST['name']} ,<br/><br/>
        Thank you for your delegate registration for Future Payment Summit. <br/>Your registration for {$_REQUEST['name']} will be confirmed by the event organiser.<br/> Delegate information will be sent to you by email within 2 weeks of the event date.<br/>
                If you have any questions about your booking, please contact our Customer Services department at <a href='tel: +91 (0) 22 6172 7000'> +91 (0) 22 6172 7000/ <a href='tel: +91 (0) 22 6172 7067'> +91 (0) 22 6172 7067 </a> from Monday - Friday, 9:30 - 18:30 IST or email <a href='mailto:meghna.dekhtawala@ubm.com?subject=Future Payment Summit Delegate Query'>meghna.dekhtawala@ubm.com</a><br/><br/>
         We look forward to welcoming you to the event!<br/><br/>

        The UBM Conferences Team<br/>
        If you have received this email in error and you did not intend to register as a delegate or are not the intended recipient, then please notify us immediately at +91 (0) 22 6172 7000/ +91 (0) 22 6172 7067 or email<a href='mailto:meghna.dekhtawala@ubm.com'> meghna.dekhtawala@ubm.com</a>";
               // $Email_message_user1 = wordwrap($Email_message_user, 120);

               $Email_message_admin =  '<style>td,th{border-top:1px solid #CCC;border-right:1px solid #CCC;}th{background-color:#EEE;}</style>
                        Dear Admin,
                        <br/><br/>
                        <table cellpadding="5" cellspacing="0" style="text-align:left;border-top:1px solid #CCC;border-left:1px solid #CCC;" border="0" width="700">
                        <tr><th colspan="2">To register as a delegate for Future Payment Summit fill in the below form.</th></tr>

                        <tr>
                            <td>Name* : </td><td> '. $_REQUEST['name'] .'</td>
                        </tr>
                        
                        <tr>
                            <td>Mobile*: </td><td>'.$_REQUEST['phone'].'</td>
                        </tr>
                        <tr>  
                            <td>Email*: </td><td> '. $_REQUEST['email'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Company* : </td><td> '. $_REQUEST['company'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Designation*: </td><td> '. $_REQUEST['designation'] .'</td> 
                        </tr>
                        <tr>  
                            <td>Message </td><td> '. $_POST['message'] .'</td> 
                        </tr>
                                                
                 </table> <br/><br/>';
                 
                         
        
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


    $headers2 = "From: " . 'noreply@futurepaymentsummit.com'. "\r\n";
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
