<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lecturers = Lecturer::latest();
        $keyword = request('keyword');
        if ($keyword) {
            $lecturers->where('name', 'like', "%$keyword%");
        }
        $departmentId = request('department_id');
        if ($departmentId) {
            $lecturers->where('department_id', $departmentId);
        }

        return view('lecturer.index', [
            'title' => 'Lecturer',
            'departments' => Department::latest()->get(),
            'lecturers' => $lecturers->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create', [
            'title' => 'Create Lecturer',
            'departments' => Department::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
