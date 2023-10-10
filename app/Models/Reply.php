<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Reply extends Model
{
    use HasFactory;

    //Linea para señalar el nombre de la tabla, en caso de querer cambiarlo
    protected $table = 'replies';


    // Funcion para señalar los datos que son rellenables
    protected $fillable = [
        'user_id',
        'post_id',
        'reply',
    ];

    protected $appends = ['forum'];

    public function post(): BelongsTo{
        return $this -> belongsTo(Post::class, 'post_id');
    }

    public function user(): BelongsTo{
        return $this -> belongsTo(User::class, 'user_id');
    }

    public function gerForumAttribute(){
        return $this -> post -> forum;
    }
}
