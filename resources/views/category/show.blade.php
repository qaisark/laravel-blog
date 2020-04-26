@extends('layouts.app')
@section('content')
<div class="container">
    <br>
        <p style="border-bottom:1px solid #eaeaea;" class="text-uppercase">Home / {{$title}}</p>
        <div class="col-md-8 col-sm-8"> 
                @if (count($articles)>0)
                    @foreach ($articles as $article)
                    @if (strpos($article->cat_name, 'urdu') !== false || strpos($article->cat_name, 'poetry') !== false)
                        <div class="text-right" style="font-family: 'Noto Nastaliq Urdu Draft', serif !important; line-height:3.5em;">
                                <div class="col-md-11 col-sm-11">
                                        <div class="card flex-md-row mb-4 h-md-250">
                                        <div class="card-body d-flex flex-column">
                                            <h2 class="mb-0">   
                                                <a class="text-right text-primary" href="/articles/{{$article->id}}">{{$article->title}}</a>
                                            </h2>
                                            <p>{{ date('F d, Y', strtotime($article->created_at))}} &nbsp; : لکھا گیا <i class="glyphicon glyphicon-time"></i></p>
                                            <p class="card-text mb-auto">{!!substr($article->body,0,200)!!} ...</p>
                                            <p><a href="/articles/{{$article->id}}">مزید پڑھیے</a></p>
                                        </div>
                                        </div>
                                </div>
                        </div>
                    @else 
                        <div class="text-left">
                                <div class="col-md-11 col-sm-11">
                                        <div class="card flex-md-row mb-4 h-md-250">
                                        <div class="card-body d-flex flex-column align-items-start">
                                            <h3 class="mb-0">
                                                <a class="text-dark" href="/articles/{{$article->id}}">{{$article->title}}</a>
                                            </h3>
                                            <div class="mb-1 text-muted">{{ date('F d, Y', strtotime($article->created_at))}}</div>
                                            <p class="card-text mb-auto">{!!substr($article->body,0,200)!!} ...</p>
                                            <a href="/articles/{{$article->id}}" class="text-primary">Continue reading</a>
                                   </div>
                        </div>
                        </div>
                        </div>
                    @endif
                    @endforeach
                @endif
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="news">
                    <div>
                        @if (count($newarticles)>0)
                        <?php  $c=0; ?>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>New Articles / English</th>
                                </tr>
                            </thead>
                            @foreach ($newarticles as $newarticle)
                            @if ($newarticle->cat_name == "english")
                                @if ($c < 15) 
                                <tr>
                                    <td>
                                        <p><a href="/articles/{{$newarticle->id}}">{{$newarticle->title}}</a></p>
                                        <p><small><i class="glyphicon glyphicon-time"></i> {{ date('F d, Y', strtotime($newarticle->created_at))}}</small></p>
                                    </td>
                                </tr>
                                <?php $c++; ?>
                                @endif
                            @endif
                            @endforeach
                        </table>
                    @endif
                    </div>
            </div>
            <div class="news">
                    <div>
                        @if (count($newarticles)>0)
                        <?php  $c=0; ?>
                        <table class="table table-condensed text-right" style="font-family: 'Noto Nastaliq Urdu Draft', serif !important;">
                            <thead>
                                @if ($c < 15) 
                                <tr>
                                    <th>
                                        <p class="text-right"> نئے آرٹیکل / اُردو</p>
                                    </th>
                                </tr>
                                <?php $c++; ?>
                                @endif
                            </thead>
                            @foreach ($newarticles as $newarticle)
                            @if ($newarticle->cat_name == "urdu")
                                <tr>
                                    <td>
                                        <p><a href="/articles/{{$newarticle->id}}">{{$newarticle->title}}</a></p>
                                        <small>{{ date('F d, Y', strtotime($newarticle->created_at))}} &nbsp; : لکھا گیا <i class="glyphicon glyphicon-time"></i></small>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </table>
                    @endif
                    </div>
            </div>
            <br>
        </div>
</div>
@endsection