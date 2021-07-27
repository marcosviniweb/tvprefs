<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    public function index()
    {

        $videos = Video::all()->sortByDesc("created_at");

        return view('welcome', ['videos' => $videos]);
    }

    public function deletar($id)
    {
        $videos = Video::where('id', $id)->delete();
        $this->json();
        return  redirect('/');
    }

    public function editar($id)
    {
        $videos = Video::get()->where('id', $id)->first();

        return view('editar', ['video' => $videos]);
    }

    public function edit(Request $request, $id)
    {


        // UPLAOD IMAGE


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extesion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestImage->move(public_path('img/'), $imageName);

            
        }

        // UPLOAD DO VIDEO 

        if ($request->hasFile('video') && $request->file('video')->isValid()) {

            $requestVideo = $request->video;

            $extesion = $requestVideo->extension();

            $imageVideo = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestVideo->move(public_path('videos/'), $imageVideo);

        }

        $affected = DB::table('videos')
            ->where('id', $request->id)
            ->update([
                'titulo' => $request->titulo,
                'descricao'=>$request->descricao,
                'image' => $imageName,
                'video'=>$imageVideo

            ]);


        // dd($request->file('video'));

        //Atualizando json
        $this->json();
        return redirect('/');
    }

    public function json()
    {
        $videos = Video::all();
        $playlist_dados = [];
        for ($i = 0; $i < Video::all()->groupBy('id')->count(); $i++) {
            array_push($playlist_dados, [
                "longDescription" => $videos[$i]->descricao,
                "thumbnail" => "https://decompmt.com.br/midias/" . $videos[$i]->image,
                "releaseDate" => "2020-01-15",
                "genres" => [
                    "educational"
                ],
                "tags" => [
                    "getting-started"
                ],
                "id" => "shortform-roku-streaming-overview",
                "shortDescription" => $videos[$i]->descricao,
                "title" => $videos[$i]->titulo,
                "content" => [
                    "duration" => 100,
                    "videos" => [array(
                        "videoType" => "MP4",
                        "url" => "https://decompmt.com.br/midias/" . $videos[$i]->video,
                        "quality" => "HD"
                    )],
                    "language" => "en-us",
                    "dateAdded" => "2020-01-15T02:39:11Z"
                ]
            ]);
        }
        $dados = [
            "providerName" => "Roku Developers",
            "language" => "en-US",
            "lastUpdated" => "2020-03-15T02:01:00+02:00",
            "Playlist" => $playlist_dados

        ];
        $path = 'Arquivo_json/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $json = json_encode($dados);
        file_put_contents($path . "inf.json", $json);
        return $dados;
    }

    public function cadastro(Request $request)
    {

        $event = new Video;
        $event->titulo  = $request->titulo;
        $event->descricao  = $request->descricao;

        // UPLAOD IMAGE


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extesion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestImage->move(public_path('img/'), $imageName);

            $event->image  =  $imageName;
        }

        // UPLOAD DO VIDEO 

        if ($request->hasFile('video') && $request->file('video')->isValid()) {

            $requestVideo = $request->video;

            $extesion = $requestVideo->extension();

            $imageVideo = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestVideo->move(public_path('videos/'), $imageVideo);

            $event->video  =  $imageVideo;
        }


        // dd($request->file('video'));

        $event->save();
        //Atualizando json
        $this->json();
        return redirect('/');
    }
}
