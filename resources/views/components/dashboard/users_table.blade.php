<table class="table table-hover" id='table_users'>
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Full Name</th>
            <th scope="col">College</th>
            <th scope="col">Stage</th>
            <th scope="col">Active</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <th> {{ $item->id }} </th>
                <th> {{ $item->fullname }} </th>
                <th> {{ $item->college ? $item->college->name : 'None' }} </th>
                <th> {{ $item->stage ? $item->stage->stage : 'None' }} </th>
                <th> {{ boolval($item->active) ? 'True' : 'False' }} </th>
            </tr>
        @endforeach
    </tbody>
</table>
