@extends('layouts.app')
@section('content')
<div class="container">
    <br>
    <div class="col-md-12 col-sm-12">
      <div class="col-md-8 col-sm-8">
            <p>Readers top Picks!</p>
            <hr>
        @if (count($articles)>0)
          @foreach ($articles as $article)
          @if (strpos($article->cat_name, 'urdu') !== false)
          <div class="text-right" style="font-family: 'Noto Nastaliq Urdu Draft', serif !important; line-height:3.5em;">
          <div class="">
              <div class="card flex-md-row mb-4 h-md-250">
                <div class="card-body d-flex flex-column">
                    <h3 class="mb-0">
                      <a class="text-primary" href="/articles/{{$article->id}}" style="line-height:2.2em;">{{$article->title}}</a>
                    </h3>
                          <small class="text-muted">{{ date('F d, Y', strtotime($article->created_at))}} &nbsp; : لکھا گیا <i class="glyphicon glyphicon-time"></i></small>
                         <p class="card-text mb-auto">
                             {!!substr($article->body,0,300)!!}...
                        </p>
                      <p class="text-left text-success"><a href="/articles/{{$article->id}}">مزید پڑھیے</a></p>
                    </div>
              </div>
          </div>
          </div>
          @else 
          <div class="text-left">
                <div class="">
                    <div class="card flex-md-row mb-4 h-md-250">
                      <div class="card-body d-flex flex-column">
                          <h3 class="mb-0">
                            <a class="text-primary" href="/articles/{{$article->id}}">{{$article->title}}</a>
                          </h3>
                            <div class="mb-1 text-muted"><i class="glyphicon glyphicon-time"></i> {{ date('F d, Y', strtotime($article->created_at))}}</div>
                            <p class="card-text mb-auto">{!!substr($article->body,0,300)!!} ...</p>
                            <p class="text-right text-success"><a href="/articles/{{$article->id}}">Continue reading</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
          @endforeach
          {{ $articles->links() }}
        @endif
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="news">
            <div>
                @if (count($newarticleseng)>0)
                <?php  $c=0; ?>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>New Articles / English</th>
                        </tr>
                    </thead>
                    @foreach ($newarticleseng as $newarticle)
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
                @if (count($newarticlesurdu)>0)
                <?php  $c=0; ?>
                <table class="table table-condensed text-right" style="font-family: 'Noto Nastaliq Urdu Draft', serif !important;">
                    <thead>
                        <tr>
                            <th>
                                <p class="text-right"> نئے آرٹیکل / اُردو</p>
                            </th>
                        </tr>
                    </thead>
                    @foreach ($newarticlesurdu as $newarticle)
                    @if ($newarticle->cat_name == "urdu")
                    @if ($c < 20) 
                        <tr>
                            <td>
                                <p><a href="/articles/{{$newarticle->id}}">{{$newarticle->title}}</a></p>
                                <small>{{ date('F d, Y', strtotime($newarticle->created_at))}} &nbsp; : لکھا گیا <i class="glyphicon glyphicon-time"></i></small>
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
    <div class="">
                <div class="subscribe-box">
                    <h6 class="text-center">Subscribe to receive Newsletter</h6>
                    <form action="/">

                        <div class="form-group">
                            <label for="s-email">Email</label>
                            <input type="email" class="form-control" id="s-email">
                        </div>

                        <div class="form-group">
                            <label for="s-name">Full Name</label>
                            <input type="text" class="form-control" id="s-name">
                        </div>

                        <p class="small">By clicking the Subscribe button, you agree to our terms of service and privacy statement .</p>
                        
                        <button type="submit" class="btn btn-primary btn-block mb-2">Subscribe</button>
                    </form>
                </div>
            </div>
    <br>
      </div>
    </div>
  </div>
@endsection