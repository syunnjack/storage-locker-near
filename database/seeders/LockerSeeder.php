<?php

namespace Database\Seeders;

use App\Models\Locker;
use Illuminate\Database\Seeder;

class LockerSeeder extends Seeder
{
    public function run(): void
    {
        $lockers = [
            // ══ 北海道 ══
            ['station_name'=>'札幌駅','name'=>'南口 A','area_label'=>'南口/大丸側','walk_time'=>'改札すぐ','lat'=>43.0686,'lng'=>141.3510,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'札幌駅','name'=>'北口 B','area_label'=>'北口','walk_time'=>'徒歩3分','lat'=>43.0699,'lng'=>141.3514,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'札幌駅','name'=>'JRタワー地下 C','area_label'=>'JRタワー/地下','walk_time'=>'徒歩2分','lat'=>43.0692,'lng'=>141.3507,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'大型スーツケース対応'],
            ['station_name'=>'新千歳空港駅','name'=>'国内線ターミナル A','area_label'=>'国内線/到着ロビー','walk_time'=>'徒歩1分','lat'=>42.7747,'lng'=>141.6930,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'24時間利用可'],
            ['station_name'=>'新千歳空港駅','name'=>'国際線ターミナル B','area_label'=>'国際線','walk_time'=>'徒歩3分','lat'=>42.7762,'lng'=>141.6961,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'函館駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>41.7736,'lng'=>140.7261,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'函館駅','name'=>'西口 B','area_label'=>'西口','walk_time'=>'徒歩3分','lat'=>41.7728,'lng'=>140.7249,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'函館朝市観光に便利'],
            ['station_name'=>'旭川駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>43.7701,'lng'=>142.3640,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'小樽駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>43.1900,'lng'=>140.9941,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'小樽運河観光に便利'],
            // ══ 青森県 ══
            ['station_name'=>'青森駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>40.8243,'lng'=>140.7384,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'新青森駅','name'=>'改札前 A','area_label'=>'新幹線改札前','walk_time'=>'改札すぐ','lat'=>40.8486,'lng'=>140.6956,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'新幹線乗り換えに便利'],
            // ══ 岩手県 ══
            ['station_name'=>'盛岡駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>39.7020,'lng'=>141.1349,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'盛岡駅','name'=>'西口 B','area_label'=>'西口','walk_time'=>'徒歩3分','lat'=>39.7013,'lng'=>141.1335,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 秋田県 ══
            ['station_name'=>'秋田駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>39.7179,'lng'=>140.1028,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 山形県 ══
            ['station_name'=>'山形駅','name'=>'改札前 A','area_label'=>'西口/改札前','walk_time'=>'改札すぐ','lat'=>38.2565,'lng'=>140.3393,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 宮城県 ══
            ['station_name'=>'仙台駅','name'=>'中央改札前 A','area_label'=>'中央改札/西口','walk_time'=>'改札すぐ','lat'=>38.2601,'lng'=>140.8827,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'仙台駅','name'=>'東口 B','area_label'=>'東口','walk_time'=>'徒歩2分','lat'=>38.2595,'lng'=>140.8851,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'仙台駅','name'=>'S-PAL地下 C','area_label'=>'S-PAL/駅ビル地下','walk_time'=>'徒歩3分','lat'=>38.2597,'lng'=>140.8815,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'ショッピング前に便利'],
            // ══ 福島県 ══
            ['station_name'=>'郡山駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>37.3937,'lng'=>140.3888,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'福島駅','name'=>'改札前 A','area_label'=>'西口/改札前','walk_time'=>'改札すぐ','lat'=>37.7534,'lng'=>140.4673,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 茨城県 ══
            ['station_name'=>'水戸駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>36.3682,'lng'=>140.4713,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 栃木県 ══
            ['station_name'=>'宇都宮駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>36.5490,'lng'=>139.8985,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 群馬県 ══
            ['station_name'=>'高崎駅','name'=>'改札前 A','area_label'=>'西口/改札前','walk_time'=>'改札すぐ','lat'=>36.3225,'lng'=>139.0034,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 埼玉県 ══
            ['station_name'=>'大宮駅','name'=>'中央改札前 A','area_label'=>'中央改札','walk_time'=>'改札すぐ','lat'=>35.9064,'lng'=>139.6237,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'大宮駅','name'=>'東口 B','area_label'=>'東口','walk_time'=>'徒歩2分','lat'=>35.9060,'lng'=>139.6251,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            // ══ 千葉県 ══
            ['station_name'=>'千葉駅','name'=>'改札前 A','area_label'=>'中央改札前','walk_time'=>'改札すぐ','lat'=>35.6127,'lng'=>140.1124,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'舞浜駅','name'=>'改札前 A','area_label'=>'改札前/ディズニー側','walk_time'=>'改札すぐ','lat'=>35.6325,'lng'=>139.8861,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'TDR来園前の荷物預けに'],
            ['station_name'=>'成田空港駅','name'=>'第1ターミナル地下 A','area_label'=>'第1ターミナル','walk_time'=>'徒歩2分','lat'=>35.7720,'lng'=>140.3878,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'24時間利用可・スーツケースサイズ対応'],
            ['station_name'=>'成田空港駅','name'=>'第2ターミナル B','area_label'=>'第2ターミナル','walk_time'=>'徒歩3分','lat'=>35.7674,'lng'=>140.3861,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            // ══ 静岡駅 ══
            ['station_name'=>'静岡駅','name'=>'在来線改札横 A','area_label'=>'改札内/改札近く','walk_time'=>'徒歩1分','lat'=>34.9718,'lng'=>138.3889,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'静岡駅','name'=>'北口地下道 B','area_label'=>'北口・地下道','walk_time'=>'徒歩3分','lat'=>34.9723,'lng'=>138.3897,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'雨に濡れずに行けます'],
            ['station_name'=>'静岡駅','name'=>'南口ホテル前 C','area_label'=>'南口・ホテル側','walk_time'=>'徒歩4分','lat'=>34.9701,'lng'=>138.3901,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'静岡駅','name'=>'観光案内所横 D','area_label'=>'北口・地下道','walk_time'=>'徒歩5分','lat'=>34.9727,'lng'=>138.3883,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 東京都 ══
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
            // ══ 神奈川県 ══
            ['station_name'=>'横浜駅','name'=>'中央改札前 A','area_label'=>'東口/中央改札','walk_time'=>'改札すぐ','lat'=>35.4660,'lng'=>139.6221,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'横浜駅','name'=>'西口 B','area_label'=>'西口/ヨドバシ側','walk_time'=>'徒歩2分','lat'=>35.4658,'lng'=>139.6201,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'横浜駅','name'=>'ジョイナス地下 C','area_label'=>'地下/ジョイナス','walk_time'=>'徒歩3分','lat'=>35.4663,'lng'=>139.6194,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'鎌倉駅','name'=>'東口 A','area_label'=>'東口/鶴岡八幡宮側','walk_time'=>'改札すぐ','lat'=>35.3196,'lng'=>139.5503,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'観光シーズンは早めに'],
            ['station_name'=>'鎌倉駅','name'=>'西口 B','area_label'=>'西口/江の島方面','walk_time'=>'改札すぐ','lat'=>35.3193,'lng'=>139.5495,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'川崎駅','name'=>'中央口 A','area_label'=>'中央口','walk_time'=>'改札すぐ','lat'=>35.5313,'lng'=>139.6994,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'小田原駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>35.2657,'lng'=>139.1546,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'箱根観光の起点に便利'],
            // ══ 東京（追加観光スポット） ══
            ['station_name'=>'池袋駅','name'=>'東口 A','area_label'=>'東口/サンシャイン側','walk_time'=>'改札すぐ','lat'=>35.7295,'lng'=>139.7118,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'池袋駅','name'=>'西口 B','area_label'=>'西口/ロフト側','walk_time'=>'改札すぐ','lat'=>35.7295,'lng'=>139.7087,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'池袋駅','name'=>'メトロポリタン口 C','area_label'=>'南口','walk_time'=>'徒歩2分','lat'=>35.7278,'lng'=>139.7099,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            ['station_name'=>'新橋駅','name'=>'烏森口 A','area_label'=>'烏森口','walk_time'=>'改札すぐ','lat'=>35.6664,'lng'=>139.7569,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'浜松町駅','name'=>'改札前 A','area_label'=>'北口','walk_time'=>'改札すぐ','lat'=>35.6556,'lng'=>139.7571,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'東京モノレール乗り換えに便利'],
            ['station_name'=>'原宿駅','name'=>'表参道口 A','area_label'=>'表参道口','walk_time'=>'改札すぐ','lat'=>35.6702,'lng'=>139.7028,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'竹下通り観光前に'],
            ['station_name'=>'浅草駅','name'=>'1番出口前 A','area_label'=>'雷門/1番出口','walk_time'=>'徒歩2分','lat'=>35.7104,'lng'=>139.7968,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'雷門・浅草寺観光に便利'],
            ['station_name'=>'浅草駅','name'=>'雷門前 B','area_label'=>'雷門/仲見世通り','walk_time'=>'徒歩3分','lat'=>35.7109,'lng'=>139.7960,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'押上駅','name'=>'スカイツリー前 A','area_label'=>'東京スカイツリー前','walk_time'=>'徒歩1分','lat'=>35.7102,'lng'=>139.8106,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'スカイツリー観光前に'],
            ['station_name'=>'舞浜駅','name'=>'改札前 A','area_label'=>'改札前/ディズニー側','walk_time'=>'改札すぐ','lat'=>35.6325,'lng'=>139.8861,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'TDR来園前の荷物預けに'],
            ['station_name'=>'羽田空港第3ターミナル駅','name'=>'国際線 到着ロビー A','area_label'=>'国際線ターミナル','walk_time'=>'徒歩1分','lat'=>35.5494,'lng'=>139.7783,'price_s'=>500,'price_m'=>700,'price_l'=>1000,'notes'=>'24時間対応・スーツケース大型対応'],
            // ══ 新潟県 ══
            ['station_name'=>'新潟駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>37.9116,'lng'=>139.0592,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'新潟駅','name'=>'万代口 B','area_label'=>'万代口','walk_time'=>'徒歩2分','lat'=>37.9121,'lng'=>139.0603,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 富山県 ══
            ['station_name'=>'富山駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>36.7019,'lng'=>137.2127,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'立山・黒部観光の拠点'],
            // ══ 石川県 ══
            ['station_name'=>'金沢駅','name'=>'兼六園口 A','area_label'=>'兼六園口/東口','walk_time'=>'改札すぐ','lat'=>36.5781,'lng'=>136.6482,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'金沢駅','name'=>'金沢港口 B','area_label'=>'金沢港口/西口','walk_time'=>'徒歩2分','lat'=>36.5775,'lng'=>136.6468,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'金沢駅','name'=>'百番街あんと内 C','area_label'=>'駅ビル/百番街あんと','walk_time'=>'徒歩3分','lat'=>36.5778,'lng'=>136.6476,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'兼六園観光前に'],
            // ══ 福井県 ══
            ['station_name'=>'福井駅','name'=>'改札前 A','area_label'=>'西口/改札前','walk_time'=>'改札すぐ','lat'=>36.0632,'lng'=>136.2222,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 山梨県 ══
            ['station_name'=>'甲府駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>35.6641,'lng'=>138.5690,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 長野県 ══
            ['station_name'=>'長野駅','name'=>'改札前 A','area_label'=>'善光寺口/改札前','walk_time'=>'改札すぐ','lat'=>36.6443,'lng'=>138.1887,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'善光寺参拝前に便利'],
            ['station_name'=>'松本駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>36.2165,'lng'=>137.9719,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'松本城観光に便利'],
            // ══ 岐阜県 ══
            ['station_name'=>'岐阜駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>35.4097,'lng'=>136.7600,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 静岡県（浜松） ══
            ['station_name'=>'浜松駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>34.7034,'lng'=>137.7344,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 愛知県（追加） ══
            ['station_name'=>'名古屋駅','name'=>'ゲートタワー内 D','area_label'=>'ゲートタワー/商業施設','walk_time'=>'徒歩2分','lat'=>35.1710,'lng'=>136.8808,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'豊橋駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>34.7693,'lng'=>137.3910,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 三重県 ══
            ['station_name'=>'津駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>34.7222,'lng'=>136.5067,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 滋賀県 ══
            ['station_name'=>'大津駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>35.0081,'lng'=>135.8693,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 京都（観光スポット） ══
            ['station_name'=>'嵐山駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>35.0150,'lng'=>135.6782,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'嵐山・嵯峨野観光に'],
            ['station_name'=>'嵐山駅','name'=>'渡月橋前 B','area_label'=>'渡月橋付近','walk_time'=>'徒歩5分','lat'=>35.0146,'lng'=>135.6750,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            // ══ 大阪府（追加） ══
            ['station_name'=>'新大阪駅','name'=>'東口 A','area_label'=>'東口/新幹線側','walk_time'=>'改札すぐ','lat'=>34.7333,'lng'=>135.5003,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'新幹線乗り換えに便利'],
            ['station_name'=>'新大阪駅','name'=>'西口 B','area_label'=>'西口','walk_time'=>'徒歩2分','lat'=>34.7328,'lng'=>135.4989,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'天王寺駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>34.6463,'lng'=>135.5140,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'天王寺駅','name'=>'あべのハルカス前 B','area_label'=>'あべのハルカス','walk_time'=>'徒歩2分','lat'=>34.6457,'lng'=>135.5132,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'あべのハルカス観光前に'],
            ['station_name'=>'ユニバーサルシティ駅','name'=>'改札前 A','area_label'=>'改札前/USJ方面','walk_time'=>'改札すぐ','lat'=>34.6649,'lng'=>135.4330,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'USJ来園前の荷物預けに'],
            ['station_name'=>'関西国際空港駅','name'=>'国内線ターミナル A','area_label'=>'国内線','walk_time'=>'徒歩1分','lat'=>34.4346,'lng'=>135.2441,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>'24時間利用可'],
            ['station_name'=>'関西国際空港駅','name'=>'国際線ターミナル B','area_label'=>'国際線','walk_time'=>'徒歩2分','lat'=>34.4340,'lng'=>135.2453,'price_s'=>400,'price_m'=>700,'price_l'=>1000,'notes'=>null],
            // ══ 兵庫県 ══
            ['station_name'=>'三ノ宮駅','name'=>'東口 A','area_label'=>'東口/元町方面','walk_time'=>'改札すぐ','lat'=>34.6933,'lng'=>135.1946,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'三ノ宮駅','name'=>'西口 B','area_label'=>'西口/ハーバーランド方面','walk_time'=>'徒歩2分','lat'=>34.6930,'lng'=>135.1934,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'三ノ宮駅','name'=>'さんちか地下 C','area_label'=>'地下/さんちか','walk_time'=>'徒歩3分','lat'=>34.6927,'lng'=>135.1940,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'雨天時に便利'],
            ['station_name'=>'姫路駅','name'=>'改札前 A','area_label'=>'北口/姫路城側','walk_time'=>'改札すぐ','lat'=>34.8267,'lng'=>134.6917,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'姫路城観光前に'],
            ['station_name'=>'姫路駅','name'=>'みゆき通り入口 B','area_label'=>'みゆき通り','walk_time'=>'徒歩2分','lat'=>34.8260,'lng'=>134.6904,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 奈良県 ══
            ['station_name'=>'奈良駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>34.6851,'lng'=>135.8327,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'東大寺・奈良公園観光前に'],
            ['station_name'=>'近鉄奈良駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>34.6833,'lng'=>135.8313,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 和歌山県 ══
            ['station_name'=>'和歌山駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>34.2297,'lng'=>135.1698,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 鳥取県 ══
            ['station_name'=>'鳥取駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>35.5010,'lng'=>134.2374,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 島根県 ══
            ['station_name'=>'松江駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>35.4673,'lng'=>133.0617,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 岡山県 ══
            ['station_name'=>'岡山駅','name'=>'中央改札前 A','area_label'=>'東口/中央改札','walk_time'=>'改札すぐ','lat'=>34.6553,'lng'=>133.9182,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'岡山駅','name'=>'西口 B','area_label'=>'西口','walk_time'=>'徒歩2分','lat'=>34.6549,'lng'=>133.9166,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 広島県 ══
            ['station_name'=>'広島駅','name'=>'新幹線口 A','area_label'=>'新幹線口','walk_time'=>'改札すぐ','lat'=>34.3977,'lng'=>132.4755,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'広島駅','name'=>'南口 B','area_label'=>'南口/路面電車側','walk_time'=>'徒歩2分','lat'=>34.3968,'lng'=>132.4752,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'広島駅','name'=>'ekie内 C','area_label'=>'駅ビル/ekie','walk_time'=>'徒歩3分','lat'=>34.3973,'lng'=>132.4748,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'平和記念公園観光前に'],
            ['station_name'=>'福山駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>34.4849,'lng'=>133.3624,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 山口県 ══
            ['station_name'=>'新山口駅','name'=>'改札前 A','area_label'=>'新幹線改札前','walk_time'=>'改札すぐ','lat'=>34.1815,'lng'=>131.4745,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 徳島県 ══
            ['station_name'=>'徳島駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>34.0773,'lng'=>134.5548,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 香川県 ══
            ['station_name'=>'高松駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>34.3503,'lng'=>134.0482,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'高松港・玉藻公園観光前に'],
            ['station_name'=>'高松駅','name'=>'北口 B','area_label'=>'北口/高松港側','walk_time'=>'徒歩2分','lat'=>34.3513,'lng'=>134.0481,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 愛媛県 ══
            ['station_name'=>'松山駅','name'=>'改札前 A','area_label'=>'改札前','walk_time'=>'改札すぐ','lat'=>33.8371,'lng'=>132.7607,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'道後温泉観光の起点'],
            // ══ 高知県 ══
            ['station_name'=>'高知駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>33.5608,'lng'=>133.5418,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 福岡県（追加） ══
            ['station_name'=>'天神駅','name'=>'改札前 A','area_label'=>'改札前/天神地下街','walk_time'=>'改札すぐ','lat'=>33.5889,'lng'=>130.3989,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'小倉駅','name'=>'新幹線口 A','area_label'=>'新幹線口','walk_time'=>'改札すぐ','lat'=>33.8701,'lng'=>130.8744,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'小倉駅','name'=>'在来線改札前 B','area_label'=>'在来線改札前','walk_time'=>'改札すぐ','lat'=>33.8698,'lng'=>130.8751,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'福岡空港駅','name'=>'到着ロビー前 A','area_label'=>'国内線/到着ロビー','walk_time'=>'徒歩1分','lat'=>33.5839,'lng'=>130.4512,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'24時間対応'],
            // ══ 佐賀県 ══
            ['station_name'=>'佐賀駅','name'=>'改札前 A','area_label'=>'南口/改札前','walk_time'=>'改札すぐ','lat'=>33.2637,'lng'=>130.2992,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 長崎県 ══
            ['station_name'=>'長崎駅','name'=>'改札前 A','area_label'=>'東口/改札前','walk_time'=>'改札すぐ','lat'=>32.9121,'lng'=>129.8629,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            ['station_name'=>'長崎駅','name'=>'アミュプラザ長崎内 B','area_label'=>'アミュプラザ','walk_time'=>'徒歩3分','lat'=>32.9117,'lng'=>129.8621,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>'長崎観光の拠点'],
            // ══ 熊本県 ══
            ['station_name'=>'熊本駅','name'=>'新幹線口 A','area_label'=>'新幹線口','walk_time'=>'改札すぐ','lat'=>32.7906,'lng'=>130.6909,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'熊本駅','name'=>'在来線口 B','area_label'=>'在来線/白川口','walk_time'=>'徒歩2分','lat'=>32.7900,'lng'=>130.6922,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            // ══ 大分県 ══
            ['station_name'=>'大分駅','name'=>'改札前 A','area_label'=>'北口/改札前','walk_time'=>'改札すぐ','lat'=>33.1846,'lng'=>131.6369,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 宮崎県 ══
            ['station_name'=>'宮崎駅','name'=>'改札前 A','area_label'=>'西口/改札前','walk_time'=>'改札すぐ','lat'=>31.9128,'lng'=>131.4229,'price_s'=>300,'price_m'=>500,'price_l'=>700,'notes'=>null],
            // ══ 鹿児島県 ══
            ['station_name'=>'鹿児島中央駅','name'=>'東口 A','area_label'=>'東口/市電側','walk_time'=>'改札すぐ','lat'=>31.5759,'lng'=>130.5436,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'鹿児島中央駅','name'=>'西口 B','area_label'=>'西口','walk_time'=>'徒歩2分','lat'=>31.5756,'lng'=>130.5421,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>null],
            ['station_name'=>'鹿児島中央駅','name'=>'アミュプラザ内 C','area_label'=>'アミュプラザ/駅ビル','walk_time'=>'徒歩3分','lat'=>31.5761,'lng'=>130.5443,'price_s'=>400,'price_m'=>600,'price_l'=>800,'notes'=>'桜島観光の起点'],
            // ══ 沖縄県 ══
            ['station_name'=>'那覇空港駅','name'=>'国内線ターミナル A','area_label'=>'国内線/到着ロビー','walk_time'=>'徒歩1分','lat'=>26.1958,'lng'=>127.6461,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'24時間利用可'],
            ['station_name'=>'那覇空港駅','name'=>'国際線ターミナル B','area_label'=>'国際線','walk_time'=>'徒歩3分','lat'=>26.1952,'lng'=>127.6479,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>null],
            ['station_name'=>'おもろまち駅','name'=>'改札前 A','area_label'=>'改札前/DFS側','walk_time'=>'改札すぐ','lat'=>26.2210,'lng'=>127.6920,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'国際通り観光の拠点'],
            ['station_name'=>'牧志駅','name'=>'改札前 A','area_label'=>'改札前/国際通り','walk_time'=>'改札すぐ','lat'=>26.2167,'lng'=>127.6963,'price_s'=>400,'price_m'=>600,'price_l'=>900,'notes'=>'牧志公設市場・国際通り観光に'],
        ];

        foreach ($lockers as $locker) {
            Locker::firstOrCreate(
                ['station_name' => $locker['station_name'], 'name' => $locker['name']],
                $locker
            );
        }
    }
}

