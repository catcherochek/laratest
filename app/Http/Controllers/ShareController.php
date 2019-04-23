<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$shares = Share::all();
    	
    	return view('shares.index', compact('shares'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');//
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
    			'share_name'=>'required',
    			'share_price'=> 'required|integer',
    			'share_filename' => 'required',
    			'share_filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    			
    	]);
    	$name = '';
    	if($request->hasfile('share_filename')){
    		foreach($request->file('share_filename') as $image)
    		{
    			$name=$image->getClientOriginalName();
    			$image->move(public_path().'/images/', $name);
    			$data[] = $name;
    		}
    	}
    	
    	$share = new Share([
    			'share_name' => $request->get('share_name'),
    			'share_price'=> $request->get('share_price'),
    			'share_qty'=> $request->get('share_qty'),
    			'share_photo'=>$name,
    	]);
    	
    	$share->save();
    	return redirect('/shares')->with('success', 'Stock has been added');
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
    	
    	$share = Share::find($id);
    	
    	return view('shares.edit', compact('share'));
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
    	$request->validate([
    			'share_name'=>'required',
    			'share_price'=> 'required|integer',
    			'share_qty' => 'required|integer',
    			'share_filename' => 'required',
    			'share_filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    			
    	]);
    	$name ='';
    	if($request->hasfile('share_filename')){
    		foreach($request->file('share_filename') as $image)
    		{
    			$name=$image->getClientOriginalName();
    			$image->move(public_path().'/images/', $name);
    			$data[] = $name;
    		}
    	}
    	$share = Share::find($id);
    	$share->share_name = $request->get('share_name');
    	$share->share_price = $request->get('share_price');
    	$share->share_qty = $request->get('share_qty');
    	$share->share_photo= $name;
    	$share->save();
    	
    	return redirect('/shares')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$share = Share::find($id);
    	$share->delete();
    	
    	return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
