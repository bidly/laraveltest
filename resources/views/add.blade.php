@include('inc.header')

            <div class="container">
                <form method="POST" action="{{ url('/insert') }}">
                    {{csrf_field()}}
                    @if(count($errors) >0 )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Release Date</label>
                        <input type="date" name="release_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Rating</label>
                        <select class="form-control" name="rating">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ticket Price ($)</label>
                        <input type="text" class="form-control" name="ticket_price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Country</label>
                        <input type="text" class="form-control" name="country">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Genre (You can select multiple Genre)</label>
                        <select multiple class="form-control" name="genre[]">
                            <option>Sci-Fi</option>
                            <option>Action</option>
                            <option>Drama</option>
                            <option>Cartoon</option>
                            <option>Comedy</option>
                            <option>Crime</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit">

                </form>
                <a href="{{url('/')}}">Home Page</a>
            </div>

@include('inc.footer')


