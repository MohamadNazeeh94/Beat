<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    protected $appends = [
        'logo',
    ];

    public function getLogoAttribute(){
        $file = $this->getMedia('product_image')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return 'https://i.stack.imgur.com/l60Hf.png';
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'offer', 'product_id', 'user_id');
    }
}
