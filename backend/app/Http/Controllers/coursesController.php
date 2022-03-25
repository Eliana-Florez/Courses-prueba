<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $courses = Course::all(['id','nameCourse', 'hours']);
        return response()->json($courses,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getID($id)
    {
        $course = Course::find($id);
        return response()->json($course,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->post());
        return response()->json(['course'=>$course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return response()->json($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => '',
            'nameCourse' => 'required',
            'hours' => 'required',
        ]);

        $course = Course::find($id);
        $course->fill($request->post())->save();

        return response()->json([ 'course'=>$course ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCourse)
    {
        Course::find($idCourse)->delete();
        return response()->json([
            'mensaje'=>'¡Curso eliminado correctamente!'
        ]);
    }
}