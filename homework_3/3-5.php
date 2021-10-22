<?php
/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. */
function spaceReplace(string $text){
    $split_text=mb_str_split($text, 1);
    for($i=0; $i < count($split_text); $i++){
        if($split_text[$i] == ' ')
            $split_text[$i] = '_';
    }
    return implode($split_text);
}

echo spaceReplace('5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');