<?php

/**
 * PaymentDew Model
 *
 * PaymentDew Model manages PaymentDew operation. 
 *
 * @category   PaymentDew
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

class Payouts extends Model
{
	protected $table = 'payouts';

	public function bookings(){
    	return $this->belongsTo('App\Models\Bookings', 'booking_id', 'id');
    }

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function payout_penalties(){
    	return $this->hasMany('App\Models\PayoutPenalties', 'payout_id', 'id');
    }
}