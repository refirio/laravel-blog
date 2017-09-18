<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function byPage($limit)
    {
        return $this->query()
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }
}
