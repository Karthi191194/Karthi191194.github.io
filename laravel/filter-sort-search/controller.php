public function index(Request $request)
{
    $sortBy = 'id';
    $orderBy = 'desc';
    $perPage = 20;
    $q = null;

    if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
    if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
    if ($request->has('perPage')) $perPage = $request->query('perPage');
    if ($request->has('q')) $q = $request->query('q');

    $users = User::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
    return view('users.index', compact('users', 'orderBy', 'sortBy', 'q', 'perPage'));
}