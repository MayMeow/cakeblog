<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="content">
    <h3>Admin Dashboard</h3>
    <p>Welcome to the administration area.</p>

    <div class="row">
        <div class="column">
            <div class="card" style="background: #f4f4f4; padding: 1rem; border-radius: 4px; text-align: center;">
                <h4>Blogs</h4>
                <p style="font-size: 2rem; font-weight: bold;"><?= $blogsCount ?></p>
            </div>
        </div>
        <div class="column">
            <div class="card" style="background: #f4f4f4; padding: 1rem; border-radius: 4px; text-align: center;">
                <h4>Posts</h4>
                <p style="font-size: 2rem; font-weight: bold;"><?= $postsCount ?></p>
            </div>
        </div>
        <div class="column">
            <div class="card" style="background: #f4f4f4; padding: 1rem; border-radius: 4px; text-align: center;">
                <h4>Users</h4>
                <p style="font-size: 2rem; font-weight: bold;"><?= $usersCount ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <h4>Quick Actions</h4>
            <ul>
                <li>
                    <?= $this->Html->link('Manage Blogs', ['controller' => 'Blogs', 'action' => 'index']) ?>
                </li>
                <li>
                    <?= $this->Html->link('Manage Posts', ['controller' => 'Posts', 'action' => 'index']) ?>
                </li>
            </ul>
            <?php if ($hasValidLicense): ?>
                <p style="color: oklch(62.7% 0.194 149.214); font-weight: bold;">🎉 This blog has a valid license.</p>
            <?php else: ?>
                <p style="color: oklch(70.4% 0.04 256.788);">
                    &#8505;&#65039; You are using the free version of blog.
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>