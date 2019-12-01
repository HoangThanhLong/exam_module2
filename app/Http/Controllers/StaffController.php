<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreateStaffRequest;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staffs.list',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('staffs.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
        $staff = new Staff();
        $staff->group_id = $request->group_id;
        $staff->name = $request->name;
        $staff->birthday = $request->birthday;
        $staff->gender = $request->gender;
        $staff->phone = $request->phone;
        $staff->idCard = $request->idCard;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staffs.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $groups = Group::all();
        return view('staffs.edit', compact('staff','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateStaffRequest $request, $id)
    {
        $staff = Staff::find($id);
        $staff->group_id = $request->group_id;
        $staff->name = $request->name;
        $staff->birthday = $request->birthday;
        $staff->gender = $request->gender;
        $staff->phone = $request->phone;
        $staff->idCard = $request->idCard;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staffs.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        return redirect()->route('staffs.list');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword){
            return redirect()->route('staffs.list');
        }
        $staffs = Staff::where('name', 'LIKE', '%' . $keyword . '%')->paginate(3);
        return view('staffs.list', compact('staffs'));
    }
}
