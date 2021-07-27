<nav></nav>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div style="background: blue; height: 50px; padding:0">

</div>
<div style="padding:20px" class="container">
    <div class="row">
        <div class="col">

        </div>
        <div style="padding: 10px" class="col">
            <h4>Playlist dos vídeos</h4>
        </div>
        <div class="col">

        </div>
    </div>

    <a href="{{ asset('/cadastro') }}"> <button style="width: 200px; right:250px;position: absolute;"
            class="btn btn-primary">Adicionar Vídeo</button> </a>
    @foreach ($videos as $video)
        <Br><br><Br>

        <div class="row">
            <div class="col-5">
                <a href="{{ Asset('public/videos/' . $video->video) }}" target="_blanck"><img height="250px"
                        src="{{ Asset('public/img/' . $video->image) }}" /></a>
            </div>
            <div class="col">
                <p><b>Título:</b> {{ $video->titulo }}</p>
                <p><b>Descrição: </b> {{ $video->descricao }}</p>
                <p><b>Data de envio:</b> {{ $video->created_at }}</p>
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-primary" onclick="window.location='{{ Asset("/editar/$video->id") }}'">Editar</button>
                    </div>
                    <div class="col">
                        <a style="background-color: red" class="btn btn-secondary"
                            onclick="return confirm('Deseja Deletar?')"
                            href="{{ asset("/deletar/$video->id") }}">Excluir</a>

                    </div>
                </div>
            </div>

        </div>



    @endforeach
