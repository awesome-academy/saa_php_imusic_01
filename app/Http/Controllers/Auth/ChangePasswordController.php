<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function change(ChangePasswordRequest $request,$id)
    {
        $user = User::find($id);
        if($user){
            if (Hash::check($request->password, $user->password)) {
                try{
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    return response()->json([
                        'success' => true,
                        'message' => 'Đổi mật khẩu thành công'
                    ]);
                }catch(\Exception $e){
                    
                }
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Mật khẩu không chính xác'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'Đổi mật khẩu thất bại'
        ]);
    }
}
