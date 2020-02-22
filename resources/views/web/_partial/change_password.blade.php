<div class="modal fade in" id="modalChangePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document" style="width:40%;">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
            </div>
            <div class="modal-body modal-spa">
                <div class="sign-grids">
                    <div class="sign">
                        <div class="sign-right" style="width:90%;">
                            <form action="#" method="post" id="formChangePassword">
                                <h3>Change Password </h3>
                                <input type="hidden" data-url = "{{route('change_password', ['id' => auth('web')->user()->id])}}" id="url">
                                <input type="hidden" data-url = "{{route('logout')}}" id="url_logout">
                                <input type="password" required="" name='password' placeholder="Password" id="password">	
                                <input type="password" required="" name='new_password' placeholder="New Password" id="new_password">	
                                <input type="password" required="" name='password_confirmation' placeholder="Confirmation Password" id="new_password_confirmation">
                                <span id="error_message" class="text-danger"></span>
                                <input type="submit" value="SUBMIT" id="change_pass" onclick="javascript:void(0)">
                            </form>
                        </div>
                        <div class="clearfix"></div>								
                    </div>
                    <p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@section('after-scripts')
<script>
    $("#change_pass").click(function(event){
        event.preventDefault();
        changePass();
    });
    
    function changePass(){
        Swal.fire({
            title: 'Xác nhận đổi mật khẩu?',
            text: "Xác nhận đổi mật khẩu!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xác nhận!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: $("#url").attr('data-url'),
                    data: {password: $("#password").val(), new_password: $("#new_password").val(), new_password_confirmation : $("#new_password_confirmation").val()},
                    success: function(result){
                        if(result.success == true){
                            Swal.fire({
                                title : 'Thành công!',
                                text : 'Bạn cần phải đăng nhập lại với mật khẩu mới!',
                                icon: 'success',
                                allowOutsideClick: false
                            }
                            
                            )
                            .then((result) => {
                                url = $('#url_logout').attr('data-url');
                                window.location.replace(url);
                            })
                        }else{
                            $("#error_message").text(result.message);
                        }
                        
                    },
                    error: function(data){
                        var response = JSON.parse(data.responseText);
                        errorString = "";
                        $.each( response.errors, function( key, value) {
                            errorString = value;
                        });
                        $("#error_message").text(errorString);
                    }
                });
            }
        })
        
    }
</script>
@endsection
