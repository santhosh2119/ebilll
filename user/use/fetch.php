<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "ebils");
 $query = "SELECT * FROM promotions JOIN busers ON promotions.ownerid=busers.id ORDER BY promotions.id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
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
      <td  width="20%" align="center" > <img src="../assets/paper_img/flume.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive" style="max-width: 6rem;"></td>
     <td>   <h5><strong>'.$row["cname"].'</strong><br /><small>'.$row["mobile"].'</small></h5></td>
    </tr>
    
  </tbody>
</table>
	  <hr>
</div>
  
    <table width="100%" border="0" >
		  <tr>
			  <td  width="20%" align="center">
     <img src="../assets/paper_img/examples/landing.jpg" alt="Circle Image"  style="max-width: 100%;" ></td></tr>
			  </table>
								<hr>
								<div align="left" class="read-more" style="padding-left: 1em; padding-right: 1em;"> 
					erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.
									</div>
		  <hr>
	  <table width="80%" border="0" align="center">
		  

    <tr >
      <td><strong><i class="fa fa-heart-o fa-lg"></i>
	&nbsp&nbsp2000 </strong></td><td><strong><i class="fa fa-paper-plane-o fa-lg" ></i>	&nbsp;	&nbsp;Share</strong></td>
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