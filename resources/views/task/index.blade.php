@extends('layout.main')
@section('content')
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
@endsection
