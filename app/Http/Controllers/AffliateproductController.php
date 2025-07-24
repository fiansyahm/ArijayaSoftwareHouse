<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Affliateproduct;

class AffliateproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affliateproducts = Affliateproduct::all();
        return view('affliateproducts.index', compact('affliateproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('affliateproducts.create');
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
            'name' => 'required',
            'url' => 'required',
            'isActive' => 'required|boolean',
        ]);

        Affliateproduct::create($request->all());

        return redirect()->route('affliateproducts.index')
            ->with('success', 'Product created successfully.');
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
    public function edit(Affliateproduct $affliateproduct)
    {
        return view('affliateproducts.edit', compact('affliateproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affliateproduct $affliateproduct)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'isActive' => 'required|boolean',
        ]);

        $affliateproduct->update($request->all());

        return redirect()->route('affliateproducts.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affliateproduct $affliateproduct)
    {
        $affliateproduct->delete();

        return redirect()->route('affliateproducts.index')
            ->with('success', 'Product deleted successfully');
    }
}
