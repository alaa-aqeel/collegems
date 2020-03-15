<table class="table table-hover" id='table_college'>
    <div class="modal fade" id="modal-edit-college" data-backdrop="static">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_college"> College Name </label>
                        <input type="text" class="form-control" id="name_college" placeholder="Name College">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_edit_college" >
                    Save
                </button>
                </div>
            </div>
        </div>
    </div>
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
            <tr class='row-{{ $item->id }} '>
                <th name='id'> {{ $item->id }} </th>
                <th style="text-transform: capitalize" name='name'> {{ $item->name }} </th>
                <th name='user'> {{ $item->student->count() }} </th>
                <th name='admins'> {{ $item->admin->count() }} </th>
                <th name='project'> {{ $item->projects->count() }} </th>
                <th name='action'>
                    <button class="btn btn-outline-danger delete_college" onclick='delete_college(event, {{ $item->id }})'>
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="btn btn-outline-primary edit_college" onclick='edit_college({{ $item->id }})'>
                        <i class="fa fa-edit"></i>
                    </button>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
