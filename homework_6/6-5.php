<?php 

require("../php/dbconn.php");

//$db_upload= mysqli_query($db, "SELECT id, img_link, name, price FROM products WHERE is_deleted !=1 ORDER BY id DESC");
//$product_list = mysqli_fetch_all($db_upload,MYSQLI_ASSOC);
$result='';
if (!empty($_POST)){
    $result = doFeedbackAction($_POST, $db);
}


function doFeedbackAction($data, $db){
    //echo $data;
    switch ($data["action"]){
        case 'Создать':
            $query="INSERT INTO reviews ( author, email, review) VALUES
             ('".mysqli_real_escape_string($db,$data["author"])."',
              '".mysqli_real_escape_string($db,$data["email"])."',
               '".mysqli_real_escape_string($db,$data["feedback_text"])."')";
            break;
        case 'Прочитать':
            $query="SELECT * FROM reviews WHERE id =".mysqli_real_escape_string($db,$data["feedback_id"]);            
            $db_upload=mysqli_query($db,$query);
            //var_dump($query);
            return mysqli_fetch_assoc($db_upload);
            break;
            
        case 'Изменить':
            $query="UPDATE reviews SET
               author ='".mysqli_real_escape_string($db,$data["author"])."',
              email = '".mysqli_real_escape_string($db,$data["email"])."',
              review = '".mysqli_real_escape_string($db,$data["feedback_text"])."'
            WHERE id =".mysqli_real_escape_string($db,$data["feedback_id"]);
            break;
            
        case 'Удалить':
            $query="DELETE FROM reviews WHERE id =".mysqli_real_escape_string($db,$data["feedback_id"]);
            break;

        default:
            return "Кто-то залез не туда";

    }
    if(mysqli_query($db,$query))
                return 1;
            
            var_dump(mysqli_error($db));

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>6-5</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/6-5.css">

</head>

<body>
    <div class="main">

        <h3>CRUD Консоль</h3>

        <div class="tab">
            <button class="tablinks" onclick="openAction(event, 'Create')">Create</button>
            <button class="tablinks" onclick="openAction(event, 'Read')">Read</button>
            <button class="tablinks" onclick="openAction(event, 'Update')">Update</button>
            <button class="tablinks" onclick="openAction(event, 'Delete')">Delete</button>
        </div>

        <div id="Create" class="tabcontent active">
            <form action="" method="post" class="crud_form">
                <input type="text" name="author" id="author_name" class="author_name" placeholder="ФИО">
                <input type="email" name="email" id="author_email" class="author_email" placeholder="your@email.com">

                <div class="new_review_raiting_wrapper"></div>
                <textarea cols="30" rows="3" name="feedback_text" id="" class="new_feedback_text"
                    placeholder="Your review"></textarea>
                <input type="submit" value="Создать" name="action">


        </div>

        <div id="Read" class="tabcontent">
            <form action="" method="post" class="crud_form">
                <input type="text" name="feedback_id" id="feedback_id" class="feedback_id" placeholder="feedback_id">
                <input type="submit" value="Прочитать" name="action">
            </form>

        </div>

        <div id="Update" class="tabcontent">
        <?php if(is_array($result)){ ?>
            <form action="" method="post" class="crud_form">
            
                <input type="text" name="feedback_id" id="feedback_id" class="feedback_id" placeholder="feedback_id" value="<?=$result["id"]?>">
                <input type="text" name="author" id="author_name" class="author_name" placeholder="ФИО" value="<?=$result["author"]?>">
                <input type="email" name="email" id="author_email" class="author_email" placeholder="your@email.com" value="<?=$result["email"]?>">
                <textarea cols="30" rows="3" name="feedback_text" id="feedback_text" class="new_feedback_text" ><?=$result["review"]?></textarea>
                <input type="submit" value="Изменить" name="action">
               <?php 
            } else{
                echo "Данные не загружены";
            }
        
            ?>
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <form action="" method="post" class="crud_form">
                <input type="text" name="feedback_id" id="feedback_id" class="feedback_id" placeholder="feedback_id">

                <input type="submit" value="Удалить" name="action">
            </form>

        </div>
    </div>
    <script>
        function openAction(evt, actName) {

            let tabcontent = document.querySelectorAll(".tabcontent")
            let tablinks = document.querySelectorAll(".tablinks")

            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active_tab");
                tablinks[i].classList.remove("active");
            }
            document.getElementById(actName).classList.add("active_tab");
            evt.currentTarget.classList.remove("active");;
        }
    </script>

</body>

</html>
<?php
mysqli_close($db);