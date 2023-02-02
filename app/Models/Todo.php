<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Todo extends Model
{
    use HasFactory;

    protected $table="to_do";

    /**
     * @param array $attributes
     * @return Todo
     */

    public function createTodo(array $attributes){
        $todo = new self();
        $todo->title=$attributes['title'];
        $todo->description=$attributes['description'];
        $todo->project_id=$attributes['project_id'];
        $todo->states=1;  // active - to do status
        $todo->count=0;
        //get user id from auth
        $user = auth()->user();
        $todo->user_id=$user->id;
        $todo->save();
        return $todo;
    }

    /**
     * @param $id
     * @return mixed
     */


    public function getTodo($id){

        $todo = $this->where('id',$id)->first();
        if($todo == null){
            throw new ModelNotFoundException("Can\'t find todo");
        }
        $todo->count = $todo->count+1;
        $todo->save();
        return $todo;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function listTodo(){
        return $this::all();
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */

    public function updateTodo(int $id, array $attributes){
        $todo = $this->getTodo($id);
        if($todo == null){
            throw new ModelNotFoundException("Can\'t find todo");
        }
        $todo->title = $attributes["title"];
        $todo->description = $attributes["description"];
        $todo->save();
        return $todo;
    }

    /**
     * @param $id
     * @return mixed
     */

    public function doneTodo($id){
        $todo = $this->getTodo($id);
        if($todo == null){
            throw new ModelNotFoundException("Can\'t find todo");
        }
        $todo->states = 0; //Done
        $todo->save();
        return $todo;
    }

    public function deleteTodo(int $id){
        $todo = $this->getTodo($id);
        if($todo == null){
            throw new ModelNotFoundException("Todo item not found");
        }
        return $todo->delete();
    }
}
