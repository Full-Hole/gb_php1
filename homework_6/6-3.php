<?php
/*Добавить функционал отзывов в имеющийся у вас проект.
 Т.к. нет инфы о проекте, просто сделаю страничку с отзывами
 */
$title = 'Дз 6-3';

require("../php/header.php"); 
require("../php/dbconn.php");
$cred_hide=1;
    if(checkPost($_POST)){
        if(empty($_POST["cred_hidden"]))
            $cred_hide=0;
        if(is_numeric($_POST["cred_hidden"]))
            if($_POST["cred_hidden"] == 1)
                $cred_hide=1;
            else
                $cred_hide=0;
        
        addReview($db, $_POST["author_name"], $_POST["email"], $_POST["comment"], $cred_hide);
    }


$reviews_db= mysqli_query($db, "SELECT * FROM reviews ORDER BY id DESC");

$reviews = mysqli_fetch_all($reviews_db,MYSQLI_ASSOC);

function addReview($db, $author, $email, $review, $cred_hide){
    $query="INSERT INTO reviews ( author, email, review, cred_hidden) VALUES ('".mysqli_real_escape_string($db,$author)."', '".mysqli_real_escape_string($db,$email)."', '".mysqli_real_escape_string($db,$review)."', ".$cred_hide.")";   
    // echo $query;

    if(mysqli_query($db,$query))
        return 1;
    //echo mysqli_error($db);
    return 0;
}

function checkPost($data){
    if (empty($data))
        return 0;
    if(empty($data["author_name"]))
        return 0;
    if(empty($data["email"]))
        return 0;
    if(empty($data["comment"]))
        return 0;
    return 1;
    
}

?>
<header class="main_header">
    <nav>
        <a href="/index.php" class="home_link">Домой</a>
    </nav>
</header>
<div class="review_list">


    <?php
    foreach($reviews as $review)
    echo "
    <div class=\"review_wrapper\">
    <div class=\"review_author\">".$review["author"]."</div>
    <div class=\"review_author_mail\">".$review["email"]."</div>
    <div class=\"review_text\">".$review["review"]."</div>
    </div>"
    ?>


</div>
<form action="" class="new_review_form" method="post">
    <input type="text" name="author_name" id="author_name" class="author_name" placeholder="ФИО">
    <input type="email" name="email" id="author_email" class="author_email" placeholder="your@email.com">
    <input type="checkbox" name="cred_hidden" id="cred_hidden" value="1">
    <div class="new_review_raiting_wrapper"></div>
    <textarea name="comment" cols="30" rows="3" name="review_text" id="" class="new_review_text" placeholder="Your review"></textarea>
   
    <input type="submit" value="Отправить" class="new_review_submit">
</form>

<?php
mysqli_close($db);
require("../php/footer.php"); ?>