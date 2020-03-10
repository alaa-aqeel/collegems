<table class="table table-hover" id='table_college'>
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Student</th>
            <th scope="col">Project</th>
            <th scope="col">Admin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <th name='id'> {{ $item->id }} </th>  
                <th style="text-transform: capitalize" name='name'> {{ $item->name }} </th>   
                <th name='user'> {{ $item->users->count() }} </th>   
                <th name='project'> {{ $item->projects->count() }} </th>
                <th name='admins'> {{ $item->admin->count() }} </th> 
                <th name='action'> 
                    <button class="btn btn-outline-danger delete_college" onclick='delete_college(event, {{ $item->id }})'> 
                        <i class="fa fa-trash"></i> 
                    </button> 
                </th> 
            </tr>
        @endforeach
    </tbody>
</table>
