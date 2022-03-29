<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('confirm', ['inputs' => $inputs]);
    }

    public function send(Request $request)
    {
        $action = $request->input('action');

        if($action == 'back'){//入力内容の修正
            $inputs = $request->except('action');
            $inputs['gender'] = $inputs['gender'] === '1' ? '男性' : '女性';
            return redirect()
                ->route('index')
                ->withInput($inputs);
        } else {//登録
            $fullname = $request->lastname.'　'.$request->firstname;
            $request->merge(['fullname' => $fullname]);
            $inputs = $request->except('action');

            $contact = new Contact;
            unset($inputs['_token']);
            $contact->fill($inputs)->save();
            return view('complete');
        }
    }

    public function search(Request $request)
    {
        $inputs = $request->input();
        unset($inputs['_token']);
        $query = Contact::query();
        if($request->fullname) {
            $query->where('fullname', 'like', "%{$request->fullname}%");
        }
        if($request->gender === '男性') {
            $query->where('gender', 1);
        } else if($request->gender === '女性') {
            $query->where('gender', 2);
        }
        if($request->email) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if($request->created_at_from && $request->created_at_to) {
            $query->where('created_at', '>=',  Carbon::parse($request->created_at_from)->startOfDay())->where('created_at', '<=',  Carbon::parse($request->created_at_to)->endOfDay());
        } else if($request->created_at_from && !$request->created_at_to) {
            $query->where('created_at', '>=',  Carbon::parse($request->created_at_from)->startOfDay());
        } else if(!$request->created_at_from && $request->created_at_to) {
            $query->where('created_at', '<=',  Carbon::parse($request->created_at_to)->endOfDay());
        }
        $items = $query->paginate(10)->withQueryString();
        return view('management', ['items' => $items, 'inputs' => $inputs, 'page' => $request->page]);
    }

    public function management(Request $request)
    {
        $inputs = null;
        $items = Contact::Paginate(10);
        return view('management', ['items' => $items, 'inputs' => $inputs ]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        $inputs = $request->inputs;
        if(!$inputs) {
            return redirect()->route('management', ['page' => $request->page]);
        }
        $query = Contact::query();
        if(!isset($inputs['fullname'])) {
            $inputs['fullname'] = NULL;
        } else if($inputs['fullname']) {
            $query->where('fullname', 'like', "%{$inputs['fullname']}%");
        }
        if(!isset($inputs['gender'])) {
            $inputs['gender'] = '全部';
        } else if($inputs['gender'] === '男性') {
            $query->where('gender', 1);
        } else if($inputs['gender'] === '女性') {
            $query->where('gender', 2);
        }
        if(!isset($inputs['email'])) {
            $inputs['email'] = NULL;
        } else if($inputs['email']) {
            $query->where('email', 'like', "%{$inputs['email']}%");
        }
        if(!isset($inputs['created_at_from'])) {
            $inputs['created_at_from'] = NULL;
        }
        if(!isset($inputs['created_at_to'])) {
            $inputs['created_at_to'] = NULL;
        }
        if($inputs['created_at_from'] && $inputs['created_at_to']) {
            $query->where('created_at', '>=',  Carbon::parse($inputs['created_at_from'])->startOfDay())->where('created_at', '<=',  Carbon::parse($inputs['created_at_to'])->endOfDay());
        } else if($inputs['created_at_from'] && !$inputs['created_at_to']) {
            $query->where('created_at', '>=',  Carbon::parse($inputs['created_at_from'])->startOfDay());
        } else if(!$inputs['created_at_from'] && $inputs['created_at_to']) {
            $query->where('created_at', '<=',  Carbon::parse($inputs['created_at_to'])->endOfDay());
        }

        $items = $query->paginate(10)->withQueryString();
        return view('management', ['items' => $items, 'inputs' => $inputs, 'page' => $request->page]);
    }

}