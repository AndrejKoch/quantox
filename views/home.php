<?php namespace app\core; ?>

    <?php use \app\core\Application; ?>
    <?php use \app\core\DbModel; ?>


    <?php if (Application::isGuest()): ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h3>Please login to see this page</h3>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h3 class="mt-4">Welcome <?php echo Application::$app->user->getDisplayName() ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="results" method="post">
                    <input required class="form-control mt-4 w-50" type="text" name="search"
                           placeholder="Search by name or email"/>

                    <button type="submit" class="mt-4 text-center btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>