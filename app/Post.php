<?php-

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['content','user_id'];

    public function user(){
    	return \App\User::find($this->user_id);
    }
}
