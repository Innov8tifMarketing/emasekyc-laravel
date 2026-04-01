<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            'logo-aeon.webp' => 'AEON',
            'logo-aeon-credit.webp' => 'AEON Credit',
            'logo-alliance.webp' => 'Alliance Bank',
            'logo-affin-hwang.webp' => 'Affin Hwang',
            'logo-aba-bank.webp' => 'ABA Bank',
            'logo-amk-logo.webp' => 'AMK Microfinance',
            'logo-bibd.webp' => 'BIBD',
            'logo-bnm.webp' => 'Bank Negara Malaysia',
            'logo-bursa-malaysia.webp' => 'Bursa Malaysia',
            'logo-boost.webp' => 'Boost',
            'logo-baoviet.webp' => 'BaoViet',
            'logo-bitazza.webp' => 'Bitazza',
            'logo-cbm.webp' => 'CBM',
            'logo-celcomdigi.webp' => 'CelcomDigi',
            'logo-compasia.webp' => 'CompAsia',
            'logo-dong-zong.webp' => 'Dong Zong',
            'logo-easyparcel.webp' => 'EasyParcel',
            'logo-essilor.webp' => 'Essilor',
            'logo-etika.webp' => 'Etika',
            'logo-fn.webp' => 'FN',
            'logo-fundaztic.webp' => 'Fundaztic',
            'logo-great-eastern.webp' => 'Great Eastern',
            'logo-klezcar.webp' => 'Klezcar',
            'logo-kwik-insure.webp' => 'Kwik Insure',
            'logo-malaysia-gov.webp' => 'Malaysia Government',
            'logo-mcdonald.webp' => "McDonald's",
            'logo-midf.webp' => 'MIDF',
            'logo-mypay.webp' => 'MyPay',
            'logo-nottingham-university.webp' => 'University of Nottingham',
            'logo-nus.webp' => 'NUS',
            'logo-paylater.webp' => 'PayLater',
            'logo-pca-group.webp' => 'PCA Group',
            'logo-pede.webp' => 'Pede',
            'logo-pos-digicert.webp' => 'Pos Digicert',
            'logo-pos-malaysia.webp' => 'Pos Malaysia',
            'logo-primekeeper.webp' => 'Primekeeper',
            'logo-rce-capital.webp' => 'RCE Capital',
            'logo-redone.webp' => 'RedONE',
            'logo-roland.webp' => 'Roland',
            'logo-signingcloud.webp' => 'SigningCloud',
            'logo-sinarmas.webp' => 'Sinarmas',
            'logo-smartworld.webp' => 'SmartWorld',
            'logo-tekun.webp' => 'TEKUN Nasional',
            'logo-telekom.webp' => 'Telekom Malaysia',
            'logo-tokio-marine.webp' => 'Tokio Marine',
            'logo-tonewow.webp' => 'ToneWow',
            'logo-tune-talk.webp' => 'Tune Talk',
            'logo-unifi.webp' => 'Unifi',
            'logo-uob-mighty.webp' => 'UOB Mighty',
            'logo-uob-tmrw.webp' => 'UOB TMRW',
            'logo-versa.webp' => 'Versa',
            'logo-yes.webp' => 'YES',
            'logo-yoodoo.webp' => 'Yoodo',
            'logo-ytl-comms.webp' => 'YTL Communications',
            'logo-4gives.webp' => '4Gives',
            'logo-ace-logo.webp' => 'ACE Exchange',
        ];

        $order = 0;
        foreach ($clients as $filename => $name) {
            Client::updateOrCreate(
                ['name' => $name],
                [
                    'logo' => '/images/logos/' . $filename,
                    'sort_order' => $order++,
                    'is_active' => true,
                ]
            );
        }
    }
}
