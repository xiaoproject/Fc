<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

/**
 * 添加管理员的用户验证
 * Class StoreUserPost
 * @package App\Http\Requests
 */
class StoreUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // 用户名
            'username' => 'required|between:4,20|unique:fc_user,username', // 用户名

            // 密码
            'password' => 'required|between:4,20|confirmed', // 密码
            'password_confirmation' => 'required|between:4,20', // 确认密码

            // 手机号
            'phone' => 'required',
            'phone' => array('regex:/^1[3|4|5|7|8][0-9]{9}$/'),

            // 邮箱
            'email' => 'email|unique:fc_user,email',

            // 角色
            'role_id' => 'required',
        ];
    }


    protected function formatErrors(Validator $validator)
    {
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();

            return array(
                'code' => -1,
                'data' => $errors,
                'msg' => '验证失败'
            );
        }
    }

    public function messages()
    {
        return [
            'username.required' => '用户名必须填写',
            'username.unique' => '用户名已经存在',
            'username.between' => '用户名长度4-20位',

            'password.required' => '新密码不能为空',
            'password.between' => '新密码长度为4-20',
            'password.confirmed' => '两次密码不正确',

            'password_confirmation.required' => '再次密码不能为空',
            'password_confirmation.between' => '再次密码长度为4-20',

            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机格式错误',

            'email.email' => '邮箱格式不正确',
            'email.unique' => '邮箱已存在',

            'role_id.required' => '角色不能为空',
        ];
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 200);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
