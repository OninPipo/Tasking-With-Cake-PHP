<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="edit-container"> <!-- Main wrapper -->
    <h2><?= __('Edit Task') ?></h2>

    <div class="edit-form">
        <?= $this->Form->create($task, ['novalidate' => true]) ?>
        <fieldset>
            <?php
                echo $this->Form->control('name', ['label' => 'Task Name']);
                echo $this->Form->control('description', ['label' => 'Description', 'type' => 'textarea']);
                echo $this->Form->control('status', [
                    'label' => 'Status',
                    'options' => [
                        'Pending' => 'Pending',
                        'Ongoing' => 'Ongoing',
                        'Completed' => 'Completed'
                    ]
                ]);
                echo $this->Form->control('due_date', ['label' => 'Due Date', 'type' => 'datetime-local']);
            ?>
        </fieldset>

        <!-- Submit & Delete Buttons -->
        <div class="form-actions">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn-submit']) ?>
            <?= $this->Form->postLink(
                __('Delete Task'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'btn-delete']
            ) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Html->css('edit') ?> <!-- Using edit.css -->
