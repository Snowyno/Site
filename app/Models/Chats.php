<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conversations';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uid',
        'from_id',
        'to_id',
        'status',
        'blocked_by',
        'last_message_at',
        'created_at'
    ];


    /**
     * Get msg_from
     * 
     * @return object
     */
    public function msg_from()
    {
        return $this->belongsTo(User::class, 'from_id')->withTrashed();
    }


    /**
     * Get to
     *
     * @return object
     */
    public function msg_to()
    {
        return $this->belongsTo(User::class, 'to_id')->withTrashed();
    }


    /**
     * Get order items
     *
     * @return object
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Get order invoice
     *
     * @return object
     */
    public function invoice()
    {
        return $this->hasOne(OrderInvoice::class, 'order_id');
    }
}



