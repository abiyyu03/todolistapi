<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Activity_group;

class ActivityGroupController extends Controller
{
    public function getAll()
    {
        $activity_data = Activity_group::get();
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$activity_data],200);
    }
    public function create()
    {
        $validate = Validator::make(request()->all(),[
            'email'=> 'required|string', 
            'title'=> 'required|string'
        ]); 
        if($validate->fails())
        {
            return response()->json([
                'status'=>'Bad Request',
                'message'=>'Email dan Title tidak boleh kosong',
                'data'=>''],400);
        }
        $activity_data = Activity_group::create(request()->all());
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$activity_data],201);   
    }

    public function getOne($id)
    {
        $activity_data = Activity_group::find($id);
        if(!$activity_data)
        {
            return response()->json([
                'status'=>'Not Found',
                'message'=>'Aktivitas dengan ID '.$id.' tidak ditemukan',
                'data'=>''],404);
        }
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$activity_data],200); 
    }

    public function delete($id)
    {
        $activity_data = Activity_group::find($id);        
        if(!$activity_data)
        {
            return response()->json([
                'status'=>'Not Found',
                'message'=>'Aktivitas dengan ID '.$id.' tidak ditemukan',
                'data'=>''],404);
        }
        $activity_data->delete();
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>''],200);  
    }

    public function update($id)
    {
        $activity_update = Activity_group::where('id',$id);
        $activity_update->update(request()->all()); 
        $activity_data = Activity_group::find($id);

        //validation
        if(!$activity_data) {
            return response()->json([
                'status'=>'Not Found',
                'message'=>'Aktivitas dengan ID '.$id.' tidak ditemukan',
                'data'=>''],404);
        } elseif (request()->input('title') == NULL){
            return response()->json([
                'status'=>'Bad Request',
                'message'=>'Title tidak boleh kosong',
                'data'=>''],400);
        }
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$activity_data],200);  
    }
}
