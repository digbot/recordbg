<?php

namespace Digger\RecordbgBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DiggerRecordbgBundle extends Bundle
{
    public static $_categories =  array(  1 => 'ПАРИ',
                                           2 => 'СЕКС',
                                           3 => 'СПОРТ',
                                           4 => 'РАБОТА' ,
                                           5 => 'ЛЮБОВ',
                                           6 => 'УЧЕНЕ' ,
                                           7 => 'ИГРИ',
                                           8 => 'КУПОН',
                                           9 => 'СЕМЕЙСТВО' ,
                                           99 => 'РАЗНИ'
										  );
										 ///  999 => 'ЛИЧНОСТИ'
										 	 
    public function buildLeftMenu()
    {
        return  self::$_categories;
    }

}
