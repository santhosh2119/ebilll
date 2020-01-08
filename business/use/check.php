
<form action="#" method="post" id="devel-generate-content-form" >
<input type="checkbox" id="select_all" /> Select all
<input type="checkbox" name="check_list[]" value="C/C++" class="checkbox"><label>C/C++</label><br/>
<input type="checkbox" name="check_list[]" value="Java"  class="checkbox"><label>Java</label><br/>
<input type="checkbox" name="check_list[]" value="PHP"  class="checkbox"><label>PHP</label><br/>
<input type="submit" name="submit" value="Submit"/>
 <span id="count-checked-checkboxes">0</span> checked
  
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
$count =count($_POST['check_list']);
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";



}
echo $count;
}
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
  

$(document).ready(function(){

    var $checkboxes = $('#devel-generate-content-form  input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        $('#count-checked-checkboxes').text(countCheckedCheckboxes);
    });

});
</script>