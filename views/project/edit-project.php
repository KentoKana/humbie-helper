<?php include '../../header.php';?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Edit Project</h1>
        <div class="p-4">
            <form action="" method="POST" class="m-4">
                <div>
                    <label for="project-name">Project Name:</label>
                </div>
                <div>
                    <input type="text" class="form__input-field" name="project-name">
                </div>
                <div>
                    <label for="project-description">Project Description:</label>
                </div>
                <div>
                    <textarea class="form__textarea" name="project-description"></textarea>
                </div>
                <button class="m-4" type="submit">Submit</button>
            </form>
        </div>

    </div>
</main>

<?php include '../../footer.php';?>