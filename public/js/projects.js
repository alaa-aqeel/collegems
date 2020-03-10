$(function(){
    

    $('.btn-active').click(function(){
        let toggle = $(this).find('i').hasClass('fa-toggle-on') ;
        $(this).find('i').removeClass('fa-toggle-on fa-toggle-off').addClass('fa-spinner fa-pulse')

        axios.put("/api/project/"+$(this).parent().attr('id')).then((resp)=>{
            // console.log(resp);
            $(this)
                .toggleClass('btn-success').toggleClass('btn-danger')
                .find('i').removeClass('fa-spinner fa-pulse').addClass( toggle ? 'fa-toggle-off' : 'fa-toggle-on' )
        }).catch(resp=>{
            $(this).find('i').removeClass('fa-spinner fa-pulse').addClass( toggle ? 'fa-toggle-on' : 'fa-toggle-off' )
        })
        
    })

    
})