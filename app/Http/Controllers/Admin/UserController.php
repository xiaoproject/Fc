<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use App\Http\Requests\StoreUserPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    // get admin/user  全部用户
    public function index()
    {
        $data = User::paginate(10);

        return view('admin.user.userList', ['data' => $data]);
    }

    // get admin/user/create 添加用户UI
    public function create()
    {
        return view('admin.user.userAdd');
    }

    // get admin/user/{user} 显示单个用户信息
    public function show()
    {

    }

    // PUT|PATCH  admin/user/{user} 更新用户到数据库
    public function update()
    {

    }

    // DELETE admin/user/{user}     删除单个用户
    public function destroy()
    {

    }

    //get  admin/user/{user}/edit 编辑用户界面UI
    public function edit()
    {

    }


    /***************************AJAX*********************************/

    // post admin/user 添加用户到数据库
    public function store(StoreUserPost $request)
    {
        $input = Input::except('_token', 'password_confirmation');

        $input['salt'] = uniqid();
        $input['password'] = md5(md5($input['password']) . $input['salt']);
        $input['create_time'] = time();
        if ($input) {
            try {
                if (User::create($input)) {
                    $data = array(
                        'code' => 0,
                        'data' => (object)array(),
                        'msg' => '添加成功'
                    );
                } else {
                    $data = array(
                        'code' => -1,
                        'data' => (object)array(),
                        'msg' => '添加失败'
                    );
                }
                return response()->json($data);
            } catch (\Exception $e) {
                $data = array(
                    'code' => -1,
                    'data' => (object)array(),
                    'msg' => '添加失败'
                );
                return response()->json($data);
            }
        }

    }
}
