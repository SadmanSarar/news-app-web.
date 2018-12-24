<?php

namespace App\Http\Controllers\Admin;

use App\Data\Model\Reader;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\Reader\CreateRequest;
use App\Http\Requests\Admin\Reader\UpdatePasswordRequest;
use App\Http\Requests\Admin\Reader\UpdateRequest;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $reader = Reader::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reader = Reader::latest()->paginate($perPage);
        }

        return view('admin.reader.index', compact('reader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.reader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest|Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateRequest $request)
    {

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $requestData['password'] = bcrypt($requestData['password']);

        Reader::create($requestData);

        return redirect('reader')->with('flash_message', 'Reader added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $reader = Reader::findOrFail($id);

        return view('admin.reader.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $reader = Reader::findOrFail($id);

        return view('admin.reader.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $oldReader = Reader::where('email', '=', $request['email'])->first();
        if ($oldReader != null && $oldReader->id != $id) {
            return redirect()->back()->withErrors([
                                                      'email' => 'Email already taken'
                                                  ]);
        }

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $reader = Reader::findOrFail($id);
        $reader->update($requestData);

        return redirect('reader')->with('flash_message', 'Reader updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Reader::destroy($id);

        return redirect('reader')->with('flash_message', 'Reader deleted!');
    }

    /**
     * @param UpdatePasswordRequest $request
     */
    public function update_pass(UpdatePasswordRequest $request,$id){
        $reader = Reader::findOrFail($id);

        $reader->password = bcrypt($request['password']);

        $reader->save();

        return redirect()->route('reader.show',$id);
    }
}
