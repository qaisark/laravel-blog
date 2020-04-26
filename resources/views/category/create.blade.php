@extends('layouts.admin')
@section('content')
<br>
<a href="{{URL::previous()}}" class="btn btn-default">Go Back</a>
<div class="well">
                <h1>Create Category</h1>
                <hr>
                {!! Form::open(['action' => 'CategoryController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                 <div class="form-group">
                        {!! Form::Label('category', 'Category Name') !!}
                        {{Form::text('cat_name' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'category name' , 'required' => 'required'])
                        }}
                    </div> 
                    {{Form::submit('Add',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
</div>       
@endsection