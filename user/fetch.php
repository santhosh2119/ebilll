<?php
if(isset($_POST["limit"], $_POST["start"]))
{

 $connect = mysqli_connect("localhost", "root", "", "ebils");
 $query = "SELECT * FROM promotions JOIN busers ON promotions.ownerid=busers.id ORDER BY promotions.ids DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";

 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
 <div class="container">
					
                    <div class="row">
                       
                        <div class="col-md-8 col-md-offset-2" >
                 	<div class="list-unstyled follows" >
  <div class="card-header" style="padding-top:0.5em;">
	
	  <table width="100%" border="0" align="center"  >
  <tbody>
    <tr >
      <td  width="20%" align="center" > <img src="../businesslogos/'.$row["logo"].'" alt="Circle Image" class="img-circle img-no-padding img-responsive" style="max-width: 6rem;"></td>
     <td>   <h5><strong>'.$row["businessname"].'</strong><br /><small>'.$row["city"].'</small></h5></td>
    </tr>
    
  </tbody>
</table>
	  <hr>
</div>
  
    <table width="100%" border="0" >
		  <tr>
			  <td  width="20%" align="center">
     <img src="../promotions/'.$row["imagename"].'" alt="Circle Image"  style="max-width: 100%;" ></td></tr>
			  </table>
								<hr>
								<div align="left" class="read-more" style="padding-left: 1em; padding-right: 1em;"> 


				 '.$row["content"].'</div>	
	  <hr>
	  <table width="80%" border="0" align="center">
		  

    <tr >
      <td>
<strong> <a href=https://api.whatsapp.com/send?&text=Yeah!!%20look%20at%20this%20one%20of%20our%20nearest%20store%20offers%20http://www.localhost/ebils/user/promoview.php?id='.$row["ids"].'%20Indias%20finest%20billing%20app%20Download%20https://www.google.co.in/  target="_blank"><i class="fa fa-paper-plane-o fa-lg" ></i>	&nbsp;	&nbsp;Share</strong></a></td>
    </tr>
    
  
</table>
	   <br>
  </div>
                            
                     </div>
                         
              </div></div>
                      <br>
';
 }
}

?>