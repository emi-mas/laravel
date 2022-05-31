<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopeUpdatedAt;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // GlobalScope 追加
    protected static function booted()
    {
        static::addGlobalScope(new ScopeUpdatedAt);
    }

    // n円以上の商品をスコープ
    public function scopeOverPrice($query, $price)
    {
        return $query->where('list_price', '>=', $price);
    }
    // n円以下の商品をスコープ
    public function scopeUnderPrice($query, $price)
    {
        return $query->where('list_price', '<=', $price);
    }
}
