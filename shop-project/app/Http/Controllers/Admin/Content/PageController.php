<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PageRequest;
use App\Models\Content\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy("created_at")->simplePaginate(15);
        return view("admin.content.page.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.content.page.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $inputs = $request->all();
        Page::create($request->all());
        return redirect()->route("admin.content.page.index")->with("swal-success", "پیج جدید با موفقیت ساخته شد.");
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
    public function edit(Page $page)
    {
        return view("admin.content.page.edit", compact("page"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->all());
        return redirect()->route("admin.content.page.index")->with("swal-success" , "پیج با موفقیت ویرایش شد.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route("admin.content.page.index")->with("swal-success", "پیج با موفقیت حذف شد.");

    }


    public function status(Page $page){
        $page["status"] = $page["status"] == 0 ? 1 : 0;
        $result = $page->save();

        if ($result){
            if ($page["status"] == 0){
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
}
