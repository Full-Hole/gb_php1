<?php
/*4. Объявить массив, индексами которого являются буквы русского языка,
 а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. */
function translite(string $text){
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
    // foreach($trans_dic as $letter => $trans_letter){        
    //     for($i=0; $i < count($split_text); $i++){            
    //         if($split_text[$i] == $letter){
    //             $split_text[$i] = $trans_letter;
    //             continue;
    //         }        
    //         if(mb_strtolower($split_text[$i]) == $letter){
    //             $split_text[$i] = mb_strtoupper($trans_letter);
    //         }
            
    //     }
    //  }
        /*А почему бы и нет?*/
    for($i=0; $i < count($split_text); $i++){  
        $split_text[$i]=array_key_exists($split_text[$i],$trans_dic)?
         $trans_dic[$split_text[$i]]:(array_key_exists(mb_strtolower($split_text[$i]),$trans_dic)?
          mb_strtoupper($trans_dic[mb_strtolower($split_text[$i])]):$split_text[$i]);
    }
    return implode($split_text);
}

echo translite('Объявить массив, индексами которого являются буквы русского языка');
echo '<br/>';
echo translite('ВсЕм ПрИвЕтИкИ');
