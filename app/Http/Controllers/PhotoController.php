<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $search = $request->input('search');

        // 検索クエリが存在する場合は、それに基づいて写真を取得
        if ($search) {
            $photos = Photo::where('filename', 'like', "%{$search}%")->get();
        } else {
            // 検索クエリが存在しない場合は、全ての写真を取得
            $photos = Photo::all();
        }

        return view('photos.index', ['photos' => $photos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'photo' => 'required|image|max:2048'
        // ]);

        $photo = new Photo;
        $photo ->user_id = Auth::id();
        $photo->filename = $request->photo->store('photos', 'public');

        $photo->save();

        return redirect()->route('photos.show', ['id' => $photo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        return view('photos.show', ['photo' => $photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);

        return view('photos.edit', ['photo' => $photo]);
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
            'photo' => 'required|image|max:2048'
            ]);

        $photo = Photo::FindOrFail($id);
        Storage::delete($photo->filename);
        $photo->filename = $request->photo->store('photos');

        $photo->save();

        return redirect()->route('photos.show', ['id' => $photo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::delete($photo->filename);
        $photo->delete();

        return redirect()->route('photos.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
