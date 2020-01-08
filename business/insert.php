
<html>
<head><title>Insert Data Into MySQL: jQuery + AJAX + PHP</title></head>
<script>
$("#sub").click( function() {
 $.post( $("#myForm").attr("action"), 
         $("#myForm :input").serializeArray(), 
         function(info){ $("#result").html(info); 
   });
 clearInput();
});
 
$("#myForm").submit( function() {
  return false;	
});
 
function clearInput() {
	$("#myForm :input").each( function() {
	   $(this).val('');
	});
}
</script>
<body>
 
<form id="myForm" action="userInfo.php" method="post">
Name: <input type="text" name="name" /><br />
Age : <input type="text" name="age" /><br />
<button id="sub">Save</button>
</form>
 
<span id="result"></span>
 
<script src="script/jquery-1.8.1.min.js" type="text/javascript"></script>

</body>
</html>