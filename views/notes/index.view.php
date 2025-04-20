<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <ul>
                <li class="mb-2">
                    <a href="/note?id=<?= $note['id'] ?>" class="font-bold text-blue-500 truncate block hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            </ul>
        <?php endforeach; ?>
        <p>
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>