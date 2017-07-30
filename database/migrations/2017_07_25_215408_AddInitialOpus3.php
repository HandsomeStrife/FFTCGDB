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
        DB::table('cards')->insert(['card_number' => '1', 'name' => 'Red Mage', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '2', 'name' => 'Ifrit', 'type' => 'summon', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '3', 'name' => 'Ace', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '4', 'name' => 'Garland', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '5', 'name' => 'Imaginary Brawler', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '6', 'name' => 'King', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '7', 'name' => 'Bard', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '8', 'name' => 'Cloud', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '9', 'name' => 'Cater', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '10', 'name' => 'Gekkou', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '11', 'name' => 'Gladiator', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '12', 'name' => 'Zack', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '13', 'name' => 'Amarant', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '14', 'name' => 'Cinque', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '15', 'name' => 'Black Waltz 2', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '16', 'name' => 'Palom', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '17', 'name' => 'Vivi', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '18', 'name' => 'Vivi', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '19', 'name' => 'Faris', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '20', 'name' => 'Phoenix', 'type' => 'summon', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '21', 'name' => 'Cannoneer', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '22', 'name' => 'Machina', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '23', 'name' => 'Luca', 'type' => 'backup', 'element' => 'fire', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '24', 'name' => 'Rubicante', 'type' => 'forward', 'element' => 'fire', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '25', 'name' => 'Emina', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '26', 'name' => 'Kazusa', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '27', 'name' => 'Qator Bashtar', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '28', 'name' => 'Semblance of a Gunslinger', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '29', 'name' => 'Edward', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '30', 'name' => 'Kuja', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '31', 'name' => 'Kurasame', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '32', 'name' => 'Shiva', 'type' => 'summon', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '33', 'name' => 'Genesis', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '34', 'name' => 'Genesis Avatar', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '35', 'name' => 'Shelke', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '36', 'name' => 'Cid Aulstyne', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '37', 'name' => 'Zalera, the Death Seraph', 'type' => 'summon', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '38', 'name' => 'Xezat', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '39', 'name' => 'Sephiroth', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '40', 'name' => 'DGS Trooper 1st Class', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '41', 'name' => 'Deepground Soldier', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '42', 'name' => 'Deepground Soldier', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '43', 'name' => 'Time Mage', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '44', 'name' => 'Harley', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '45', 'name' => 'White Tiger l\'Cie Qun\'mi', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '46', 'name' => 'White Tiger l\'Cie Nimbus', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '47', 'name' => 'Cannoneer', 'type' => 'backup', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '48', 'name' => 'Mystic Knight', 'type' => 'forward', 'element' => 'ice', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '49', 'name' => 'Izana', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '50', 'name' => 'Aerith', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '51', 'name' => 'Eight', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '52', 'name' => 'Dancer', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '53', 'name' => 'Ranger', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '54', 'name' => 'Black Chocobo', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '55', 'name' => 'Thief', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '56', 'name' => 'Zidane', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '57', 'name' => 'Seven', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '58', 'name' => 'Sky Pirate Replica', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '59', 'name' => 'King Tycoon', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '60', 'name' => 'Tsukinowa', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '61', 'name' => 'Diablos', 'type' => 'summon', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '62', 'name' => 'Deuce', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '63', 'name' => 'Dorgann', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '64', 'name' => 'Trey', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '65', 'name' => 'Bartz', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '66', 'name' => 'Barbariccia', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '67', 'name' => 'Wind Drake', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '68', 'name' => 'Geomancer', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '69', 'name' => 'Yuffie', 'type' => 'forward', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '70', 'name' => 'Oracle', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '71', 'name' => 'Chaos, Walker of the Wheel', 'type' => 'summon', 'element' => 'wind', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '72', 'name' => 'Rem', 'type' => 'backup', 'element' => 'wind', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '73', 'name' => 'Ursula', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '74', 'name' => 'Atomos', 'type' => 'summon', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '75', 'name' => 'Horror of Antiquity', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '76', 'name' => 'Masked Woman', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '77', 'name' => 'Galuf', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '78', 'name' => 'Krile', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '79', 'name' => 'Kefka', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '80', 'name' => 'Black Tortoice l\'Cie Gilgamesh', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '81', 'name' => 'Summoner', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '82', 'name' => 'Scarmiglione', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '83', 'name' => 'Segwarides', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '84', 'name' => 'WRO Member', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '85', 'name' => 'WRO Member', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '86', 'name' => 'WRO Commander', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '87', 'name' => 'Zeromus, the Condemner', 'type' => 'summon', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '88', 'name' => 'Delita', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '89', 'name' => 'The Girl Who Forgot Her Name', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '90', 'name' => 'Ninja', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '91', 'name' => 'Berserker', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '92', 'name' => 'Prishe', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'L', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '93', 'name' => 'Brandelis', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'H', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '94', 'name' => 'Pellinore', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'C', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '95', 'name' => 'Yang', 'type' => 'forward', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '96', 'name' => 'Rydia', 'type' => 'backup', 'element' => 'earth', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '97', 'name' => 'Arecia Al-Rashia', 'type' => 'backup', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '98', 'name' => 'Angeal', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
        DB::table('cards')->insert(['card_number' => '99', 'name' => 'Angeal Penance', 'type' => 'forward', 'element' => 'lightning', 'rarity' => 'R', 'set_number' => '3']);
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
