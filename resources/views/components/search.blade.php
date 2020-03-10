<form  method="get">
    <div class="row">
        <div class="col-md-6 col-12 mb-3 " >
            <div class="input-group">
                <input type="text" placeholder='Name' name='s' value='{{ Request::query("s") }}' class="form-control" aria-describedby="inputGroupPrepend" >

            </div>
        </div>
        <br>
        <div class="col-md-2 col-6 mb-3 ">
            <div class="input-group">
                <select name="stage" id="" class="form-control" value='{{ Request::query("stage") }}'>
                    <option value=""> Select Stage </option>
                    @foreach($stages as $stage)
                        <option value="{{$stage->id}}" {{ $stage->id == Request::query("stage") ? 'selected' : " " }}> {{$stage->stage}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 ">
            <div class="input-group">
                <select name="college" id="" class="form-control" value='{{ Request::query("college") }}'>
                    <option value=""> Select College </option>
                    @foreach($colleges as $college)
                        <option value="{{$college->id}}" {{ $college->id ==Request::query("college") ? 'selected' : " " }}> {{$college->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2 col-6 mb-3 ">
            <button type="submit"  class="bg-light btn btn-outline-primary" id="inputGroupPrepend">
                {{-- Search --}}
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>

</form>
