

<table class="table table-hover" id='table_college'>
    <thead>
        <tr>
            @foreach ($fields as $field)
                <th scope="col">{{$field}}</th>
            @endforeach

        </tr>
    </thead>
    <tbody>
        {{-- {{ $items  }} --}}
        @foreach ($items as $item)
        <tr>
            @isset($fields)
                @foreach ($fields as $field)
                    <th> {{ $item[$field] }} </th>    
                @endforeach
            @else 
                @foreach ($item as $it)
                    <th> {{ $it }} </th>
                @endforeach
            @endisset
        </tr>
        @endforeach
    </tbody>
</table>
