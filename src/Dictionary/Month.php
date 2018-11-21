<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 13.10.2018
 * Time: 18:24
 */

namespace DateTimeCzech\Dictionary;

class Month
{
    const DICTIONARY_MONTH_NAME = [1 =>
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

    const DICTIONARY_MONTH_NAME_SHORT = [1 =>
        'led', 'únr', 'bře', 'dub', 'kvě', 'črn',
        'črv', 'srp', 'zář', 'říj', 'lis', 'pro',
    ];
}
