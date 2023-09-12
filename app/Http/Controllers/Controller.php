namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreteController extends Controller
{
public function index()
{
$freteData = DB::table('frete')->get();

return view('frete.index', ['freteData' => $freteData]);
}
}