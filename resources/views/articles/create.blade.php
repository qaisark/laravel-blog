@extends('layouts.admin')
@section('content')
<br>
<a href="{{URL::previous()}}" class="btn btn-default">Go Back</a>
<div class="well">
                <h1>Create Article</h1>
                <hr>
                {!! Form::open(['action' => 'ArticlesController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                 <div class="form-group">
                        {!! Form::Label('category', 'Select Category') !!}
                        <select name="cat_name" class="form-control">
                            @foreach ($cats as $cat)
                             <option value="{{$cat->cat_name}}">{{$cat->cat_name}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        {{Form::label('tags' , 'Tags')}}
                        {{Form::text('tags' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'Educations,technology ...' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                        {!! Form::Label('category', 'Select Author') !!}
                        <input list="author_names" name="author_id" class="form-control" placeholder="Hamid Mir">
                        @if(count($authors)>0)
                            <datalist id="author_names">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </datalist>
                        @endif
                    </div> 
                   <div class="form-group">
                        {{Form::label('title' , 'Title')}}
                        {{Form::text('title' , '' , 
                        ['class' => 'form-control' , 'placeholder' => 'Title' , 'required' => 'required'])
                        }}
                    </div>
                    <div class="form-group">
                            {{Form::label('body' , 'Body')}}
                            {{Form::textarea('body' , '' , 
                            ['id' => 'article-ckeditor','class' => 'form-control' , 'placeholder' => 'Body', 'required' => 'required'])
                            }}
                    </div>
                    <div class="form-group">
                            {{Form::label('title' , 'Select Article Cover Image')}}
                        {{Form::file('article_image')}}
                    </div>
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
</div>       
@endsection