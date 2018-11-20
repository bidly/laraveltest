@include('inc.header')
@section('name', '| {{ $post->name}} ')
<?php $postidd = 'sdf'; ?>

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> {{ $post->name }}</h1>
            <p> {{ $post->description }}</p>
            <?php $postidd = $post->id; ?>

            @if( auth()->check() )
                <form method="POST" action="{{ url('/comment') }}">
                    {{csrf_field()}}
                    @if(count($errors) >0 )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Add Comment</label>
                            <input type="text"  class="form-control" name="comment">
                        </div>

                        <div class="form-group">
                            <input type="hidden"  value="{{$postidd}}" class="form-control" name="post_id">
                        </div>

                        <div class="form-group">
                            <input type="hidden"  value="{{ auth()->user()->name}}" class="form-control" name="user">
                        </div>


                    <input type="submit" value="Submit">
                </form>
            @endif

            <tbody>


            <div class="page-header">
                <h1><small class="pull-right"></small> Comments </h1>
            </div>
            <div class="comments-list">
            @if(count($comments) > 0)
                @foreach($comments->all() as $comments)
                    <div class="media">
                        <div class="media-body">

                            <h4 class="media-heading user_name">{{ $comments->user }}</h4>
                            {{ $comments->comment }}

                        </div>
                    </div>
            </div>
                @endforeach
            @endif
            </tbody>
        </div>
    </div>


    @include('inc.footer')
