<nav></nav>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div style="background: blue; height: 50px; padding:0">

</div>
<div style="padding:20px" class="container">
    <div class="row">
        <div class="col">
            <a href="{{ asset('/') }}">
                <button class="btn btn-primary">Voltar</button> </a> <br><br>
        </div>
        <div style="padding: 10px" class="col">
            <h4>Tela de cadastro de vídeos</h4>
        </div>
        <div class="col">

        </div>
    </div>

    <form action="{{ asset('/') }}" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <label class="form-label">Título do vídeo: </label>
            <input type="text" id="titulo" name="titulo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição do vídeo:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem de destaque: </label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Vídeo : </label>
            <input type="file" id="video" name="video" class="form-control">
        </div>
        <div align="center">
            <button type="submit" style="width: 200px" class="btn btn-primary">Enviar Vídeo</button>
        </div>

    </form>
</div>
