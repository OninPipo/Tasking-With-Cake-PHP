<?php
$this->assign('title', 'Task List'); // Set page title
?>

<div class="content-container">
    <h1 class="mb-4">Board</h1>
    <div class="task-sections">
        <!-- Tasks (Pending) -->
        <div class="task-container pending">
            <div class="task-header">
                <h3>Tasks</h3>
                <?= $this->Html->link('+', ['action' => 'add'], ['class' => 'add-task-btn']) ?>
            </div>
            <?php foreach ($pendingTasks as $task): ?>
                <div class="task-item">
                    <div class="task-content">
                        <h4 class="task-name"><?= h($task->name) ?></h4> <!-- Center the task name -->
                        <strong>Description:</strong> <?= h($task->description ?: 'No description provided') ?><br>
                        <strong>Date Created:</strong> <?= h($task->created ? $task->created->format('F d, Y h:i A') : 'N/A') ?><br>
                        <strong>Due Date:</strong> <?= h($task->due_date ? $task->due_date->format('F d, Y h:i A') : 'N/A') ?><br>
                    </div>

                    <!-- Task Actions (Dropdown) -->
                    <div class="task-dropdown">
                        <button class="dropdown-toggle">⋮</button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link('Start Task', ['action' => 'startTask', $task->id], ['class' => 'dropdown-item start']) ?>
                            <?= $this->Html->link('Edit', ['action' => 'edit', $task->id], ['class' => 'dropdown-item edit']) ?>
                            <?= $this->Html->link('View', ['action' => 'view', $task->id], ['class' => 'dropdown-item view']) ?>
                            <?= $this->Html->link('Complete', ['action' => 'complete', $task->id], ['class' => 'dropdown-item complete']) ?>
                            <?= $this->Form->postLink('Delete', ['action' => 'delete', $task->id], ['class' => 'dropdown-item delete', 'confirm' => 'Are you sure?']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Already Doing (Ongoing) -->
        <div class="task-container ongoing">
            <div class="task-header">
                <h3>Already Doing</h3>
            </div>
            <?php foreach ($alreadyDoing as $task): ?>
                <div class="task-item">
                    <div class="task-content">
                        <h4 class="task-name"><?= h($task->name) ?></h4> <!-- Center the task name -->
                        <strong>Description:</strong> <?= h($task->description ?: 'No description provided') ?><br>
                        <strong>Date Created:</strong> <?= h($task->created ? $task->created->format('F d, Y h:i A') : 'N/A') ?><br>
                        <strong>Due Date:</strong> <?= h($task->due_date ? $task->due_date->format('F d, Y h:i A') : 'N/A') ?><br>
                    </div>

                    <!-- Task Actions (Dropdown, No Start Task for Ongoing) -->
                    <div class="task-dropdown">
                        <button class="dropdown-toggle">⋮</button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link('Edit', ['action' => 'edit', $task->id], ['class' => 'dropdown-item edit']) ?>
                            <?= $this->Html->link('View', ['action' => 'view', $task->id], ['class' => 'dropdown-item view']) ?>
                            <?= $this->Html->link('Complete', ['action' => 'complete', $task->id], ['class' => 'dropdown-item complete']) ?>
                            <?= $this->Form->postLink('Delete', ['action' => 'delete', $task->id], ['class' => 'dropdown-item delete', 'confirm' => 'Are you sure?']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Completed Tasks -->
        <div class="task-container completed">
            <div class="task-header">
                <h3>Completed</h3>
            </div>
            <?php foreach ($completed as $task): ?>
                <div class="task-item">
                    <div class="task-content">
                        <h4 class="task-name"><?= h($task->name) ?></h4> <!-- Center the task name -->
                        <strong>Description:</strong> <?= h($task->description ?: 'No description provided') ?><br>
                        <strong>Completed On:</strong> <?= h($task->completed_date ? $task->completed_date->format('F d, Y h:i A') : 'N/A') ?><br>
                    </div>

                    <!-- Task Actions (Dropdown for Completed Tasks) -->
                    <div class="task-dropdown">
                        <button class="dropdown-toggle">⋮</button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link('Edit', ['action' => 'edit', $task->id], ['class' => 'dropdown-item edit']) ?>
                            <?= $this->Html->link('View', ['action' => 'view', $task->id], ['class' => 'dropdown-item view']) ?>
                            <?= $this->Form->postLink('Delete', ['action' => 'delete', $task->id], ['class' => 'dropdown-item delete', 'confirm' => 'Are you sure?']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->Html->css('index') ?>
