<?php

/**
 * Reviews Model
 *
 * Reviews Model manages Reviews operation. 
 *
 * @category   Reviews
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2017 Techvillage
 * @license    
 * @version    1.3
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
	protected $table = 'reviews';

	public function users(){
        return $this->belongsTo('App\Models\User', 'sender_id', 'id');
    }

    public function properties(){
    	return $this->belongsTo('App\Models\Properties', 'property_id', 'id');
    }

    public function bookings(){
        return $this->belongsTo('App\Models\Bookings', 'booking_id', 'id');
    }
}
