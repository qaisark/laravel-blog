@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> <h2>Qaisar Ansar.</h2></div>
                <div class="panel-body">
                    <div class="text-center">
                        <a href="/author/create" class="btn btn-primary">Create Author</a>
                        <a href="/dashboard" class="btn btn-primary">Dashboard</a>
                    </div>
                    <hr>
                  @if (count($authors)>0)
                  <table class="table table-striped" style="width:80%;margin:0 auto;">
                        <h3 class="text-center">Authors!</h3>
                    <tr>
                        <th>Author Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{$author->name}}</td>
                            <td>
                                <a href="/author/{{$author->id}}/edit" class="btn btn-default">Edit</a>
                            </td>
                            <td>
                                {!!Form::open(['action' => ['AuthorController@destroy', $author->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                  </table>
                  @else 
                   <p>You have no Posts!</p>
                  @endif
                </div>
            </div>
            <div class="text-center">   
                <p style="color:#777777;"><small>Powered By</small> <a href="http://www.goprogs.com">Go Progs Inc.</a></p>
            </div>
            <br>
        </div>
    </div>
@endsection
