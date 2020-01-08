<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "ebils");
 $query = "SELECT * FROM pestcontrol ORDER BY sno DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["mobile"].'</h3>
  <p>'.$row["cname"].'</p>
  <p class="text-muted" align="right">By - '.$row["cps"].'</p>
  <hr />
  ';
 }
}

?>
