<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

     <!-- ✅ load jQuery (optional) ✅ -->
     <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>


    <!-- ✅ load Bootstrap bundle ✅ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/19d82403b1.js" crossorigin="anonymous"></script>
    <title>To do list</title>
</head>
<nav class="nav bg-light d-flex flex-horizontal">
    
<div class="dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Hi! {{ Auth::user()->name }}</a>
    <div class="dropdown-menu">
        
    <form method="PUT" action="{{ route('dashboard') }}">
        @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </form>

        <form method="POST" action="{{ route('logout') }}">
        @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
        </div></a>
    </div>
</div>
    
</nav>
<body class="bg-dark">
    <div class="container w-25 mt-5 bg-light">
        <div class="card-body">
            <h3 class="text-dark py-2">TO DO LIST</h3>
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf 
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"class="form-control">
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
                            <button type="submit" class="btn btn-link btn-sm float-right position:absolute"><i class="fas fa-trash text-danger"></i></button>

                        </form>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</body>
</html>
