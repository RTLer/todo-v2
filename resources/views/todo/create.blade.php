<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>a simple todo list</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h1>todo list</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('todo.store')}}">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="title">
                            @if($errors->has('title'))
                                <p>{{$errors->get('title')[0]}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="expire_at">expire at</label>
                            <input type="text" name="expired_at" value="" class="form-control" id="expire_at" aria-describedby="expire_at" placeholder="expire at">
                            @if($errors->has('expired_at'))
                                <p>{{$errors->get('expired_at')[0]}}</p>
                            @endif
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
