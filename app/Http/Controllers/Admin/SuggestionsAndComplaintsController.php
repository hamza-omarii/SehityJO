<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewSuggestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class SuggestionsAndComplaintsController extends Controller
{
    public function index(Request $request)
    {
        $suggestions = Suggestion::latest()->get();

        if ($request->has("mark")) {
            $notification_id = $request->input("id_of_notify");
            $Notification = Auth::guard("admin")->user()->notifications->find($request->input("id_of_notify"));
            if ($Notification) {
                $Notification->markAsRead();
            }
        }

        return view("admin.suggestion.index", compact("suggestions"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"  => "required|max:255",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",
        ]);

        if ($validator->fails()) {
            return redirect(url("/#contact"))
                ->withErrors($validator)
                ->withInput();
        }

        $suggestion = new Suggestion();
        $suggestion->name = $request->name;
        $suggestion->email = $request->email;
        $suggestion->subject = $request->subject;
        $suggestion->message = $request->message;
        $save = $suggestion->save();

        $admins = Admin::all();
        Notification::send($admins, new NewSuggestion($suggestion));

        return redirect(url("/#contact"))->with("successKey", __("flashMessage.Suggestion sent successfully"));
    }

    public function destroy($id)
    {
        Suggestion::destroy($id);
        return redirect()->route("admin.suggestions")->with("failureKey", __("flashMessage.Suggestion deleted successfully"));
    }
}
