<?php

namespace App\Http\Controllers;

use App\Models\LearnClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::with('learn_classes')->paginate(5);
        return view('students.list',compact('students'));
    }
    public function create()
    {
        $learnClasses=LearnClass::all();
        $students=Student::all();
        return view('students.create',compact('students','learnClasses'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {


        $students = new Student();
        $students->name = $request->input("name");
        $students->email = $request->input("email");
        $students->phone = $request->input('phone');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $students->image = $path;
        }
        $students->learnclass_id=$request->input('learnclass_id');
        $students->save();
        session::flash('success', 'Tạo mới thành công');
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $learnClasses =  LearnClass::all();
        $student = Student::find($id);
        return view('students.edit', compact('student','learnClasses'));
    }

    public function update(request $request, $id)
    {
        $student = Student::find($id);

        $student->name = $request->input("name");
        $student->email = $request->input("email");
        $student->phone = $request->input('phone');
        if ($request->hasFile('image')) {
            $currentImg = $student->image;
            if ($currentImg) {
                Storage::delete('/public/', $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $student->image = $path;
        }
        $student->learnclass_id = $request->input('learnclass_id');
        $student->save();
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('students.index');
    }
    public function destroy($id){
        $student = Student::find($id);
        $image = $student->image;


        //delete image

        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $student->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('students.index');
    }

    public function getSearch(Request $request)
    {
        $students = Student::with('learn_classes')
            ->where('name','LIKE',"%$request->value%")
            ->paginate(5);
        return view('students.search',compact('students'));
    }
}
