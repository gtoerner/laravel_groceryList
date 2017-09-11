<?php

namespace App\Http\Controllers;

use App\GroceryItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroceryItemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groceryitems', [
            'grocery_items' => GroceryItems::orderBy('created_at', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->validate(request(), [
            'name' => 'required'
        ]);

        GroceryItems::create($item);
        return back()->with('success', 'Item has been added');
        /*
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/groceryitems')
                ->withInput()
                ->withErrors($validator);
        }

        $item = new GroceryItems;
        $item->name = $request->name;
        $item->save;

        return redirect('/groceryitems');
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GroceryItems::find($id);
        $item->delete();
        return redirect('groceryitems')->with('success','Item has been  deleted');
    }

    public function addToList($id)
    {
        $item = GroceryItems::find($id);
        $item->isActive = 1;
        $item->save();
        return redirect('groceryitems')->with('success','Item has been  deleted');
    }
}
