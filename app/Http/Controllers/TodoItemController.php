<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo_item;

class TodoItemController extends Controller
{ 
    public function getAll()
    {
        $todo_data = Todo_item::get();
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$todo_data],200);
    }
    public function create()
    {
        $validate = Validator::make(request()->all(),[
            'activity_group_id'=> 'required|integer', 
            'title'=> 'required|string', 
            'is_active'=> 'required|integer', 
            'priority'=> 'required|string'
        ]); 
        if($validate->fails())
        {
            return response()->json([
                'status'=>'Bad Request',
                'message'=>'Email dan Title tidak boleh kosong',
                'data'=>''],400);
        }
        $todo_data = Todo_item::create(request()->all());
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$todo_data],201);   
    }

    public function getOne($id)
    {
        $todo_data = Todo_item::find($id);
        if(!$todo_data)
        {
            return response()->json([
                'status'=>'Not Found',
                'message'=>'Aktivitas dengan ID '.$id.' tidak ditemukan',
                'data'=>''],404);
        }
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>$todo_data],200); 
    }

    public function delete($id)
    {
        $todo_data = Todo_item::find($id);        
        if(!$todo_data)
        {
            return response()->json([
                'status'=>'Not Found',
                'message'=>'Aktivitas dengan ID '.$id.' tidak ditemukan',
                'data'=>''],404);
        }
        $todo_data->delete();
        return response()->json([
            'message'=>'Success',
            'status'=>'Success',
            'data'=>''],200);  
    }

    public function update($id)
    {
        $todo_update = Todo_item::where('id',$id);
        $todo_update->update(request()->all()); 
        $todo_data = Todo_item::find($id);

        //validation
        if(!$todo_data) {
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
            'data'=>$todo_data],200);  
    }
}
