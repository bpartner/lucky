<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lucky extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function win(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->isWin() ? 'WIN' : 'LOSE'
        );
    }

    public function sum(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->value()
        );
    }

    public function isWin(): bool
    {
        return $this->capture % 2 === 0;
    }

    public function value(): float|int
    {
        if (!$this->isWin()) {
            return 0;
        }

        $percent = 0;

        foreach (config('lucky.edges') as $step) {
            if ($this->capture > $step['min']) {
                $percent = $step['percent'];
                continue;
            }

            break;
        }

        return $this->capture * $percent / 100;
    }
}
