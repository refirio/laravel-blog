<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entry_id', 'name', 'comment',
    ];

    /**
     * @param $id
     *
     * @return mixed
     */
    public function allByEntryId($id)
    {
        return $this->query()
            ->where('entry_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
