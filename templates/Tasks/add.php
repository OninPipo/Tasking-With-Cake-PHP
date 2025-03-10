<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="edit-container">
    <h2><?= __('Add Task') ?></h2>

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

        <div class="form-actions">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn-submit']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>

<?= $this->Html->css('edit') ?> <!-- Using edit.css -->
