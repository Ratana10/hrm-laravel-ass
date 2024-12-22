<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerComment;
use App\Models\Customer;
use Validator;

class CustomerCommentController extends Controller
{
    public function index(Request $request, $customer_id){
        $customer_comments = CustomerComment::where('customer_id',$customer_id)->paginate(10);
        return view('customers.comments.index', compact('customer_comments','customer_id'));
    }

    public function add(Request $request, $customer_id){
        return view('customers.comments.create', compact('customer_id'));
    }

    public function store(Request $request, $customer_id){
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'title' => 'required',
            'note' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', json_encode($validator->errors()));
        }
        $comment = new CustomerComment;
        $comment->customer_id = $customer_id;
        $comment->title = $request->title;
        $comment->date = date('Y-m-d', strtotime($request->date));
        $comment->note = $request->note;
        $comment->save();
        return redirect()->route('customer_comment.index', $customer_id)->with('success', 'Comment added successfully.');
    }
    public function edit ($id){
        $comment = CustomerComment::find($id);
        return view('customers.comments.edit', compact('comment'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'title' => 'required',
            'note' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', json_encode($validator->errors()));
        }
        $comment = CustomerComment::find($id);
        $comment->title = $request->title;
        $comment->date = date('Y-m-d', strtotime($request->date));
        $comment->note = $request->note;
        $comment->save();
        return redirect()->route('customer_comment.index', $comment->customer_id)->with('success', 'Comment updated successfully.');
    }
    public function delete($id){
        $comment = CustomerComment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
