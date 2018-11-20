@include('inc.header')

<div class="container">
    <form method="POST" action="{{ url('/reg') }}">
        {{csrf_field()}}
        @if(count($errors) >0 )
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Submit">

    </form>
    <a href="{{url('/')}}">Home Page</a>
</div>

@include('inc.footer')


