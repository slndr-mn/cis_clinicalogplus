
use Illuminate\Http\Request;
use App\Models\StaffUser; // or your actual model

public function index(Request $request)
{
    $search = $request->input('search');

    $staffUsers = StaffUser::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    })->paginate(10);

    return view('admin.staffuser', compact('staffUsers', 'search'));
}
