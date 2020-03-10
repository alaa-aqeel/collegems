let datepicker = $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
});



function btn_delete(e){
    let target = e.target.localName == 'i'? $(e.target).parent() : $(e.target)
    let id =target.parent().attr('id');
    e.preventDefault()
    axios.delete("/api/tran/"+id).then(resp=>{
        $('#quote-'+id).remove()
    })
}

function toggle_update_model(e){
    let target = e.target.localName == 'i'? $(e.target).parent() : $(e.target)
    let modal = $('#traning_model');
    let quote = target.parent().parent();
    let form  =  modal.find('form');
    if (quote.find('footer').attr('id')){
        form.trigger("reset");
        modal.find('.modal-title').text('Update Tranining ')
        form.attr('id','form_tran_update')
        form.find('#tran_submit').text('Save');
        form.find('#editor').val( quote.find('.text').text().trim() )
        form.find('input#support').val( quote.find('.support').text().trim() )
        datepicker.value(quote.find('.at').text().trim())
        $('#traning_model').modal('show');
        $('#form_tran_update').submit(function(e){
            e.preventDefault()
            $(this).unbind();
            axios.put("/api/tran/"+quote.find('footer').attr('id'), $(this).serialize()).then(resp=>{
                quote.find('.text').text(resp.data.tran.text)
                quote.find('.at').text(resp.data.tran.at)
                quote.find('.support').text(resp.data.tran.support)
                $('#traning_model').modal('toggle');
                form.trigger("reset");
            })
        })
    }   
}

$(function(){
    function add_blockquote(resp){
        $('#blockquotes').append(`
            <blockquote id='quote-${resp.tran.id}' class="blockquote">
                <p class="mb-0">
                    ${resp.tran.text}
                </p>
                <footer id='{{ $train->id }}' class="blockquote-footer">${resp.tran.support}
                    <cite title="Source Title">${resp.tran.at} </cite>
                    <button onclick="btn_delete()"  class="btn-delete btn  btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    <button onclick='toggle_update_model()' class="btn-update btn  btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i> </button>
                </footer>
            </blockquote>
        `)
    }

    $('#btn_toggle_modal').click(function(e){
        $('#traning_model').modal('show');
        let modal = $('#traning_model')
        modal.find('.modal-title').text('Add New Tranining ')
        modal.find('form').trigger("reset");
        modal.find('form').attr('id','form_tran_add').find('#tran_submit').text('Add')
        $('#form_tran_add').submit(function(e){
            e.preventDefault()
            let fdata = new FormData(this)
            axios.post("/api/tran",fdata).then(resp=>{
                $(this).trigger("reset");
                add_blockquote(resp.data)
                
            })
            
        })
    })
    
})