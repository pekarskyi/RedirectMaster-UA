<div class="row mb-3">
	<div class="col"><div class="h4">Користувачі</div></div>
	<div class="col-auto">
		<button class="btn btn-primary btn-sm" id="new_user">Додати користувача</button>
	</div>
</div>


<form action="" method="POST" class="mb-4" id="form_new_user">
    <div class="form-row">
        <div class="col">
            <input type="text" name="user_email" class="form-control" required placeholder="Email *">
        </div>
        <div class="col">
            <input type="text" name="user_login" class="form-control" required placeholder="Логін *">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
            <input type="text" name="first_name" class="form-control" required placeholder="Ім&#39;я *">
        </div>
        <div class="col">
            <input type="text" name="last_name" class="form-control" placeholder="Прізвище">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
            <input type="text" name="user_password" class="form-control" required placeholder="Пароль *">
        </div>
        <div class="col">
            <input type="submit" name="user_create" class="btn btn-primary btn-block" value="Додати">
        </div>
    </div>
</form>

<?php foreach ($cats as $cat) : ?>

    <div class="shadow-sm p-2 mb-3 rounded" id="<?php echo $cat['user_id']; ?>">
        <div class="row">
            <div class="col">
                <div class="mt-2"><?php echo $cat['first_name'] . ' ' . $cat['last_name']; ?></div>
            </div>
            <div class="col">
                <div class="mt-2"><?php echo $cat['user_email']; ?></div>
            </div>
            <div class="col">
                <div class="mt-2"><?php echo $cat['user_login']; ?></div>
            </div>
            <div class="col-auto">
                <a href="user-settings.php?user_id=<?php echo $cat['user_id']; ?>" class="btn btn-link"><i class="fas fa-cog"></i></a>
            </div>
            <div class="col-auto">
                <button id="<?php echo $cat['user_id']; ?>" title="Видалити" class="btn btn-link delete_user float-right"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?php include 'footer' . $phpExt; ?>