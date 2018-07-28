<?php

/**
 * Reviews Controller
 *
 * Reviews Controller manages Reviews by admin. 
 *
 * @category   Reviews
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2017 Techvillage
 * @license    
 * @version    1.3
 * @link       http://techvill.net
 * @email      support@techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ReviewsDataTable;
use App\Models\Reviews;
use Validator;
use App\Http\Helpers\Common;
class ReviewsController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }
	
    public function index(ReviewsDataTable $dataTable)
    {
        return $dataTable->render('admin.reviews.view');
    }
   
    public function add(Request $request)
    {

       
    }
    
    public function update(Request $request)
    {

      
    }
    
    public function delete(Request $request)
    {
        
    }
}
