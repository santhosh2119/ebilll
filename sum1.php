
 <input onblur="findTotal()" type="text" name="qty" /><br>
<input onblur="findTotal()" type="text" name="qty" /><br>
<input onblur="findTotal()" type="text" name="qty" /><br>
<input onblur="findTotal()" type="text" name="qty" /><br>
<input onblur="findTotal()" type="text" name="qty" /><br>
<input onblur="findTotal()" type="text" name="qty" /><br>
<br><br>
Total : <input type="text" name="total" id="total"/>


    <script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByName('qty');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}

    </script>