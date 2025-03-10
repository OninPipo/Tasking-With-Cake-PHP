<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->css('styles') ?>
</head>
<body>

<div class="layout">
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Task Tracker</h2>
        <ul>
            <li><?= $this->Html->link('Tasks', ['controller' => 'Tasks', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Journal', ['controller' => 'Journal', 'action' => 'index']) ?></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <?= $this->fetch('content') ?>
    </div>
</div>

</body>
</html>
