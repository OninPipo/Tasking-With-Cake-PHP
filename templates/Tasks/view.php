<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="task-container"> <!-- NEW: Unified container for better layout -->

    <!-- Task Header -->
    <h3><?= h($task->name) ?></h3>

    <!-- Action Buttons (Now in a single row) -->
    <div class="action-buttons"> 
        <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id], ['class' => 'btn btn-info']) ?>
        <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $task->id), 
            'class' => 'btn btn-danger'
        ]) ?>
        <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <!-- Task Details Table (Wrapped for better layout) -->
    <div class="task-details">
        <table>
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($task->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= h($task->status) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($task->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Date Created') ?></th>
                <td><?= h($task->date_created) ?></td>
            </tr>
            <tr>
                <th><?= __('Updated At') ?></th>
                <td><?= h($task->updated_at) ?></td>
            </tr>
        </table>
    </div>

</div> <!-- END of .task-container -->

<?= $this->Html->css('view') ?>
