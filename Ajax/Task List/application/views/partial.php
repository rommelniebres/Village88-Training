<script>
		$(document).ready(function(){
            /*
                DOCU: This is an ajax for updating notes
                OWNER: Rommel
            */
            $('.tasks').on("click", "#edit_button", function(e) {
                alert('Not yet done');
			return false;
			});
		});
</script>
<?php
    foreach($tasks as $task)
    {  ?>
        <div class="tasks">
            <form action="/tasks/edit" id="edit" method="POST">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <input type="button" id="edit_button" value="Edit">
                <input type="checkbox" name="done" id="done">
                <span id="task_name"><?= $task['name'] ?></span>
            </form>
        </div>
        
<?php
    }  ?>