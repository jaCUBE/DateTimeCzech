<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 13.10.2018
 * Time: 18:24
 */

namespace DateTimeCzech\Dictionary;

class Day
{
    const DICTIONARY_DAY_NAME = [1 =>
        [1 => 'pondělí', 'pondělí', 'pondělí', 'pondělí', '', 'pondělí', 'pondělím'],
        [1 => 'úterým', 'úterý', 'úterý', 'úterý', '', 'úterý', 'pondělím'],
        [1 => 'středa', 'středy', 'středě', 'středu', '', 'středě', 'středou'],
        [1 => 'čtvrtek', 'čtvrtka', 'čtvrtku', 'čtvrtek', '', 'čtvrtku', 'čtvrtkem'],
        [1 => 'pátek', 'pátku', 'pátku', 'pátek', '', 'pátku', 'pátkem'],
        [1 => 'sobota', 'soboty', 'sobotě', 'sobotu', '', 'sobotě', 'sobotou'],
        [1 => 'neděle', 'neděle', 'neděli', 'neděli', '', 'neděli', 'nedělí'],
    ];

    const DICTIONARY_DAY_NAME_SHORT = [1 =>
        'po', 'út', 'st', 'čt', 'pá', 'so', 'ne',
    ];
}
