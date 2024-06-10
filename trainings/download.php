<?php
include ('../check.php');
$tid= $_GET['idss'];
 $file= "SELECT ATTACHMENT FROM training_gi WHERE TR_ID='$tid'";
 $rowa = mysql_query($file);
 while($rowz=mysql_fetch_array($rowa)){
 	$filepath=$rowz['ATTACHMENT'];
 	$name = rtrim($filepath, ';');
 	 header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
	header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
 	header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
	ob_clean();
    flush();
	//readfile("../uploadedDocs/aa.pdf");
	readfile("../uploadedDocs/".$name); //showing the path to the server where the file is to be download
   // exit;
 }


 // Set headers
   

/*


 <tr>
<td bgcolor="00CCFF"><b>File Attachments</td>
<td bgcolor="88E8FF" style="border:1px solid orange; text-align:left; border:1px solid orange;" id="upload_files">
<input class="submitindex" type="file" name="attached_file" id="file" style="width:545px;">
</tr>

	$attached_file = basename($_FILES['attached_file']['name']);
		$path = "../uploadedDocs/";	

		$attached_db_path = $path.$attached_file;
*/


 ?>