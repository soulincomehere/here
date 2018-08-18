<?php

namespace App\Http\Controllers\Admin;

use App\Events\LoginSendEvent;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash, Validator, Auth;
use Illuminate\Mail\Message;
use Mail;
use App\Mail\Loginmail;

class PublicController extends Controller
{
    // 后台用户登录 界面
    public function login() {
        return view('admin.public.login');
    }

    // 后台登录
    public function loginHandle(Request $request) {

        // 验证
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
//            'code'    => 'required|captcha'
        ]);
        $input = $request->except(['_token']);
////        dump($input);
//            dump($request);
//        // 根据用户名来查询
        $info = Manager::where('username', $input['username'])->first();
        if ($info) {// 成功
            // 验证密码
            if (Hash::check($input['password'], $info['password'])){ // 成功
//                // 写入session
            session(['admin.user' => $info]);
                dump(session('admin.user'));
            return '成功';
            }
        }
        return redirect()->route('admin.public.login')->withErrors(['error' => '用户名或密码不正确']);
    }

//    //方式2
//    public function loginAuth(Request $request){
//        $validator = Validator::make($request->all(), [
//            'username' => 'required',
//            'password' => 'required',
//            'code'    => 'required|captcha'
//        ]);
//        if ($validator->fails()){//验证不通过
//            return redirect()->route('admin.public.login')->withErrors($validator);
//        }
//        $ret =Auth::attempt($request->only(['username','password']),$request->has('online'));
////        return 'is ok!';
//        if ($ret){
//            //发邮件
//            //方式
//            Mail::raw('<h3>登陆成功</h3>',function (Message $message){
//                $stime = time();
//                //查看形参
//                //发给谁
//                $message->to('721299120@qq.com');
//                //主体
//                $message->subject('测试');
//                $etime = time();
//                echo $etime - $stime;
//            });
//        }
//
////        //事件发送邮件
////        event(new LoginSendEvent(Auth::user()));
////        //检查是否有失败的邮件
////        //dump(Mail::failures);
////        $etime =time();
////        echo $etime-$stime;
////        $ret=Auth::guard('admin')->attempt($request->only(['username','password']));
////        dump($ret);
//        Auth::user()->toArray();
//        $request->user()->toArray();
//    }

    // 后台登录方式2
    public function loginAuth(Request $request) {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            //'vcode'    => 'required|captcha',
        ]);

        if ($validator->fails()) { // 验证不通过
            return redirect()->route('admin.public.login')->withErrors($validator);
        }

        //session(['aaa' => 'bbbbb']);

        // 验证 成功返回true 否则返回 false
        // 可以动态指定guard名称
        #$ret = Auth::guard('admin')->attempt($request->only(['username','password']));
        //                  验证用户名和密码，关联数组                   true/false 是否记住用户登录状态
        // 得到用户名和密码的关联数组
        $userArr = $request->only(['username', 'password']);
        # 只有激活用户才能登录
        $userArr['is_ok'] = '1';
        // 判断是否勾选了保存登录
        $bool = $request->has('online');
        // 登录
        $ret = Auth::attempt($userArr, $bool);

        if ($ret){ // 发送邮件
            $stime = time();
            // 发邮件
            // 方式 1 文本
//            Mail::raw('<h3>登录成功</h3>',function (Message $message){
//                // 查看形参
//                //dump(func_get_args());
//                // 发给谁
//                $message->to('721299120@qq.com');
//                // 主题
//                $message->subject('测试');
//            });

            // 方式2
//            Mail::send('admin.public.login',['data'=>Auth::user()],function (Message $message){
//                // 发给谁
//                $message->to('721299120@qq.com');
//                // 主题
//                $message->subject('登录提醒');
//            });

            // 方式3
            // 没有主题
            Mail::to('721299120@qq.com')->send(new Loginmail(Auth::user()));

            // 事件发送邮件
//            event(new LoginSendEvent(Auth::user()));

            // 跳转到后面主页
//            session(['success'=>'登录成功']);
//            return redirect(route('admin.public.login'))->with('success','登录成功');
            // 检查是否有失败的邮件
            dump(Mail::failures());
            $etime = time();
            echo $etime - $stime;
        }else{
            // 清除session
            //session()->flush();
            return redirect(route('admin.public.login'))->withErrors(['error'=>'登录失败']);
        }

        // 成功后，把用户信息保存到session中，用如下的方法来进行调用
        //dump($request->user()->toArray());
        //dump(Auth::user()->toArray());

    }
}
