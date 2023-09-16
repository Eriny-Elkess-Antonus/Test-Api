<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;


class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::get();
        return $this->sendResponse(NewsResource::collection($news),
        'All news sent');
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
        $input = $request->all();
        $validator = Validator::make($input , [
         'title'=> 'required',
         'description'=> 'required',
         
        ]  );
 
        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
     $news = News::create($input);
     return $this->sendResponse(new NewsResource($news) ,'News created successfully' );
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        if ( is_null($news) ) {
            return $this->sendError('News not found'  );
              }
              return $this->sendResponse(new NewsResource($news) ,'News found successfully' );
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
    public function update(Request $request, News $news)
    {
        $input = $request->all();
        // at2akd an klo mawgod 
        $validator = Validator::make($input , [
         'title'=> 'required',
         'description'=> 'required',
        ]  );

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
           // a3'yar fe rl 3'yar fe swa2 name aw price aw detail
     $$news->name = $input['title'];
     $$news->detail = $input['description']; 
     $$news->save();
     return $this->sendResponse(new NewsResource($news) ,'Product updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id)->delete();
        return $this->sendResponse(new NewsResource($news) ,'News deleted successfully' );

    }
}
