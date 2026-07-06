<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    function index()
    {

        $notifications = Notification::get();
        return view('backend.pages.notification.notification', compact('notifications'));
    }


    function noti_read($id)
    {
        $notify = Notification::findOrFail($id);
        $notify->status = 1;
        $notify->save();
        return redirect()->route('notifications');
    }



    // Route::get('/delete/{id}',function($id){
    //     $noti=notification::findOrFail($id);
    //     $noti->delete();
    //     return redirect()->route('notifications')->with('success','Notification Deleted Successfully');
    // });
    function notiification_delete($id)
    {
        $noti = Notification::findOrFail($id);
        $noti->delete();
        return redirect()->route('notifications')->with('success', 'Notification Deleted Successfully');
    }

    function all_notiification_delete()
    {
        Notification::truncate();
        return redirect()->route('notifications')->with('success', 'All Notification Deleted Successfully');
    }

    function read_all_notiification()
    {
        $noti = Notification::all();

        foreach ($noti as $noti) {
            $noti->status = 1;
            $noti->save();
        }
        return redirect()->route('notifications')->with('success', 'All Notification Deleted Successfully');
    }


    function delete_selected_notifications(Request $req)
    {

        $selectedIds = $req->notification_ids;
        if ($selectedIds) {
            Notification::whereIn('id', $selectedIds)->delete();
            return redirect()->route('notifications')->with('success', 'Selected notifications deleted successfully.');
        }
        return redirect()->route('notifications')->with('danger', 'Selected some value');
    }
}
