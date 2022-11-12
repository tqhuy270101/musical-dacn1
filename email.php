<?php
   // các biến sau là quan trọng và cần thiết
   $from=$_REQUEST["from"];
   $emaila=$_REQUEST["emaila"];
   $filea=$_REQUEST["filea"];

   if ($filea)
   {
      function mail_attachment ($from , $to, $subject, $message, $attachment){
         $fileatt = $attachment; // đường dẫn tới file
         $fileatt_type = "application/octet-stream"; // kiểu file 

         $start = strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
         $fileatt_name = substr($attachment, $start, strlen($attachment)); // tên file được sử dụng như là attachment 

         $email_from = $from; // địa chỉ người gửi email này
         $subject = "New Attachment";

         $email_subject =  $subject; // phần Subject của email 
         $email_txt = $message; // phần nội dung trong email 
         $email_to = $to; // địa chỉ email người nhận

         $headers = "From: ".$email_from;
         $file = fopen($fileatt,'rb'); 
         $data = fread($file,filesize($fileatt)); 
         fclose($file); 

         $msg_txt="\n\n Bạn đã nhận một New Attachment từ địa chỉ $from";
         $semi_rand = md5(time()); 
         $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
         $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

         $email_txt .= $msg_txt;
         $email_message .= "Đây là thông báo gồm nhiều phần trong định dạng MIME.\n\n" . "--{$mime_boundary}\n" . "Content-Type:text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_txt . "\n\n";
         $data = chunk_split(base64_encode($data));

         $email_message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" . " name=\"{$fileatt_name}\"\n" . //"Content-Disposition: attachment;\n" . //" filename=\"{$fileatt_name}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
         $ok = mail($email_to, $email_subject, $email_message, $headers);

         if($ok)
         {
            echo "File được gửi thành công.";
            unlink($attachment); // Xóa file sau khi Attachment đã được gửi.
         }

         else
         {
            die("Xin lỗi vì không gửi được email. Xin hãy thử lại!");
         }
      }
      move_uploaded_file($_FILES["filea"]["tmp_name"],'temp/'.basename($_FILES['filea']['name']));
      mail_attachment("$from", "youremailaddress@gmail.com", "subject", "message", ("temp/".$_FILES["filea"]["name"]));
   }
?>

<html>
   <head>

      <script language="javascript" type="text/javascript">
         function CheckData45()
         {
            with(document.filepost)
            {
               if(filea.value != "")
               {
                  document.getElementById('one').innerText = "Đang đính kèm File ... Mời bạn chờ trong chốc lát!!!";
               }
            }
         }
      </script>

   </head>
   <body>

      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
         <tr>
            <td align="center">
               <form name="filepost" method="post" action="file.php" enctype="multipart/form-data" id="file">

                  <table width="300" border="0" cellspacing="0" cellpadding="0">
                     <tr valign="bottom">
                        <td height="20">Tên bạn:</td>
                     </tr>

                     <tr>
                        <td><input name="from" type="text" id="from" size="30"></td>
                     </tr>

                     <tr valign="bottom">
                        <td height="20">Địa chỉ email của bạn:</td>
                     </tr>

                     <tr>
                        <td class="frmtxt2"><input name="emaila" type="text" id="emaila" size="30"> </td>
                     </tr>

                     <tr>
                        <td height="20" valign="bottom">Attach File:</td>
                     </tr>

                     <tr valign="bottom">
                        <td valign="bottom"><input name="filea" type="file" id="filea" size="16"></td>
                     </tr>

                     <tr>
                        <td height="40" valign="middle"><input name="Reset2" type="reset" id="Reset2" value="Reset">
                        <input name="Submit2" type="submit" value="Submit" onClick="return CheckData45()"></td>
                     </tr>
                  </table>

               </form>

               <center>
                  <table width="400">
                     <tr>
                        <td id="one">
                        </td>
                     </tr>
                  </table>
               </center>

            </td>
         </tr>
      </table>

   </body>
</html>  