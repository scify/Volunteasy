<?php namespace App\Http\Controllers;

use App\Models\ActionTasks\TaskChecklist;

class TaskChecklistController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Store a resource
     */
    public function store() {

        $checklist = new TaskChecklist([
            'isComplete' => 0,
            'comments' => \Request::get('comments'),
            'task_id' => \Request::get('mode_id'),
            'created_by' => \Auth::user()->id,
            'updated_by' => \Auth::user()->id
        ]);

        $checklist->save();
        $checklist->load('createdBy');
        $checklist->load('updatedBy');

        return $checklist;
    }

    /**
     * Update a resource
     */
    public function update() {

        $checklist = TaskChecklist::find(\Request::get('id'));


        if (\Request::get('isComplete') == 'true')
            $isComplete = 1;
        else
            $isComplete = 0;

        $checklist->isComplete = $isComplete;
        $checklist->update();
        $checklist->load('createdBy');
        $checklist->load('updatedBy');

        return $checklist;
    }

    /**
     * Delete an item
     */
    public function delete() {
        $checklist = TaskChecklist::find(\Request::get('id'));
        $checklist->delete();
        return;
    }

}
