<?php

/**
 * PropertyDetails Model
 *
 * PropertyDetails Model manages PropertyDetails operation. 
 *
 * @category   PropertyDetails
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

class PropertyDetails extends Model
{
	protected $table = 'property_details';
	public $timestamps = false;
	protected $fillable = ['property_id', 'field', 'value'];

	public function properties(){
        return $this->belongsTo('App\Models\Properties', 'property_id', 'id');
    }
}
