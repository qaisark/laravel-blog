@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <br>
        <p style="border-bottom:1px solid #eaeaea;" class="text-uppercase">Full  Story</p>
        <div class="">
                <div class="fs">
                    @if (strpos($article->cat_name, 'urdu') !== false)
                    <div dir="rtl">
                     <div class="col-md-8 col-sm-8" dir="rtl">
                        <div class="text-right" style="font-family: 'Noto Nastaliq Urdu Draft', serif !important; line-height:3.6em;">
                                <h2 class=".h1" style="line-height:2em;">{{$article->title}}</h2>
                                <hr>
                                @if (!($article->article_image == "noimage.jpg"))
                                    <img style="width:100%;height:500px;" src="/storage/article_images/{{$article->article_image}}" alt="No Image Found">  
                                @endif
                                <div style="height:auto;" class="text-justify">
                                    {!!$article->body!!}
                                </div>
                                <hr>
                                <p>{{ date('F d, Y', strtotime($article->created_at))}} &nbsp; : لکھا گیا <i class="glyphicon glyphicon-time"></i></p>
                                <h4><strong>{{$article->views}}</strong>&nbsp; :پڑھ چکے</h4>    
                        </div>
                      </div>
                    </div>
                      @else 
                      <div class="text-left">
                          <div class="col-md-8 col-sm-8">
                                <h2 class="h1">{{$article->title}}</h2>
                                <hr>    
                                @if (!($article->article_image == "noimage.jpg"))
                                    <img style="width:100%;height:500px;" src="/storage/article_images/{{$article->article_image}}" alt="No Image Found">  
                                @endif
                                <div style="height:auto;" class="h4 text-justify">
                                <p>{!!$article->body!!}</p>
                                </div>
                                <hr>
                                <p><i class="glyphicon glyphicon-time"></i> Written on: {{ date('F d, Y', strtotime($article->created_at))}}</p>
                                <h4>Views : <strong>{{$article->views}}</strong></h4>
                          </div>
                      </div>                      
                    @endif    
                </div>
                
        </div>
       
</div>
@endsection 