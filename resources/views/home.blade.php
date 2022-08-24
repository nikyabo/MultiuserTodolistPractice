<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/19d82403b1.js" crossorigin="anonymous"></script>
    <title>To do list</title>
</head>
<body class="bg-dark">
    <div class="container w-25 mt-5 bg-light">
        <div class="card-body">
            <h3 class="text-dark py-2">TO DO LIST</h3>
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf 
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                    <button type="submit" class="btn btn-primary btn-sm px-4"><i class="fas fa-plus"></i></button>
                </div>
            </form>
            <!-- if task count -->
            @if(count($todolists))
            <ul class="list-group list-group-flush">    
                @foreach($todolists as $todolist)    
                    <li class="list-group-item bg-light">
                        <form action="{{ route('destroy',$todolist->id) }}" method="POST">
                            {{ $todolist->content }}
                            @csrf
                            @method('delete')
                
                            <button type="submit" class="btn btn-link btn-sm float-right"><i class="fas fa-trash text-danger"></i></button>

                        </form>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</body>
</html>