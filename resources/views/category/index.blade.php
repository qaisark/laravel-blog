@extends('layouts.admin')
@section('content')
<div class="well">
    <a href="/dashboard" class="btn btn-default">Back to Dashboard</a>
    <hr>
    <h1>Dashboard / Category</h1>
    <a href="category/create" class="btn btn-primary">Create Category</a>
    <hr>
    <div class="panel panel-default">
        @if (count($cats)>0)
            <table class="table table-striped">
                <tr>
                    <th>Category Title</th>
                    <th></th>
                </tr>
                @foreach ($cats as $cat)
                <tr>
                    <td>{{$cat->cat_name}}</td>
                    <td>
                        {!!Form::open(['action' => ['CategoryController@destroy', $cat->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </table>
        @else 
            <p>You have no Category!</p>
        @endif
    </div>
</div>
@endsection
