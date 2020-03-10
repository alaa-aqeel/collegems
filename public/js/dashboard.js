// function delete_college(e, id){
//     let target = e.target.localName == 'i'? $(e.target).parent() : $(e.target)
//     $(target).html('<i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>')
//     axios.delete("/api/college/"+id).then(resp=>{
//         $(target.parent().parent()).remove()
//     })
// }

$(function(){

    $('[data-toggle=sidebar-colapse]').click(function() {
        SidebarCollapse();
    });

    $('#btn_add_college').click(function(){
        $(this).html('<i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>')
        axios.post("/api/college",{name: $('#add_college input').val()}).then(resp=>{
            $(this).html('Add')
            $('#table_college').find('tbody').append(`
                    <tr>
                        <th name='id'> ${resp.data.college.id} </th>  
                        <th style="text-transform: capitalize" name='name'> ${$('#add_college input').val()} </th>   
                        <th name='user'>0</th>   
                        <th name='project'>0</th>
                        <th name='admins'>0</th> 
                        <th name='action'> 
                            <button class="btn btn-outline-danger delete_college" > 
                                <i class="fa fa-trash"></i> 
                            </button> 
                        </th> 
                    </tr>
                `);
        })
        
    });

    window.delete_college = function (e, id){
        let target = e.target.localName == 'i'? $(e.target).parent() : $(e.target)
        $(target).html('<i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>')
        axios.delete("/api/college/"+id).then(resp=>{
            $(target.parent().parent()).remove()
        })
    }
    
})
