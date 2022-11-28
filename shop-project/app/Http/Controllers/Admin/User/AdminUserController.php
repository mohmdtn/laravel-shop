<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Services\image\ImageService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where("user_type", 1)->get();
        return view("admin.user.adminUser.index", compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.adminUser.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile("profile_photo_path")){

            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR . "users");
            $result = $imageService->save($request->file("profile_photo_path"));

            if ($result === false){
                return redirect()->route("admin.user.adminUser.index")->with("swal-error" , "آپلود تصویر با خطا مواجه شد.");
            }

            $inputs["profile_photo_path"] = $result;
        }

        $inputs["user_type"] = 1;
        $inputs["password"] = Hash::make($request["password"]);
        $user = User::create($inputs);
        return redirect()->route("admin.user.adminUser.index")->with("swal-success" , "ادمین جدید با موفقیت ایجاد شد.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.user.adminUser.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, User $user, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile("profile_photo_path")){
            if (!empty($user["profile_photo_path"])){
                $imageService->deleteImage($user["profile_photo_path"]);
            }

            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR . "users");
            $result = $imageService->save($request->file("profile_photo_path"));

            if ($result === false){
                return redirect()->route("admin.user.adminUser.index")->with("swal-error" , "آپلود تصویر با خطا مواجه شد.");
            }

            $inputs["profile_photo_path"] = $result;
        }

        $user->update($inputs);
        return redirect()->route("admin.user.adminUser.index")->with("swal-success" , "ادمین با موفقیت ویرایش شد.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        return redirect()->route("admin.user.adminUser.index")->with("swal-success" , "ادمین با موفقیت حذف شد.");
    }

    public function status(User $user){
        $user["status"] = $user["status"] == 0 ? 1 : 0;
        $result = $user->save();

        if ($result){
            if ($user["status"] == 0){
                return response()->json(["status" => true , "checked" => false]);
            }
            else{
                return response()->json(["status" => true , "checked" => true]);
            }
        }
        else{
            return response()->json(["status" => false]);
        }

    }

    public function roles(User $admin){
        $roles = User\Role::all();
        return view("admin.user.adminUser.roles", compact('admin', 'roles'));
    }

    public function rolesStore(Request $request, User $admin){
        $validated = $request->validate([
            "roles" => "exists:roles,id|array"
        ]);

        $admin->roles()->sync($request["roles"]);
        return redirect()->route("admin.user.adminUser.index")->with("swal-success" , "نقش ادمین با موفقیت ویرایش شد.");
    }

}
