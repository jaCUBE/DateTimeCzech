<?php

/**
 *
 */

namespace DateTimeCzech;


class Dictionary {

    /**
     *
     */
    const DAY_NAME = [1 =>
        [1 => 'pondělí', 'pondělí', 'pondělí', 'pondělí', '', 'pondělí', 'pondělím'],
        [1 => 'úterým', 'úterý', 'úterý', 'úterý', '', 'úterý', 'pondělím'],
        [1 => 'středa', 'středy', 'středě', 'středu', '', 'středě', 'středou'],
        [1 => 'čtvrtek', 'čtvrtka', 'čtvrtku', 'čtvrtek', '', 'čtvrtku', 'čtvrtkem'],
        [1 => 'pátek', 'pátku', 'pátku', 'pátek', '', 'pátku', 'pátkem'],
        [1 => 'sobota', 'soboty', 'sobotě', 'sobotu', '', 'sobotě', 'sobotou'],
        [1 => 'neděle', 'neděle', 'neděli', 'neděli', '', 'neděli', 'nedělí'],
    ];

    /**
     *
     */
    const DAY_NAME_SHORT = [1 =>
        'po', 'út', 'st', 'čt', 'pá', 'so', 'ne',
    ];

    /**
     *
     */
    const MONTH_NAME = [1 =>
        [1 => 'leden', 'ledna', 'lednu', 'leden', '', 'lednu', 'lednu'],
        [1 => 'únor', 'února', 'únoru', 'únor', '', 'únoru', 'únorem'],
        [1 => 'březen', 'března', 'březnu', 'březen', '', 'březnu', 'březnem'],
        [1 => 'duben', 'dubna', 'dubnu', 'duben', '', 'dubnu', 'dubnem'],
        [1 => 'květen', 'května', 'květnu', 'květen', '', 'květnu', 'květnem'],
        [1 => 'červen', 'června', 'červnu', 'červen', '', 'červnu', 'červnem'],
        [1 => 'červenec', 'července', 'červenci', 'červenec', '', '', 'lednu'],
        [1 => 'srpen', 'srpna', 'srpnu', 'srpen', '', 'srpnu', 'srpnem'],
        [1 => 'září', 'září', 'září', 'září', '', 'září', 'září'],
        [1 => 'říjen', 'října', 'říjnu', 'říjem', '', 'říjnu', 'říjnem'],
        [1 => 'listopad', 'listopadu', 'listopadu', 'listopad', '', 'listopadu', 'listopadem'],
        [1 => 'prosinec', 'prosince', 'prosince', 'prosinec', '', 'prosince', 'prosincem'],
    ];

    /**
     *
     */
    const MONTH_NAME_SHORT = [1 =>
        'led', 'únr', 'bře', 'dub', 'kvě', 'črn',
        'črv', 'srp', 'zář', 'říj', 'lis', 'pro',
    ];

    const PUBLIC_HOLIDAY = [
        '01-01' => 'Nový rok',
        '05-01' => 'Svátek práce',
        '05-08' => 'Den vítězství',
        '07-05' => 'Den slovanských věrozvěstů Cyrila a Metoděje',
        '07-06' => 'Den upálení mistra Jana Husa',
        '09-28' => 'Den české státnosti',
        '10-28' => 'Den vzniku samostatného československého státu',
        '11-17' => 'Den boje za svobodu a demokracii',
        '12-24' => 'Štědrý den',
        '12-25' => '1. svátek vánoční',
        '12-26' => '2. svátek vánoční',
    ];

    const PUBLIC_HOLIDAY_OTHERS = [
        'easterMonday' => 'Velikonoční pondělí',
        'easterFriday' => 'Velký pátek',
    ];
}
