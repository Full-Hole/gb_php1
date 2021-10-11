<?php
/*
 * 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
 */

function get_time()
{
    $hour = (int)date('H');
    //$hour = random_int(0, 23);
    $h_mod = $hour % 10;
    $min = (int)date('i');
    //$min = random_int(0, 59);
    $m_mod = $min % 10;
    $text_time = ' ' . $hour;
    if ($hour == 0 || ($hour >= 5 && $hour <= 20))
        $text_time .= ' часов ';
    else if ($h_mod == 1)
        $text_time .= ' час ';
    else
        $text_time .= ' часа ';
    $text_time .= $min;
    if ($m_mod == 1 && $min != 11)
        $text_time .= ' минута';
    else if ($m_mod < 5 && ($min < 12 || $min > 14) && $m_mod!=0)
        $text_time .= ' минуты';
    else
        $text_time .= ' минут';
    echo $text_time;
}
get_time();
