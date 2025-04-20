<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="/notes" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <div class="col-span-full">
            <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
            <div class="mt-2">
                <textarea 
                name="body" 
                id="body" 
                rows="3" 
                placeholder="Here's an idea for a note..." 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                ><?= $note['body'] ?></textarea>
                
                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                <?php endif; ?>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a
                    href="/notes"
                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Update
                </button>
            </div>
        </form>
        <form action="/notes" method="POST">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?= $note['id']?>">
            <button type="submit" class="text-red-500 font-bold hover:underline">Delete</button>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>