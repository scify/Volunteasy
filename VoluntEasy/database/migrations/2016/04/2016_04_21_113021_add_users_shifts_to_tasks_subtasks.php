<?php

use Illuminate\Database\Migrations\Migration;

class AddUsersShiftsToTasksSubtasks extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        /* users, volunteers to tasks, subtasks*/

        Schema::create('tasks_users', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->timestamps();
        });

        Schema::create('tasks_volunteers', function ($table) {
            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers');
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->timestamps();
        });

        Schema::create('subtasks_users', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('subtask_id')->unsigned();
            $table->foreign('subtask_id')->references('id')->on('subtasks');

            $table->timestamps();
        });

        Schema::create('subtasks_volunteers', function ($table) {
            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers');
            $table->integer('subtask_id')->unsigned();
            $table->foreign('subtask_id')->references('id')->on('subtasks');

            $table->timestamps();
        });


        /* shifts to tasks*/

        Schema::create('task_shifts', function ($table) {
            $table->increments('id');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->time('from_hour')->nullable();
            $table->time('to_hour')->nullable();
            $table->string('comments', 500)->nullable();
            $table->integer('volunteer_sum')->nullable();

            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('volunteer_task_shifts', function ($table) {
            $table->increments('id');
            $table->string('description', 500)->nullable();

            $table->integer('task_shift_id')->unsigned();
            $table->foreign('task_shift_id')->references('id')->on('task_shifts');

            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers');

            $table->softDeletes();
            $table->timestamps();
        });


        //the dates filled by the volunteer
        Schema::create('cta_volunteers_task_dates', function ($table) {
            $table->increments('id');

            $table->integer('cta_volunteers_id')->unsigned();
            $table->foreign('cta_volunteers_id')->references('id')->on('cta_volunteers');

            $table->integer('task_shifts_id')->unsigned();
            $table->foreign('task_shifts_id')->references('id')->on('task_shifts');

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('volunteer_task_shift_history', function ($table) {
            $table->increments('id');
            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers');
            $table->integer('shift_id')->unsigned();
            $table->foreign('shift_id')->references('id')->on('task_shifts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tasks_users');
        Schema::dropIfExists('tasks_volunteers');
        Schema::dropIfExists('subtasks_users');
        Schema::dropIfExists('subtasks_volunteers');
        Schema::dropIfExists('volunteer_task_shifts');
        Schema::dropIfExists('cta_volunteers_task_dates');
        Schema::dropIfExists('volunteer_task_shift_history');
        Schema::dropIfExists('task_shifts');

    }
}
