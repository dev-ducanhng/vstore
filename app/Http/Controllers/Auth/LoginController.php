<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function getFormRegister()
    {
        return view('auth.register');
    }

    public function postFormRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'company_name' => 'required',
            'tax_code' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'id_vdone' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ], [
            'email.required' => 'Email bắt buộc nhập',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng dịnh dạng',
            'name' => 'Tên v-store bắt buộc nhập',
            'company_name' => 'Tên công ty bắt buộc nhập',
            'tax_code' => 'Mã số thuế bắt buộc nhập',
            'address' => 'Địa chỉ bắt buộc nhập',
            'phone_number' => 'Số điện thoại bất buộc nhập',
            'id_vdone' => 'ID người đại điện bắt buộc nhập',
            'password.required' => 'Mật khẩu bắt buộc nhập',
            'password.confirmed' => 'Xác nhận mật khẩu không chính xác',
            'password.min' => 'Mật khẩu phải dài it nhất 8 kí tự',
            'password_confirmation' => 'Xác nhận mật khẩu bắt buộc nhập'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_vdone = $request->id_vdone;
        $user->company_name = $request->company_name;
        $user->phone_number = $request->phone_number;
        $user->tax_code = $request->tax_code;
        if ($request->id_vdone_diff) {
            $user->id_vdone_diff = $request->id_vdone_diff;
        }
        $user->address = $request->address;

        $user->save();

        return 'Đăng ký thành công';
    }

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
//        return 1;
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)){
            return 'đăng nhập thành công';
        }else if(Auth::attempt(['phone_number' => $request->email, 'password' => $request->password])){
            return 'đăng nhập thành công';
        }else{
            return redirect()->route('login')->with('mes','Tài khoản hoặc mật khẩu không chính xác');
        }
        ;

    }
    public function getLogin(){
        return view('auth.login');
    }
}
