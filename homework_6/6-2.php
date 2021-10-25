<?php
$title = 'Дз 6-2';
require("../php/header.php");
var_dump($_POST);

?>
<form  action="6-2.php" method="post" class="calc_form">
<input type="text" name="calc_input" class="calc_input" readonly>
    <fieldset class="num_list">
        <input type="button" onclick="inputNum(this.value)" value="1" id="1" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="2" id="2" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="3" id="3" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="4" id="4" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="5" id="5" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="6" id="6" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="7" id="7" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="8" id="8" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="9" id="9" class="numbutton">
        <input type="button" onclick="inputNum(this.value)" value="0" id="0" class="numbutton">
</fieldset>
<fieldset class="operator_list">
    <input type="button" onclick="inputNum(this.value)" id="add" value="+" class="oper_button">
    <input type="button" onclick="inputNum(this.value)" id="sub" value="-" class="oper_button">
    <input type="button" onclick="inputNum(this.value)" id="mult" value="*" class="oper_button">
    <input type="button" onclick="inputNum(this.value)" id="divis" value="/" class="oper_button">
    
</fieldset>
<input type="submit" class="oper_button" value="=">
</form>

<script>
    "use strict"
    const calc_input = document.querySelector(".calc_input");
    // let [...num_btn_list] = document.querySelector(".num_list").children;
    // console.log(num_btn_list);
    // num_btn_list.forEach(btn => addEventListener('click', inputNum))
    // let op_btn_list = document.querySelector(".operator_list").children;
    //     console.log(op_btn_list);
    function inputNum(val){
        
        calc_input.value+=val;
    }

</script>

<?php require("../php/footer.php"); ?>