@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> <h2>Qaisar Ansar.</h2></div>
                <div class="panel-body">
                    <div class="text-center">
                        <a href="/articles/create" class="btn btn-primary">Create Article</a>
                        <a href="/author" class="btn btn-primary">Author Dashboard</a>
                        <a href="/category" class="btn btn-primary">Category Dashboard</a>
                        <a href="/"></a>
                            <a href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                        </a>
                    </div>
                    <hr>
                  @if (count($articles)>0)
                  <table class="table table-striped" style="width:80%;margin:0 auto;">
                        <h3 class="text-center">Your Articles!</h3>
                    <tr>
                        <th>Post Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->title}}</td>
                            <td>
                                <a href="/articles/{{$article->id}}/edit" class="btn btn-default">Edit</a>
                            </td>
                            <td>
                                {!!Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
