<?php

namespace Database\Seeders;

use App\Models\Locker;
use Illuminate\Database\Seeder;

class LockerSeeder extends Seeder
{
    public function run(): void
    {
        $lockers = [
            // ══ 静岡駅 ══
            ['station_name'=>'静岡駅','name'=>'在来線改札横 A','area_label'=>'改札内/改札近く','walk_time'=>'徒歩1分','lat'=>34.9718,'lng'=>138.3889,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'静岡駅','name'=>'北口地下道 B','area_label'=>'北口・地下道','walk_time'=>'徒歩3分','lat'=>34.9723,'lng'=>138.3897,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'雨に濡れずに行けます'],
            ['station_name'=>'静岡駅','name'=>'南口ホテル前 C','area_label'=>'南口・ホテル側','walk_time'=>'徒歩4分','lat'=>34.9701,'lng'=>138.3901,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'静岡駅','name'=>'観光案内所横 D','area_label'=>'北口・地下道','walk_time'=>'徒歩5分','lat'=>34.9727,'lng'=>138.3883,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 東京駅 ══
            ['station_name'=>'東京駅','name'=>'丸の内中央口 A','area_label'=>'丸の内側/中央口','walk_time'=>'改札すぐ','lat'=>35.6814,'lng'=>139.7671,'price_s'=>500,'price_m'=>700,'price_l'=>900,'notes'=>'大型荷物が多い早朝は特に混雑します'],
            ['station_name'=>'東京駅','name'=>'八重洲中央口 B','area_label'=>'八重洲側/中央口','walk_time'=>'改札すぐ','lat'=>35.6813,'lng'=>139.7682,'price_s'=>500,'price_m'=>700,'price_l'=>900,'notes'=>null],
            ['station_name'=>'東京駅','name'=>'八重洲南口 C','area_label'=>'八重洲側/南口','walk_time'=>'徒歩2分','lat'=>35.6795,'lng'=>139.7686,'price_s'=>500,'price_m'=>700,'price_l'=>900,'notes'=>'台数が多く比較的空いています'],
            ['station_name'=>'東京駅','name'=>'丸の内北口 D','area_label'=>'丸の内側/北口','walk_time'=>'徒歩1分','lat'=>35.6826,'lng'=>139.7666,'price_s'=>500,'price_m'=>700,'price_l'=>900,'notes'=>null],
            ['station_name'=>'東京駅','name'=>'グランスタ内 E','area_label'=>'構内/グランスタ','walk_time'=>'構内','lat'=>35.6811,'lng'=>139.7676,'price_s'=>500,'price_m'=>700,'price_l'=>900,'notes'=>'商業施設内のためアクセスしやすい'],
            // ══ 新宿駅 ══
            ['station_name'=>'新宿駅','name'=>'東口ルミネ前 A','area_label'=>'東口/ルミネ側','walk_time'=>'徒歩1分','lat'=>35.6896,'lng'=>139.7017,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'平日朝は混雑します'],
            ['station_name'=>'新宿駅','name'=>'西口地下 B','area_label'=>'西口/地下広場','walk_time'=>'徒歩2分','lat'=>35.6908,'lng'=>139.6995,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'新宿駅','name'=>'南口ミロード前 C','area_label'=>'南口/ミロード','walk_time'=>'改札すぐ','lat'=>35.6876,'lng'=>139.7009,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'大型ロッカーが多い'],
            ['station_name'=>'新宿駅','name'=>'新南口 D','area_label'=>'新南口/サザンテラス','walk_time'=>'徒歩2分','lat'=>35.6858,'lng'=>139.7020,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'新宿駅','name'=>'JR改札内コンコース E','area_label'=>'改札内','walk_time'=>'構内','lat'=>35.6896,'lng'=>139.7006,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'Suica対応'],
            // ══ 渋谷駅 ══
            ['station_name'=>'渋谷駅','name'=>'ハチ公口 A','area_label'=>'ハチ公口/広場前','walk_time'=>'改札すぐ','lat'=>35.6590,'lng'=>139.7006,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'観光客が多く混みやすい'],
            ['station_name'=>'渋谷駅','name'=>'東口 B','area_label'=>'東口/スクランブル交差点側','walk_time'=>'徒歩2分','lat'=>35.6597,'lng'=>139.7024,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'渋谷駅','name'=>'渋谷フクラス前 C','area_label'=>'西口/フクラス','walk_time'=>'徒歩3分','lat'=>35.6582,'lng'=>139.6985,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'屋根があり雨に強い'],
            // ══ 上野駅 ══
            ['station_name'=>'上野駅','name'=>'中央改札前 A','area_label'=>'中央口/改札近く','walk_time'=>'改札すぐ','lat'=>35.7131,'lng'=>139.7772,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'上野駅','name'=>'公園口 B','area_label'=>'公園口/上野公園側','walk_time'=>'徒歩3分','lat'=>35.7147,'lng'=>139.7759,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'上野公園観光前に便利'],
            ['station_name'=>'上野駅','name'=>'浅草口 C','area_label'=>'浅草口','walk_time'=>'徒歩2分','lat'=>35.7116,'lng'=>139.7793,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            // ══ 秋葉原駅 ══
            ['station_name'=>'秋葉原駅','name'=>'電気街口 A','area_label'=>'電気街口/ヨドバシ側','walk_time'=>'改札すぐ','lat'=>35.6989,'lng'=>139.7724,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'コミケ時期は激混み'],
            ['station_name'=>'秋葉原駅','name'=>'昭和通り口 B','area_label'=>'昭和通り口','walk_time'=>'徒歩2分','lat'=>35.6987,'lng'=>139.7740,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            // ══ 品川駅 ══
            ['station_name'=>'品川駅','name'=>'北改札 A','area_label'=>'北改札/高輪口','walk_time'=>'改札すぐ','lat'=>35.6286,'lng'=>139.7388,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'新幹線乗り換えに便利'],
            ['station_name'=>'品川駅','name'=>'港南口 B','area_label'=>'港南口/東側','walk_time'=>'徒歩2分','lat'=>35.6274,'lng'=>139.7401,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'品川駅','name'=>'エキュート内 C','area_label'=>'構内/エキュート','walk_time'=>'構内','lat'=>35.6282,'lng'=>139.7393,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'Suica対応・大型あり'],
            // ══ 羽田空港 ══
            ['station_name'=>'羽田空港第1・第2ターミナル駅','name'=>'第1ターミナル 到着ロビー','area_label'=>'第1ターミナル','walk_time'=>'徒歩1分','lat'=>35.5497,'lng'=>139.7817,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'24時間利用可'],
            ['station_name'=>'羽田空港第1・第2ターミナル駅','name'=>'第2ターミナル 出発ロビー','area_label'=>'第2ターミナル','walk_time'=>'徒歩1分','lat'=>35.5540,'lng'=>139.7806,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 大阪駅・梅田 ══
            ['station_name'=>'大阪駅','name'=>'中央口改札前 A','area_label'=>'中央口','walk_time'=>'改札すぐ','lat'=>34.7024,'lng'=>135.4978,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'大阪駅','name'=>'御堂筋口 B','area_label'=>'御堂筋口','walk_time'=>'徒歩2分','lat'=>34.7007,'lng'=>135.4965,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'大阪駅','name'=>'桜橋口 C','area_label'=>'桜橋口','walk_time'=>'徒歩3分','lat'=>34.7033,'lng'=>135.4963,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'大型ロッカー多め'],
            ['station_name'=>'梅田駅（地下鉄）','name'=>'梅田地下街 A','area_label'=>'地下街/ホワイティ梅田','walk_time'=>'徒歩2分','lat'=>34.7022,'lng'=>135.4968,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'地下なので雨の日に便利'],
            // ══ 難波駅 ══
            ['station_name'=>'なんば駅','name'=>'南改札口前 A','area_label'=>'南改札口','walk_time'=>'改札すぐ','lat'=>34.6658,'lng'=>135.5014,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'なんば駅','name'=>'なんばウォーク内 B','area_label'=>'なんばウォーク','walk_time'=>'徒歩3分','lat'=>34.6668,'lng'=>135.5007,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'道頓堀観光に便利'],
            ['station_name'=>'なんば駅','name'=>'高島屋前 C','area_label'=>'高島屋側','walk_time'=>'徒歩2分','lat'=>34.6645,'lng'=>135.5006,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 京都駅 ══
            ['station_name'=>'京都駅','name'=>'中央口 A','area_label'=>'中央口/烏丸側','walk_time'=>'改札すぐ','lat'=>34.9859,'lng'=>135.7591,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'観光シーズンは朝から満杯になることも'],
            ['station_name'=>'京都駅','name'=>'八条口 B','area_label'=>'八条口/新幹線側','walk_time'=>'徒歩2分','lat'=>34.9848,'lng'=>135.7588,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'京都駅','name'=>'ポルタ地下街 C','area_label'=>'地下/ポルタ','walk_time'=>'徒歩5分','lat'=>34.9874,'lng'=>135.7583,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'京都駅','name'=>'伊勢丹前 D','area_label'=>'駅ビル/伊勢丹側','walk_time'=>'徒歩3分','lat'=>34.9861,'lng'=>135.7599,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'伊勢丹地下との往来に便利'],
            // ══ 名古屋駅 ══
            ['station_name'=>'名古屋駅','name'=>'中央コンコース A','area_label'=>'中央コンコース','walk_time'=>'改札すぐ','lat'=>35.1707,'lng'=>136.8816,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'名古屋駅','name'=>'太閤通口 B','area_label'=>'太閤通口/西側','walk_time'=>'徒歩3分','lat'=>35.1716,'lng'=>136.8800,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'名古屋駅','name'=>'桜通口地下 C','area_label'=>'桜通口/地下','walk_time'=>'徒歩2分','lat'=>35.1700,'lng'=>136.8830,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'大型荷物対応ロッカーあり'],
            // ══ 博多駅 ══
            ['station_name'=>'博多駅','name'=>'中央改札前 A','area_label'=>'中央改札/博多口','walk_time'=>'改札すぐ','lat'=>33.5902,'lng'=>130.4204,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'博多駅','name'=>'筑紫口 B','area_label'=>'筑紫口','walk_time'=>'徒歩3分','lat'=>33.5892,'lng'=>130.4218,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'博多駅','name'=>'マイング内 C','area_label'=>'マイング/駅ビル','walk_time'=>'徒歩3分','lat'=>33.5899,'lng'=>130.4194,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'駅ビル内で使いやすい'],
            // ══ 仙台駅 ══
            ['station_name'=>'仙台駅','name'=>'中央改札前 A','area_label'=>'中央改札/西口','walk_time'=>'改札すぐ','lat'=>38.2601,'lng'=>140.8827,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'仙台駅','name'=>'東口 B','area_label'=>'東口','walk_time'=>'徒歩2分','lat'=>38.2595,'lng'=>140.8851,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 札幌駅 ══
            ['station_name'=>'札幌駅','name'=>'南口 A','area_label'=>'南口/大丸側','walk_time'=>'改札すぐ','lat'=>43.0686,'lng'=>141.3510,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'札幌駅','name'=>'北口 B','area_label'=>'北口','walk_time'=>'徒歩3分','lat'=>43.0699,'lng'=>141.3514,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 成田空港 ══
            ['station_name'=>'成田空港駅','name'=>'第1ターミナル地下 A','area_label'=>'第1ターミナル','walk_time'=>'徒歩2分','lat'=>35.7720,'lng'=>140.3878,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'24時間利用可・スーツケースサイズ対応'],
            ['station_name'=>'成田空港駅','name'=>'第2ターミナル B','area_label'=>'第2ターミナル','walk_time'=>'徒歩3分','lat'=>35.7674,'lng'=>140.3861,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
        ];

        foreach ($lockers as $locker) {
            Locker::firstOrCreate(
                ['station_name' => $locker['station_name'], 'name' => $locker['name']],
                $locker
            );
        }
    }
}

