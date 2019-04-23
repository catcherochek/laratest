<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Share
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share query()
 * @mixin \Eloquent
 */
class Share extends Model
{
     protected $fillable = [
    'share_name',
    'share_price',
    'share_qty',
	'share_photo'
  ];//
}
