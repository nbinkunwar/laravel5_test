<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexQuoteGetRequest;
use App\Http\Requests\StoreQuotePostRequest;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexQuoteGetRequest $req
     * @return Response
     */

    public function index(IndexQuoteGetRequest $req)
    {
        if (!$req->has('sp')){
            $sp = 0;
        } else {
            $sp = intval($req->input('sp'));
        }

        $response = [
            'sp' => $sp + 10,
            'quotes' => Quote::orderBy('created_at', 'desc')->skip($sp)->take(10)->get()
        ];

        if(count($response['quotes'])  > 0) {
            return response()->json($response, 200);
        } else {
            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreQuotePostRequest $req
     * @return Response
     */
    public function store(StoreQuotePostRequest $req)
    {
        $quote = Quote::create($req->only('quote', 'author', 'image'));

        return response()->json($quote, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return response()->json($quote, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
