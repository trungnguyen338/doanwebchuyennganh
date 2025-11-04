<?php if (!empty($students)): ?>
    <ul style="list-style:none; padding:0; margin:0;">
        <?php foreach ($students as $s): ?>
            <li style="padding:5px; border-bottom:1px solid #ccc; cursor:pointer;"
                onclick="selectStudent('<?= htmlspecialchars($s['name']) ?>')">
                <?= htmlspecialchars($s['name']) ?> - <?= htmlspecialchars($s['email']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p style="padding:5px; color:#666;">Không tìm thấy</p>
<?php endif; ?>