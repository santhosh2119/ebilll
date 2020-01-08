<!DOCTYPE html>
 
<html>
	<head>
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
		<link rel='stylesheet' href='style.css' />
	</head>
<style>
body{
	font-size:120%;
	line-height:2;
	font-family:calibri;
}
.formarea{
	width:60%;
	margin:0 auto;
	background-color:#6082bb; 
	text-align:center;
	padding:4%;
	border-radius:5px;
}
 
#bararea{
	width:100%;
	height:40px;
	border:2px solid #FFFFFF;
}
 
#bar{
	width:1%;
	margin:4px 0;
	height:32px;
	background-color:#FFFFFF;
}
 
#status{
	color:#ffffff;
}
</style>
	<body>
 
		<div class='formarea'>
			<h2>File Upload Progress Bar Example</h2>
			<form method='post' action='upload1.php' enctype='multipart/form-data'>
				<input type='file' name='file'  required/>
				<button>Upload</button>
			</form>
			<div id="bararea">
				<div id="bar"></div>
			</div>
			<div id='percent'></div>
			<div id='status'></div>
		</div>
		
		
		<script>
		
			$(function() {
				$(document).ready(function(){
					var bar = $('#bar')
					var percent = $('#percent');
					var status = $('#status');
					
					$('form').ajaxForm({
							beforeSend: function() {
							status.empty();
							var percentVal = '0%';
							bar.width(percentVal);
							percent.html(percentVal);
						},
							uploadProgress: function(event, position, total, percentComplete) {
							var percentVal = percentComplete + '%';
							percent.html(percentVal);
							bar.width(percentVal);
						},
							complete: function(xhr) {
							status.html(xhr.responseText);
						}
					});
				});
			});
		</script>
	</body>
</html>