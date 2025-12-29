<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Contact;
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $message;
    protected $memberType;
    protected $committeeType;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                // Retrieve user's messages
                $this->message = Contact::get();
                view()->share('message', $this->message);
            }
            // Retrieve Member types
            $this->memberType = MemberType::orderBy('index', 'ASC')->get();
            view()->share('memberType', $this->memberType);
            // Retrieve Committee types
            $this->committeeType = CommitteeType::get(); // Fixed assignment
            view()->share('committeeType', $this->committeeType);
            
            return $next($request);
        });
    }
}
