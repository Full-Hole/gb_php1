<?php
$title = 'Дз 6-2';
require("../php/header.php");
$result='';
//var_dump($_POST);
if (!empty($_POST)) {
    
    $result=calc($_POST["num1"], $_POST["num2"], $_POST["action"]);
}

function calc($num1, $num2, $action)
{
    if(!isset($num1))
        return "Не введено первое число";
    if(!isset($num2))
        return "Не введено второе число";
    if(!isset($action))
        return "Не выбрана операция";
    if(!is_numeric($num1) || !is_numeric($num2)){
        return "В ведено не число";
    }
    $result = '';
    switch ($action) {
        case 'Сумма':
            return $num1+$num2;
        case 'Разность':
            return $num1-$num2;
        case 'Произведение':
            return $num1*$num2;
        case 'Частное':
            if($num2==0)
                return "Немогу поделить на ноль";
            return $num1/$num2;
        default:
            return "Кто-то залез не туда";
    }
}


?>
<form action="6-2.php" method="post" class="calc_form">
    <input type="text" name="num1" class="calc_input" placeholder="Число 1" pattern="^[ 0-9]+$">

    <fieldset class="oper_field">
        <input type="radio" name="action" id="add" class="hiden_oper_radio" value="Сумма"><label class="oper_lbl" for="add">+</label>
        <input type="radio" name="action" id="sub" class="hiden_oper_radio" value="Разность"><label class="oper_lbl" for="sub">-</label>
        <input type="radio" name="action" id="mul" class="hiden_oper_radio"value="Произведение"><label class="oper_lbl" for="mul">*</label>
        <input type="radio" name="action" id="divs" class="hiden_oper_radio"value="Частное"><label class="oper_lbl" for="divs">/</label>
    </fieldset>

    <input type="text" name="num2" class="calc_input" placeholder="Число 2" pattern="^[ 0-9]+$">

    <input type="submit" class="oper_button" value="=">
    <input type="text" class="calc_input" placeholder="Результат" value="<?=$result?>" readonly>
</form>

<script>
    "use strict"
    const calc_input = document.querySelector(".calc_input");
    // let [...num_btn_list] = document.querySelector(".num_list").children;
    // console.log(num_btn_list);
    // num_btn_list.forEach(btn => addEventListener('click', inputNum))
    // let op_btn_list = document.querySelector(".operator_list").children;
    //     console.log(op_btn_list);
    function inputNum(val) {

        calc_input.value += val;
    }
</script>

<?php require("../php/footer.php"); ?>