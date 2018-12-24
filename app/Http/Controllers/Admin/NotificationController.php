<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Data\Model\Notification;
use App\Http\Requests\Admin\NewsStoreRequest;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $notification = Notification::where('title', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $notification = Notification::latest()->paginate($perPage);
        }

        return view('admin.notification.index', compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsStoreRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NewsStoreRequest $request)
    {
        
        $requestData = $request->all();
        
        Notification::create($requestData);

        return redirect('notification')->with('flash_message', 'Notification added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        return view('admin.notification.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);

        return view('admin.notification.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsStoreRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(NewsStoreRequest $request, $id)
    {
        
        $requestData = $request->all();
        
        $notification = Notification::findOrFail($id);
        $notification->update($requestData);

        return redirect('notification')->with('flash_message', 'Notification updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Notification::destroy($id);

        return redirect('notification')->with('flash_message', 'Notification deleted!');
    }
}
