

$(function(){


    $('a.setting').click(function(e){
        $(this).find('.fa').toggleClass('fa-spin');
        axios.get(`/api/user/${$(this).parent().attr('id')}`).then(resp=>{
            $('#settingModal #userName').text(resp.data.user.fullname)
            $('#settingModal #userRole').val(resp.data.user.role)
            $('#settingModal #userActive').val(resp.data.user.active)
            $('#settingModal #saveChanges').attr('id', $(this).parent().attr('id') ).attr('disabled', false).text('Save')
            if(resp.data.user.active != 0){
                $('#settingModal #userActive').addClass('btn-success').removeClass('btn-danger')
                $('#settingModal #userActive').find('i').addClass('fa-toggle-on').removeClass('fa-toggle-off')
            }else{
                $('#settingModal #userActive').removeClass('btn-success').addClass('btn-danger')
                $('#settingModal #userActive').find('i').removeClass('fa-toggle-on').addClass('fa-toggle-off')   
            }
            $('#settingModal').modal('show')
            $(this).find('.fa').toggleClass('fa-spin');
        })
    });

    $('#settingModal .btn-active').click(function(){
        $(this).toggleClass('btn-success').toggleClass('btn-danger')
        $(this).find('i').toggleClass('fa-toggle-on').toggleClass('fa-toggle-off')
        $(this).val($(this).val() == 1 ? 0 : 1);

    })

    $('#settingModal #saveChanges').click(function(){
        $(this).attr('disabled', '').html('<i class="fa fa-spinner fa-pulse"></i>')

        let data = {
            'active' : $('#settingModal #userActive').val() ,
            'role' : $('#settingModal #userRole').val()
        }

        axios.put(`/api/user/${ $(this).attr('id') }`, data).then(resp=>{
            $(this).attr('disabled', false).text('Save')
        }).catch(resp=>{

            $(this).attr('disabled', false).text('Save')
        })

    });

})