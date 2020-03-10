<table class="table table-hover" id='table_projects'>
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">College</th>
            <th scope="col">Student</th>
            <th scope="col">Active</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <th> {{ $item->id }} </th>
                <th> {{ $item->name }} </th>
                <th> {{ $item->college ? $item->college->name : 'None' }} </th>
                <th> {{ $item->users()->count() }} </th>
                <th> {{ boolval($item->active) ? 'True' : 'False' }} </th>
            </tr>
        @endforeach
    </tbody>
</table>
