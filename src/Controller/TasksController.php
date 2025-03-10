<?php
declare(strict_types=1);

namespace App\Controller;

class TasksController extends AppController
{
    public function index()
    {
        // Fetch tasks based on status
        $pendingTasks = $this->Tasks->find()->where(['status' => 'Pending'])->all();
        $alreadyDoing = $this->Tasks->find()->where(['status' => 'Ongoing'])->all();
        $completed = $this->Tasks->find()->where(['status' => 'Completed'])->all();

        // Pass the task lists to the view
        $this->set(compact('pendingTasks', 'alreadyDoing', 'completed'));
    }

    public function add()
    {
        $task = $this->Tasks->newEmptyEntity();

        if ($this->request->is('post')) {
            // Save the task data from the form
            $task = $this->Tasks->patchEntity($task, $this->request->getData());

            // Ensure due_date is formatted correctly
            if (!empty($this->request->getData('due_date'))) {
                $task->due_date = date('Y-m-d H:i:s', strtotime($this->request->getData('due_date')));
            }

            // Save task and redirect to index
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been added successfully.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The task could not be added. Please try again.'));
        }

        $this->set(compact('task'));
    }

    public function startTask($id = null)
    {
        // Fetch the task by ID
        $task = $this->Tasks->get($id);

        // Only update if the task is in 'Pending' status
        if ($task->status === 'Pending') {
            $task->status = 'Ongoing';

            // Save the task and redirect
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('Task has been started successfully.'));
            } else {
                $this->Flash->error(__('Failed to start the task. Please try again.'));
            }
        } else {
            $this->Flash->error(__('Only pending tasks can be started.'));
        }

        return $this->redirect(['action' => 'index']); // Redirect back
    }

    public function complete($id = null)
    {
        // Fetch the task by ID
        $task = $this->Tasks->get($id);

        // Check if the task is not already completed
        if ($task->status !== 'Completed') {
            $task->status = 'Completed';
            $task->completed_date = new \DateTime(); // Set completed date

            // Save the task with the updated status
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been completed successfully.'));
            } else {
                $this->Flash->error(__('The task could not be completed. Please try again.'));
            }
        } else {
            $this->Flash->error(__('This task is already completed.'));
        }

        // Redirect to the index page to see the updated list
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        // Fetch task details by ID
        $task = $this->Tasks->get($id);
        $this->set(compact('task'));
    }

    public function edit($id = null)
    {
        // Fetch the task by ID
        $task = $this->Tasks->get($id);

        if ($this->request->is(['post', 'put'])) {
            // Update the task data with form inputs
            $task = $this->Tasks->patchEntity($task, $this->request->getData());

            // Ensure the due date is formatted correctly
            if (!empty($this->request->getData('due_date'))) {
                $task->due_date = date('Y-m-d H:i:s', strtotime($this->request->getData('due_date')));
            }

            // Save updated task and redirect
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been updated successfully.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The task could not be updated. Please try again.'));
        }

        $this->set(compact('task'));
    }

    public function delete($id = null)
    {
        // Allow only POST and DELETE methods
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);

        // Delete the task and return a flash message
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted successfully.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
