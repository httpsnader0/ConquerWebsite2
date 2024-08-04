<?php

namespace App\Services;

use Lorisleiva\Actions\Concerns\AsObject;

final class LoadDataService
{
    use AsObject;

    public $dbPath = 'F:\~ GAMES ~\Conquer\loreds\loreds\DB';

    public function loadData()
    {
        $data = [];

        foreach (glob($this->dbPath . '\Users\*.ini') as $file) {
            $content = parse_ini_file($file, true, INI_SCANNER_RAW);
            $character = $content['Character'];
            $data[] = [
                'UID' => $character['UID'],
                'Body' => $character['Body'],
                'Face' => $this->getAvatar($character['Face']),
                'Name' => $character['Name'],
                'Class' => $this->getClass($character['Class']),
                'ClassIcon' => asset('images/classes/' . $this->getClass($character['Class']) . '.png'),
                'PkPoints' => $character['PkPoints'],
                'VipLevel' => $character['VipLevel'],
                'ConquerPoints' => $character['ConquerPoints'],
                'Money' => $character['Money'],
                'DonationNobility' => $character['DonationNobility'],
            ];
        }

        return mb_convert_encoding($data, 'UTF-8', 'UTF-8');
    }

    public function getAvatar($avatar)
    {
        return asset('images/avatars/' . $avatar . '.jpg');
    }

    public function getRank($rank, $body, $type = null)
    {
        if ($type === 'nobility') {

            switch ($rank) {
                case $rank >= 1 && $rank <= 5:
                    return asset('images/ranks/' . (in_array($body, [1003, 1004]) ? 'king' : 'queen') . '.png');

                case $rank >= 6 && $rank <= 20:
                    return asset('images/ranks/prince.png');

                case $rank >= 21 && $rank <= 50:
                    return asset('images/ranks/duke.png');

                default:
                    return 'UNKNOWN';
            }

        } else {

            switch ($rank) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                    return asset('images/ranks/rank' . $rank . '.png');

                default:
                    return $rank;
            }

        }
    }

    public function getClass($class)
    {
        switch ($class) {
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
                return 'Trojan';

            case 20:
            case 21:
            case 22:
            case 23:
            case 24:
            case 25:
                return 'Warrior';

            case 40:
            case 41:
            case 42:
            case 43:
            case 44:
            case 45:
                return 'Archer';

            case 50:
            case 51:
            case 52:
            case 53:
            case 54:
            case 55:
                return 'Ninja';

            case 60:
            case 61:
            case 62:
            case 63:
            case 64:
            case 65:
                return 'Monk';

            case 70:
            case 71:
            case 72:
            case 73:
            case 74:
            case 75:
                return 'Pirate';

            case 80:
            case 81:
            case 82:
            case 83:
            case 84:
            case 85:
                return 'Dragon Warrior';

            case 100:
            case 101:
                return 'Taoist';

            case 132:
            case 133:
            case 134:
            case 135:
                return 'Water Taiost';

            case 142:
            case 143:
            case 144:
            case 145:
                return 'Fire Taiost';

            case 160:
            case 161:
            case 162:
            case 163:
            case 164:
            case 165:
                return 'Windwalker';

            default:
                return 'UNKNOWN';
        }
    }
}
