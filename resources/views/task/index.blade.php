<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 600;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  ToDoList
                </div>
                @if(Session::has('flash_message'))
                  <div class="alert alert-success flash ">
                      {{ Session::get('flash_message') }}
                  </div>
                @endif
                @if(Session::has('flash_message_delete'))
                  <div class="alert alert-danger flash">
                      {{ Session::get('flash_message_delete') }}
                  </div>
                @endif
                <div class="container">
                  <div class="d-inline">
                    <button type="button" name="add" class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addModal">Add Task</button>

                  </div>
                  <table class="table">
                    <thead class="thead-default">
                      <tr>
                        <th>ID #</th>
                        <th>Task Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tasks as $key => $task)
                      <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td class="text-left">{{str_limit($task->title , 30 )}}</td>
                        <td class="text-left" >{{str_limit($task->description,100)}}</td>
                        <td class="text-left">{{$task->created_at}}</td>
                        <td>
                          @if($task->completed == 0)
                          {{Form::open([ 'method'  => 'POST', 'route' => [ 'task.completed', $task->id ] ])}}
                              {{Form::button('Finished', array('type' => 'submit', 'class' => 'btn btn-success btn-sm'))}}
                          {{ Form::close() }}
                        @else
                        <button type="button" name="Finised" class="btn btn-info btn-sm disabled">Done</button>
                        @endif
                      </td>
                        <td> {{Form::open([ 'method'  => 'DELETE', 'route' => [ 'task.destroy', $task->id ] ])}}
                                {{Form::button('Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}
                                {{ Form::close() }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
            @include('task.partials.addModal');


    </body>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function() {
            $('.flash').fadeOut('fast');
          }, 3000); // <-- time in milliseconds 3 sseconds
      });
    </script>
</html>
