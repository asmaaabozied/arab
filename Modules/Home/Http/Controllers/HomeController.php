<?php

namespace Modules\Home\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Modules\Home\Entities\Blog;
use Modules\Home\Entities\Contact;
use Modules\Home\Entities\Email;
use Validator;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Home\Entities\Page;
use Modules\Home\Entities\Question;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $questions = Question::paginate(4);
        $blogs=Blog::paginate(4);
        return view('home::site.index',compact('questions','blogs'));
    }

    public function page($type)
    {

        $page = Page::where('type', '=', $type)->first();


        return view('home::site.page', compact('page'));

    }
    public function support(){

        return view('home::site.support');

    }

    public function questions()
    {


        $questions = Question::get();
        return view('home::site.questions', compact('questions'));


    }

    public function contact(){


        return view('home::site.contact');

    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function blog()
    {
        $blogs=Blog::paginate(10);
        $blog=Blog::paginate(2);
        return view('home::site.blogs',compact('blogs','blog'));
    }

    public function addContacts(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|unique:contacts',
            'message' => 'required|string',

        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $request_data = $request->except('_token');
        $request_data['user_id'] = Auth::id() ?? 0;

        $data = Contact::create($request_data);

        return response()->json(['status' => true, 'content' => 'success', 'data' => $data]);


    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function searchBlog(Request $request)
    {
        $query = $request->get('query');;

        $blogs = Blog::when($query, function ($quer) use ($query) {
            $quer->where('name_ar', 'LIKE', '%' . trim($query) . '%')
                ->orwhere('name_en', 'LIKE', '%' . trim($query) . '%')
                ->orwhere('id', 'LIKE', '%' . trim($query) . '%');

        })->paginate(20);
        return view('home::site.searchblog', compact('blogs'));


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function sendemail(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email',


        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $request_data = $request->except('email','_token');
        $request_data['subject']=$request['email'];
        $request_data['from']=Auth::id() ?? 0;

        $data = Email::create($request_data);

        return response()->json(['status' => true, 'content' => 'success', 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
