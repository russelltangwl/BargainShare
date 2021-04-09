<?php
if(isset($_POST['UploadReport'])){
  session_start();
  include 'ConnectDb.php';

  $sql = "INSERT INTO `ReportDatabase` (`PostID`, `ReportDetails`, `SourceDatabase`) VALUES ('".$_POST['PostID']."', '".$_POST['ReportType']."', '".$_POST['SourceDatabase']."')";
  $result = $conn->query($sql);
  if(!$result){
    echo $conn->error;
  }
  else{
      echo "<script language='javascript'>\n";
      echo "alert('Report Submitted'); window.location.href='../index.php';";
      echo "</script>\n";
  }

}
else {
  echo "<script language='javascript'>\n";
  echo "alert('Invalid Page'); window.location.href='../index.php';";
  echo "</script>\n";
}

?>
