<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate();

        return view('admin.staffs.index', compact('staffs'));
    }

    public function show(Request $request, Staff $staff)
    {
        $numPlace = $staff->places()->count();
        $numUserFollows = $staff->followers()->count();

        $tabs = $request->only('tab');
        $tab = 'followers';
        if (!empty($tabs)) {
            $tab = $tabs['tab'];
        }

        $status = $request->only('status');

        if (!empty($status) && (0 == $status['status'])) {
            $staff->status = 1;
        } else {
            $staff->status = 0;
        }

        $staff->save();

        return view('admin.staffs.show', compact('staff', 'numPlace', 'numUserFollows', 'tab'));
    }

    public function destroy(Staff $staff)
    {
        if (!empty($staff)) {
            if ($staff->delete()) {
                return redirect()->route('admin.staffs.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
