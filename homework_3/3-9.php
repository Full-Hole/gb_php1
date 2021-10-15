<?php
/*9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
 производит транслитерацию и замену пробелов на подчеркивания
  (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах). */

  function generateURL(string $text){
    $trans_dic = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '',
        'ы' => 'i',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];
    $split_text=mb_str_split($text, 1);
    for($i=0; $i < count($split_text); $i++){
        if($split_text[$i] == ' ' || $split_text[$i] == "\r\n" || $split_text[$i] == ',')
            $split_text[$i] = '_';
            // echo '<br/>'.$i.' ';
            // var_dump($split_text[$i]);
        if(array_key_exists($split_text[$i],$trans_dic) || array_key_exists(mb_strtolower($split_text[$i]),$trans_dic)){
            $split_text[$i]= $trans_dic[mb_strtolower($split_text[$i])];
        }  
        //echo $split_text[$i];
        
    }

    return implode($split_text);
}
echo generateURL('Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания');