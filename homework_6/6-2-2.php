<?php
$title = 'Дз 6-2-2';
require("../php/header.php");
//var_dump($_POST);
$result="";
if (!empty($_POST)) {
   $result = split_calc($_POST["calc_input"]);
    
}

function split_calc(string $calc_line){
    $result=0;
    $oper_arr = preg_split("/\d+/", $calc_line,0,PREG_SPLIT_NO_EMPTY);
    $num_arr = preg_split("/[+\-*\/]+/", $calc_line,0,PREG_SPLIT_NO_EMPTY);
    if(count($num_arr)>0){
        $result=$num_arr[0];
        for($i=0;$i <= count($num_arr)-2;$i++){
            
            $result=calc($result, $num_arr[$i+1],$oper_arr[$i]);
            
        }
    }
    return $result;

}
function calc($num1, $num2, $action){

    switch ($action) {
        case '+':
            return $num1+$num2;
        case '-':
            return $num1-$num2;
        case '*':
            return $num1*$num2;
        case '/':
            if($num2==0)
                return "Немогу поделить на ноль";
            return $num1/$num2;
        default:
            return "Кто-то залез не туда";
    }
}


?>
<form  action="" method="post" class="calc_form">
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
<input type="text" name="result" class="result" value="<?=$result?>" readonly>
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