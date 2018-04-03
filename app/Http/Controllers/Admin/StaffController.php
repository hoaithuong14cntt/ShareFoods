<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate();

        return view('admin.staffs.index', compact('staffs'));
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);

        if (!empty($staff)) {
            if ($staff->delete()) {
                return redirect()->route('admin.staffs.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
