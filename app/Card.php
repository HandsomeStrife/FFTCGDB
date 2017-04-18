<?php

namespace FFTCG;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'cost', 'element', 'type', 'job', 'category', 'text', 'card_number', 'rarity', 'power', 'set_number'
    ];

    public function fullCardNumber()
    {
        return $this->set_number . "-" . str_pad($this->card_number, 3, 0, STR_PAD_LEFT) . "-" . $this->rarity;
    }

    public function formatDescription()
    {
        // Get the description
        $desc = $this->text;
        $imgsrc = '<img class="small-icon" src="/img/icons/%s.png" />';
        $replacements = array(
            'Brave' => '<b>Brave</b>',
            'Haste' => '<b>Haste</b>',
            'Freeze' => '<b>Freeze</b>',
            'Search' => '<b>Search</b>',
            'First Strike' => '<b>First Strike</b>',
            '[s]' => sprintf($imgsrc, 'special'),
            '[dull]' => sprintf($imgsrc, 'dull'),
            '[dark]' => sprintf($imgsrc, 'dark'),
            '[earth]' => sprintf($imgsrc, 'earth'),
            '[fire]' => sprintf($imgsrc, 'fire'),
            '[ice]' => sprintf($imgsrc, 'ice'),
            '[light]' => sprintf($imgsrc, 'light'),
            '[lightning]' => sprintf($imgsrc, 'lightning'),
            '[water]' => sprintf($imgsrc, 'water'),
            '[wind]' => sprintf($imgsrc, 'wind'),
            '[1]' => '<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">1</span></span>',
            '[2]' => '<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">2</span></span>',
            '[3]' => '<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">3</span></span>'
        );
        
        // Do the replacements
        $desc = str_replace(array_keys($replacements), array_values($replacements), $desc);

        // Ensure formatting is correct
        return "<p>" . implode("</p><p>", explode(PHP_EOL, $desc)) . "</p>";
    }

    public function hoveritem()
    {
        return "<img class='small-icon' src='/img/icons/{$this->element}.png' />
        <a class='js-hover-info' 
            data-id='{$this->id}'
            data-element='{$this->element}'
            data-cost='{$this->cost}'
            data-number='{$this->fullCardNumber()}'
            data-title='{$this->name}'
            href='/card/{$this->fullCardNumber()}'>
            {$this->name}
        </a>";
    }

    public function comments()
    {
        return $this->hasMany('FFTCG\Models\Comments\CardComment');
    }

    public function likes()
    {
        return $this->belongsToMany('FFTCG\User', 'card_likes');
    }
}
