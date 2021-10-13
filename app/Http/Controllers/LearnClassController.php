<?php

namespace App\Http\Controllers;

use App\Models\LearnClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LearnClassController extends Controller
{
    public function index()
    {
        $learnClasses=LearnClass::paginate(5);
        return view('learnClass.list',compact('learnClasses'));
    }
    public function create()
    {
        return view('learnClass.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $learn=LearnClass::all();
        $learnClasses=new LearnClass();
        $learnClasses->name = $request->input("name");
//        if ($learnClasses->name == $learn->name){
//            session::flash('error', 'Tên lớp đã có');
//            return redirect()->route('learn_classes.index');
//        }
        $learnClasses->save();
        session::flash('success', 'Tạo mới thành công');
        return redirect()->route('learn_classes.index');

    }

    public function edit($id)
    {
        $learnClass = LearnClass::find($id);
        return view('learnClass.edit', compact('learnClass'));
    }

    public function update(request $request, $id)
    {
        $learnClass = LearnClass::find($id);

        $learnClass->name = $request->input("name");
        $learnClass->save();
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('learn_classes.index');
    }
    public function destroy($id){
        $learnClass = LearnClass::find($id);
        $learnClass->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('learn_classes.index');
    }
}
