<html>
<head>
<script type="text/javascript">
  function updateSum(formID, qtyID, priceID) {
    var f = document.getElementById(formID)
    var qty = document.getElementById(qtyID)
    var price = document.getElementById(priceID)
    if (f && qty && price) {
      var tab = f.getElementsByTagName("table")[0]  // expect a table
      var row = tab.insertRow(tab.rows.length - 1)
      var qtyVal = parseFloat(qty.value)
      var priceVal = parseFloat(price.value)
      if (!qtyVal) { qtyVal = 0 }
      if (!priceVal) { priceVal = 0 }
      qtyVal = parseInt(Math.round(qtyVal*100),10)/100      // force 2 decimal
      priceVal = parseInt(Math.round(priceVal*100),10)/100  // force 2 decimal
      var totVal = qtyVal * priceVal
      totVal = parseInt(Math.round(totVal*100),10)/100      // force 2 decimal
      // quality cell
      var qtyCell = row.insertCell(0)
      qtyCell.style.border = "1px solid gray"
      qtyCell.style.textAlign = "center"
      var qtyTxtNode = document.createTextNode(qtyVal+"")
      qtyCell.appendChild(qtyTxtNode)
      // price cell
      var priceCell = row.insertCell(1)
      priceCell.style.border = "1px solid gray"
      priceCell.style.textAlign = "right"
      var priceTxtNode = document.createTextNode(priceVal+"")
      priceCell.appendChild(priceTxtNode)
      // total cell
      var totCell = row.insertCell(2)
      totCell.style.border = "1px solid gray"
      totCell.style.textAlign = "right"
      var totTxtNode = document.createTextNode(totVal+"")
      totCell.appendChild(totTxtNode)
      // add to grand total
      var sum = parseFloat(tab.rows[tab.rows.length-1].cells[2].innerHTML)
      tab.rows[tab.rows.length-1].cells[2].innerHTML = sum+totVal
    }
  }
</script>
</head>
<body>
<form id="hours">
  Quantity: <input type="text" id="onkqty">
  <br />
  Price: <input type="text" id="onkprice">
  <br />
  <input type="button" value="Add" onclick="updateSum('hours', 'onkqty', 'onkprice')">
  <br /><br />
  <table style="width:80%;empty-cells:show;border-collapse:collapse">
  <tr>
    <th style="border:1px solid gray">Quantity</th>
    <th style="border:1px solid gray">Price</th>
    <th style="border:1px solid gray">Total</th>
  </tr><tr>
    <td></td>
    <td style="text-align:right;font-weight:bold">Grand Total&nbsp;</td>
    <td name="allTotal" style="text-align:right;border:1px solid gray">0</td>
  </tr>
  </table>
</form>
</body>
</html>