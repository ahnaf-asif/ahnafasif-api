<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
   
    public function index()
    {
        $all_portfolio = Portfolio::select('title', 'created_at', 'archive', 'id')->orderBy('id', 'desc')->get();
        return view('portfolio', [
            'all_portfolio' => $all_portfolio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-portfolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_portfolio = new Portfolio;
        $new_portfolio -> title = $request->title;
        $new_portfolio -> cover_pic = $request->cover_pic;
        $new_portfolio -> link = $request->link;
        $new_portfolio -> short_description = $request->short_description;
        $new_portfolio -> long_description = $request->long_description;
        
        $new_portfolio -> save();

        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return view('view-portfolio', [
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('edit-portfolio', [
            'portfolio' => $portfolio
        ]);
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
        $portfolio = Portfolio::find($id);

        $portfolio -> title = $request->title;
        $portfolio -> cover_pic = $request->cover_pic;
        $portfolio -> link = $request->link;
        $portfolio -> short_description = $request->short_description;
        $portfolio -> long_description = $request->long_description;
        
        $portfolio -> save();

        return redirect()->route('portfolio.show', ['portfolio' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function archive($id, $type){
        $portfolio = Portfolio::find($id);
        $portfolio->archive = $type;
        $portfolio->save();
        return redirect()->route('portfolio.show', ['portfolio' => $id]);
    }   
}
