<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contents = Storage::disk('local')->exists('contents.json')? \GuzzleHttp\json_decode(Storage::disk('local')
            ->get('contents.json'), true) : [];
        return view('home',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $body = $request->get('body');

        $contents = Storage::disk('local')->exists('contents.json')? \GuzzleHttp\json_decode(Storage::disk('local')
            ->get('contents.json'), true) : [];
        array_push($contents,[
            "id" => count($contents),
            "title" => $title,
            "body" => $body
        ]);

        Storage::disk('local')->put('contents.json',\GuzzleHttp\json_encode($contents));
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $contents = Storage::disk('local')->exists('contents.json')? \GuzzleHttp\json_decode(Storage::disk('local')
            ->get('contents.json'), true) : [];
        foreach ($contents as $content){
            if ($content["id"] == $id){
                return view('post',compact('content'));
            }
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $contents = \GuzzleHttp\json_decode(Storage::disk('local')->get('contents.json'),true);
        foreach ($contents as $content){
//            dd($content);
            if ($content["id"] == $id){
                return view('create',compact('content'));
            }
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $title = $request->get('title');
        $body = $request->get('body');

        $contents = \GuzzleHttp\json_decode(Storage::disk('local')->get('contents.json'),true);
        foreach ($contents as $index => $value ){
            if ($value["id"] == $id){
                $contents[$index]["title"] = $title;
                $contents[$index]["body"] = $body;
                Storage::disk('local')->put('contents.json',\GuzzleHttp\json_encode($contents));
                return redirect()->route('blog.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function destroy($id)
    {
        $contents = \GuzzleHttp\json_decode(Storage::disk('local')->get('contents.json'),true);
        foreach ($contents as $index => $value ){
            if ($value["id"] == $id){
                unset($contents[$index]);
                Storage::disk('local')->put('contents.json',\GuzzleHttp\json_encode($contents));
                return redirect()->route('blog.index');
            }
        }
    }
}
