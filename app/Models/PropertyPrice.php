<?php

/**
 * PropertyPrice Model
 *
 * PropertyPrice Model manages PropertyPrice operation. 
 *
 * @category   PropertyPrice
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
use App\Models\Currency;
use App\Models\PropertyDates;
use Session;
class PropertyPrice extends Model
{
	protected $table = 'property_price';
	public $timestamps = false;

    protected $appends = [ 'original_cleaning_fee', 'original_guest_fee', 'original_price', 'original_weekend_price', 'original_security_fee', 'default_code'];

	public function properties(){
        return $this->belongsTo('App\Models\Properties', 'property_id', 'id');
    }

    public function currency(){
    	return $this->belongsTo('App\Models\Currency','currency_code','code');
    }
    
    public function getOriginalCleaningFeeAttribute(){
        return $this->attributes['cleaning_fee'];
    }

    public function getOriginalGuestFeeAttribute(){
        return $this->attributes['guest_fee'];
    }

    public function getOriginalSecurityFeeAttribute(){
        return $this->attributes['security_fee'];
    }

    public function getOriginalPriceAttribute(){
        return $this->attributes['price'];
    }

    public function getOriginalWeekendPriceAttribute(){
        return $this->attributes['weekend_price'];
    }

    public function getWeeklyPriceAttribute(){
        return 0;
    }

    public function getMonthlyPriceAttribute(){
        return 0;
    }

    public function getPriceAttribute()
    {
        return $this->currency_convert('price');
    }

    /*public function getWeekAttribute()
    {
        return $this->currency_convert('week');
    }

    public function getMonthAttribute()
    {
        return $this->currency_convert('month');
    }*/

    public function getCleaningFeeAttribute(){
        return $this->currency_convert('cleaning_fee');
    } 

    public function getGuestFeeAttribute(){
        return $this->currency_convert('guest_fee');
    }

    public function getSecurityFeeAttribute(){
        return $this->currency_convert('security_fee');
    }

    public function getWeekendPriceAttribute(){
        return $this->currency_convert('weekend_price');
    }

    public function price($date)
    {
        $where = ['property_id' => $this->attributes['property_id'], 'date' => $date];

        $result = PropertyDates::where($where);

        if($result->count())
            return $result->first()->price;
        else
            return $this->currency_convert('price');
    }

    public function available($date)
    {
        $where = ['property_id' => $this->attributes['property_id'], 'date' => $date];
        
        $result = PropertyDates::where($where);

        if($result->count())
            return $result->first()->status;
        else
            return false;
    }

    public function currency_convert($field)
    {
        $rate = Currency::whereCode($this->attributes['currency_code'])->first()->rate;
        if($rate == 0) return 0;
        
        $unit = $this->attributes[$field] / $rate;

        $default_currency = Currency::where('default',1)->first()->code;

        $session_rate = Currency::whereCode((\Session::get('currency')) ? \Session::get('currency') : $default_currency)->first()->rate;

        return round($unit * $session_rate);
    }

    public function getDefaultCodeAttribute()
    {
        if(Session::get('currency'))
           return Session::get('currency');
        else
           return DB::table('currency')->where('default', 1)->first()->code;
    }
}
