@extends('layouts.admin')
@section('content')
        <br>
        <a href="{{URL::previous()}}" class="btn btn-default">Go Back</a>
        <div class="well">
                <h1>Edit Article</h1>
                {!! Form::open(['action' => ['ArticlesController@update', $article->id] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('title' , 'Title')}}
                        {{Form::text('title' , $article->title , 
                        ['class' => 'form-control' , 'placeholder' => 'Title' , 'required' => 'required'])
                        }}
                    </div>  
                    <div class="form-group">
                            {{Form::label('body' , 'Body')}}
                            {{Form::textarea('body' , $article->body , 
                            ['id' => 'article-ckeditor','class' => 'form-control' , 'placeholder' => 'Body', 'required' => 'required'])
                            }}
                    </div>
                    <div class="form-group">
                            {{Form::file('article_image')}}
                        </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
@endsection