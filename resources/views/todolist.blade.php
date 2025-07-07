<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container vh-100">
        <div class="row h-100">
            <div class="col-11 col-md-8 col-lg-6 mx-auto my-auto shadow-lg p-4">
                <h2 class="text-center">Todo List</h2>

                <form action="/todo/add" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                    <input name="todo" type="text" class="form-control" placeholder="What do you want to do?">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Save</button>
                    </div>
                </form>

                <ul class="list-group list-group-flush overflow-auto" style="max-height: 350px;">
                    @foreach ($todos as $todo)

                    <li class="list-group-item d-flex justify-content-between {{ ($todo->status)? 'list-group-item-success' : ''}}">
                        <a class="btn btn-light" href="/todo/delete{{$todo->id}}">
                            <i class="bi bi-x-lg"></i>
                        </a>
                        @if ($todo->status)
                        <del>{{$todo->todo}}</del>
                        @else
                        {{$todo->todo}}
                        @endif

                        <a class="btn btn-light" href="/todo/update{{$todo->id}}">
                            <i class="bi-{{ ($todo->status)? 'arrow-counterclockwise' : 'check-lg'}}"></i>
                        </a>
                    </li>


                    @endforeach
                
                </ul>

            </div>
        </div>
    </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>