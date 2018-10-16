<?php

namespace App\Http\Controllers;

use App\Model\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::all();
        return view('index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Khởi tạo mới đối tượng list, gán các trường tương ứng với request gửi lên từ trình duyệt
        $information = new Information();
        $information->title = $request->inputTitle;
        $information->content = $request->inputContent;
        $file = $request->inputFile;

        // Nếu file không tồn tại thì trường image gán bằng NULL
        if (!$request->hasFile('inputFile')) {
            $information->image = $file;

        } else {

            //Lấy ra định dạng và tên mới của file từ request
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;

            // Gán tên mới cho file trước khi lưu lên server
            $newFileName = "$fileName.$fileExtension";

            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $newFileName);

            // Gán trường image của đối tượng task với tên mới
            $information->image = $newFileName;
        }
        $information->save();
        $message = "Create List $request->inputName success!";
        Session::flash('create-success', $message);

        return redirect()->route('information_index', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::find($id);
        // Trả về view
        return view('show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $information = Information::find($id);
        $information->delete();
        return redirect()->route('information_index');
    }
}
