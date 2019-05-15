
<?php

/*
 * Convert short month like FEB to russian Фев
 */
if (! function_exists('shortMonthsToRus')) {
    function shortMonthsToRus($month) {
        $months = [1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' ];

        return $months[$month];
    }
}