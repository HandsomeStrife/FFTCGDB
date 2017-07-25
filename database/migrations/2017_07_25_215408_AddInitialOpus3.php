<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialOpus3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('cards')->insert(['card_number' => '001', 'name' => 'Red Mage', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '002', 'name' => 'Ifrit', 'type' => 'summon', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '003', 'name' => 'Ace', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '004', 'name' => 'Garland', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '005', 'name' => 'Imaginary Brawler', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '006', 'name' => 'King', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '007', 'name' => 'Bard', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '008', 'name' => 'Cloud', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '009', 'name' => 'Cater', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '010', 'name' => 'Gekkou', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '011', 'name' => 'Gladiator', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '012', 'name' => 'Zack', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '013', 'name' => 'Amarant', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '014', 'name' => 'Cinque', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '015', 'name' => 'Black Waltz 2', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '016', 'name' => 'Palom', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '017', 'name' => 'Vivi', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '018', 'name' => 'Vivi', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '019', 'name' => 'Faris', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '020', 'name' => 'Phoenix', 'type' => 'summon', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '021', 'name' => 'Cannoneer', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '022', 'name' => 'Machina', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '023', 'name' => 'Luca', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '024', 'name' => 'Rubicante', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '025', 'name' => 'Emina', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '026', 'name' => 'Kazusa', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '027', 'name' => 'Qator Bashtar', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '028', 'name' => 'Semblance of a Gunslinger', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '029', 'name' => 'Edward', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '030', 'name' => 'Kuja', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '031', 'name' => 'Kurasame', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '032', 'name' => 'Shiva', 'type' => 'summon', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '033', 'name' => 'Genesis', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '034', 'name' => 'Genesis Avatar', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '035', 'name' => 'Shelke', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '036', 'name' => 'Cid Aulstyne', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '037', 'name' => 'Zalera, the Death Seraph', 'type' => 'summon', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '038', 'name' => 'Xezat', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '039', 'name' => 'Sephiroth', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '040', 'name' => 'DGS Trooper 1st Class', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '041', 'name' => 'Deepground Soldier', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '042', 'name' => 'Deepground Soldier', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '043', 'name' => 'Time Mage', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '044', 'name' => 'Harley', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '045', 'name' => 'White Tiger l\'Cie Qun\'mi', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '046', 'name' => 'White Tiger l\'Cie Nimbus', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '047', 'name' => 'Cannoneer', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '048', 'name' => 'Mystic Knight', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '049', 'name' => 'Izana', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '050', 'name' => 'Aerith', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '051', 'name' => 'Eight', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '052', 'name' => 'Dancer', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '053', 'name' => 'Ranger', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '054', 'name' => 'Black Chocobo', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '055', 'name' => 'Thief', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '056', 'name' => 'Zidane', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '057', 'name' => 'Seven', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '058', 'name' => 'Sky Pirate Replica', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '059', 'name' => 'King Tycoon', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '060', 'name' => 'Tsukinowa', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '061', 'name' => 'Diablos', 'type' => 'summon', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '062', 'name' => 'Deuce', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '063', 'name' => 'Dorgann', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '064', 'name' => 'Trey', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '065', 'name' => 'Bartz', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '066', 'name' => 'Barbariccia', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '067', 'name' => 'Wind Drake', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '068', 'name' => 'Geomancer', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '069', 'name' => 'Yuffie', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '070', 'name' => 'Oracle', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '071', 'name' => 'Chaos, Walker of the Wheel', 'type' => 'summon', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '072', 'name' => 'Rem', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '073', 'name' => 'Ursula', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '074', 'name' => 'Atomos', 'type' => 'summon', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '075', 'name' => 'Horror of Antiquity', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '076', 'name' => 'Masked Woman', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '077', 'name' => 'Galuf', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '078', 'name' => 'Krile', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '079', 'name' => 'Kefka', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '080', 'name' => 'Black Tortoice l\'Cie Gilgamesh', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '081', 'name' => 'Summoner', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '082', 'name' => 'Scarmiglione', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '083', 'name' => 'Segwarides', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '084', 'name' => 'WRO Member', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '085', 'name' => 'WRO Member', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '086', 'name' => 'WRO Commander', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '087', 'name' => 'Zeromus, the Condemner', 'type' => 'summon', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '088', 'name' => 'Delita', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '089', 'name' => 'The Girl Who Forgot Her Name', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '090', 'name' => 'Ninja', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '091', 'name' => 'Berserker', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '092', 'name' => 'Prishe', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '093', 'name' => 'Brandelis', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '094', 'name' => 'Pellinore', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '095', 'name' => 'Yang', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '096', 'name' => 'Rydia', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '097', 'name' => 'Arecia Al-Rashia', 'type' => 'backup', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '098', 'name' => 'Angeal', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '099', 'name' => 'Angeal Penance', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '100', 'name' => 'Exdeath', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '101', 'name' => 'Enuo', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '102', 'name' => 'Odin', 'type' => 'summon', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '103', 'name' => 'Gilgamesh', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '104', 'name' => 'Queen', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '105', 'name' => 'Black Waltz 3', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '106', 'name' => 'Black Mage', 'type' => 'backup', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '107', 'name' => 'Black Mage', 'type' => 'backup', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '108', 'name' => 'Kelger', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '109', 'name' => 'Sice', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '110', 'name' => 'Zangetsu', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '111', 'name' => 'Jack', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '112', 'name' => 'Exodus, the Judge-Sal', 'type' => 'summon', 'element' => 'lightning', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '113', 'name' => 'Nine', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '114', 'name' => 'Freya', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '115', 'name' => 'Cannoneer', 'type' => 'backup', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '116', 'name' => 'Mystic Knight', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '117', 'name' => 'Simulacrum of a Hero', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '118', 'name' => 'Lightning', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '119', 'name' => 'Ramza', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '120', 'name' => 'Dragoon', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '121', 'name' => 'Blue Mage', 'type' => 'backup', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '122', 'name' => 'Artemicion', 'type' => 'backup', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '123', 'name' => 'Fanfrit, the Darkening Cloud', 'type' => 'summon', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '124', 'name' => 'Izayoi', 'type' => 'forward', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '125', 'name' => 'Ephemeral Summoner', 'type' => 'forward', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '126', 'name' => 'Eiko', 'type' => 'backup', 'element' => 'water', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '127', 'name' => 'Eiko', 'type' => 'backup', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '128', 'name' => 'Dancer', 'type' => 'forward', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '129', 'name' => 'Garnet', 'type' => 'forward', 'element' => 'water', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '130', 'name' => 'Cagnazzo', 'type' => 'forward', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '131', 'name' => 'Ghido', 'type' => 'backup', 'element' => 'water', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '132', 'name' => 'Quacho Queen', 'type' => 'backup', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '133', 'name' => 'Quina', 'type' => 'forward', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '134', 'name' => 'Summoner', 'type' => 'backup', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '135', 'name' => 'Syldra', 'type' => 'summon', 'element' => 'water', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '136', 'name' => 'White Mage', 'type' => 'forward', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '137', 'name' => 'Steiner', 'type' => 'forward', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '138', 'name' => 'Ceodore', 'type' => 'forward', 'element' => 'water', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '139', 'name' => 'Knight', 'type' => 'forward', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '140', 'name' => 'Porom', 'type' => 'forward', 'element' => 'water', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '141', 'name' => 'Mog', 'type' => 'backup', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '142', 'name' => 'Famed Mimic Gogo', 'type' => 'forward', 'element' => 'water', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '143', 'name' => 'Leonora', 'type' => 'backup', 'element' => 'water', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '144', 'name' => 'Lenna', 'type' => 'forward', 'element' => 'water', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '145', 'name' => 'Ultima, the High Seraph', 'type' => 'summon', 'element' => 'light', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '146', 'name' => 'Minerva', 'type' => 'forward', 'element' => 'light', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '147', 'name' => 'Zodiark, Keeper of Precepts', 'type' => 'summon', 'element' => 'dark', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '148', 'name' => 'Feral Chaos', 'type' => 'forward', 'element' => 'dark', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '149', 'name' => 'Vivi', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'S', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '150', 'name' => 'Moogle', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'S', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '151', 'name' => 'Queen', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'S', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '152', 'name' => 'Garnet', 'type' => 'forward', 'element' => 'water', 'rarity' => 'S', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '153', 'name' => 'Ace', 'type' => 'forward', 'element' => 'light', 'rarity' => 'S', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '154', 'name' => 'Zidane', 'type' => 'forward', 'element' => 'light', 'rarity' => 'S', 'set_number' => '3']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
