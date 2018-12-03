<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Cache;
use Illuminate\Http\Request;
use Exception;

/**
 * Class EmailVerificationController
 * @package App\Http\Controllers
 */
class EmailVerificationController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function verify(Request $request)
    {
        // 从url参数中取出 email、 token 两个参数
        $email = $request->input('email');
        $token = $request->input('token');
        // 如果又一个参数不存在，则说明是一个非法的链接，抛出错误
        if (!$email || !$token) {
            throw new Exception('验证链接不正确');
        }
        // 从缓存中获取token，如果不存在或者不同则抛出错误
        if ($token != Cache::get('email_verification_' . $email)) {
            throw new Exception('验证链接不正确或已过期');
        }
        // 从数据库中取出对应email的数据
        if (!$user = User::where('email', $email)->first()) {
            throw new Exception('用户不存在');
        }
        // 将email对应的缓存删除
        Cache::forget('email_verification_' . $email);
        // 将数据库验证字段改为true
        $user->update(['email_verified' => true]);
        // 返回验证成功页面
        return view('pages.success', ['msg' => '邮箱验证成功']);
    }

    /**
     * 人工触发发送邮件
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function send(Request $request)
    {
        $user = $request->user();
        // 判断用户是否已激活
        if ($user->email_verified) {
            throw new Exception('你已经验证过邮箱了');
        }
        // 调用notify方法发送定义好的通知类
        $user->notify(new EmailVerificationNotification());

        return view('pages.success', ['msg' => '邮件发送成功']);
    }
}
