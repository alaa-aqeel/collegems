$(function(){

    $('[data-toggle=sidebar-colapse]').click(function() {
        SidebarCollapse();
    });



    $('#btn_add_college').click(function(){
        $(this).html('<i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>')
        axios.post("/api/college",{name: $('#add_college input').val()}).then(resp=>{
            $(this).html('Add')
            $('#table_college').find('tbody').append(`
                    <tr class='row-${resp.data.college.id}'>
                        <th name='id'> ${resp.data.college.id} </th>
                        <th style="text-transform: capitalize" name='name' > ${$('#add_college input').val()} </th>
                        <th name='user'>0</th>
                        <th name='project'>0</th>
                        <th name='admins'>0</th>
                        <th name='action'>
                            <button class="btn btn-outline-danger delete_college" onclick='delete_college(event, ${resp.data.college.id})'>
                                <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn-outline-primary edit_college" onclick='edit_college(${resp.data.college.id})' >
                                <i class="fa fa-edit"></i>
                            </button>
                        </th>
                    </tr>
                `);
        })

    });

    window.delete_college = function (e, id){
        $(`.row-${id} .delete_college fa`).toggleClass('fa-trash fa-spinner fa-pulse')
        if (confirm('Are you sure you want to delete this account ?')) {
            axios.delete("/api/college/"+id).then(resp=>{
                $(`.row-${id}`).remove()
            })
        }else{

            $(`.row-${id} .delete_college fa`).toggleClass('fa-trash fa-spinner fa-pulse')
        }
    }

    $('.btn_edit_college').click(function(){
        let row  = $(`#table_college .row-${$(this).attr('id')}`);
        let newname = $('#modal-edit-college input#name_college').val()
        $(this).html('<i class="fa fa-spinner fa-pulse"></i>')
        axios.put("/api/college/"+$(this).attr('id'), {name:   newname }).then(resp=>{
            $(`#table_college .row-${$(this).attr('id')} th[name='name']`).text( newname )
            $(this).html('Save');
            $('#modal-edit-college').modal('hide');
        })
    })

    window.edit_college = function(id){
        let row  = $(`#table_college .row-${id}`);

        $('#modal-edit-college .btn_edit_college').attr('id', id);
        $('#modal-edit-college input#name_college').val( row.find(`th[name='name']`).text() );
        $('#modal-edit-college').modal('show');


    }

})
