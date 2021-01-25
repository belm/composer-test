<?php

namespace Belm\Tools;

use GeoIp2\Database\Reader;

Class GeoIp2{

    static public function init($mmdb_file){
        if(empty($mmdb_file)){
            $mmdb_file = './GeoIP2-City.mmdb';
        }
        $reader = new Reader($mmdb_file);
        return $reader;
    }

    static public function getInfo($ip, $mmdb_file = ''){
        $reader = self::init($mmdb_file);
        $record = $reader->city($ip);

        print($record->country->isoCode . "\n"); // 'US'
        print($record->country->name . "\n"); // 'United States'
        print($record->country->names['zh-CN'] . "\n"); // '美国'

        print($record->mostSpecificSubdivision->name . "\n"); // 'Minnesota'
        print($record->mostSpecificSubdivision->isoCode . "\n"); // 'MN'

        print($record->city->name . "\n"); // 'Minneapolis'

        print($record->postal->code . "\n"); // '55455'

        print($record->location->latitude . "\n"); // 44.9733
        print($record->location->longitude . "\n"); // -93.2323

        print($record->traits->network . "\n"); // '128.101.101.101/32'
    }
}
