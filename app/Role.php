<?php  
  
namespace App;  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

  
class Role extends Model  
{  
    use SoftDeletes; 

    protected $collection = 'roles';  
  
    /**  
     * The attributes which are mass assigned will be used.  
     *  
     * It will return @var array  
     */  
    protected $fillable = [  
        'name','user_id'
    ];  

    public function user() {
        return $this->belongsTo('App\User');
    }
}  