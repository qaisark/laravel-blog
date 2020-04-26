@extends('layouts.admin')
@section('content')
<br>
<a href="{{URL::previous()}}" class="btn btn-default">Go Back</a>
<div class="well">
                <h1>Create Author</h1>
                <hr>
                {!! Form::open(['action' => 'AuthorController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                   <div class="form-group">
                        {{Form::label('title' , 'Name')}}
                        {{Form::text('name' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'Title' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                        {{Form::label('title' , 'Nationality')}}
                        {{Form::text('nationality' , '' , 
                         ['class' => 'form-control' , 'placeholder' => 'Pakistan' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                        {{Form::label('title' , 'Age')}}
                        {{Form::text('age' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'Age' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                        {{Form::label('title' , 'Current Organization')}}
                        {{Form::text('current_org' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'Current Working Organization' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                            {{Form::label('body' , 'Description')}}
                            {{Form::textarea('bio' , '' , 
                            ['id' => 'article-ckeditor','class' => 'form-control' , 'placeholder' => 'Body', 'required' => 'required'])
                            }}
                    </div>
                    <div class="form-group">
                            {{Form::label('title' , 'Select Author Profile Image')}}
                        {{Form::file('author_image')}}
                    </div>
                    {{Form::submit('Create',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
</div>       
@endsection