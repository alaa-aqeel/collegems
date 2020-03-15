

$(function(){


    $('a.setting').click(function(e){
        $(this).find('.fa').toggleClass('fa-spin');

        axios.get(`/api/user/${ $(this).parent().attr('id') }`).then(resp=>{

            $('#settingModal #user-avatar').attr('src', resp.data.user.avatar)
            $('#settingModal #user-name').text(resp.data.user.fullname)
            $('#settingModal #user-role').val(resp.data.user.role)
            $('#settingModal #user-active').val(resp.data.user.active)
            $('#settingModal #user-email').text(resp.data.user.email)
            $('#settingModal #user-college').text(resp.data.user.college)
            $('#settingModal #user-stage').text(resp.data.user.stage)
            $('#settingModal #user-valid').removeClass('text-success text-danger fa-check fa-remove');
            $('#settingModal #user-valid').addClass(resp.data.user.verified ? 'fa-check text-success' : 'fa-remove text-danger')
            $('#settingModal #user-project').text(resp.data.user.projects)

            $('#settingModal .saveChanges').attr('id', $(this).parent().attr('id') ).attr('disabled', false).text('Save')
            $('#settingModal .deleteUser').attr('id', $(this).parent().attr('id') ).attr('disabled', false).text('Delete Account')

            if(resp.data.user.active != 0){
                $('#settingModal #user-active').addClass('btn-success').removeClass('btn-danger')
                $('#settingModal #user-active').find('i').addClass('fa-toggle-on').removeClass('fa-toggle-off')
            }else{
                $('#settingModal #user-active').removeClass('btn-success').addClass('btn-danger')
                $('#settingModal #user-active').find('i').removeClass('fa-toggle-on').addClass('fa-toggle-off')
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

    $('#settingModal #saveChanges').click(function(e){
        $(this).attr('disabled', '').html('<i class="fa fa-spinner fa-pulse"></i>')
        // e.pravateEnvent
        let data = {
            'active' : $('#settingModal #user-active').val() ,
            'role' : $('#settingModal #user-role').val()
        }

        axios.put(`/api/user/${ $(this).attr('id') }`, data).then(resp=>{
            $(this).attr('disabled', false).text('Save')
        }).catch(resp=>{

            $(this).attr('disabled', false).text('Save')
        })

    });

    $('#settingModal #deleteUser').click(function(){
        $(this).attr('disabled', true).html('<i class="fa fa-spinner fa-pulse"></i>')
        if (confirm('Are you sure you want to delete this account ?')) {
             axios.delete(`/api/user/${ $(this).attr('id') }`).then(resp=>{
                $('#settingModal').modal('toggle')
                $(`#${$(this).attr('id')}-card`).remove()
            }).catch(resp=>{ $(this).attr('disabled', false).text('Delete Account') })
        }
    })
})
