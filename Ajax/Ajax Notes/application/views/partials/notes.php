<script>
		$(document).ready(function(){
             /*
                DOCU: This is an ajax for deleting notes
                OWNER: Rommel
            */
			$('form#delete').submit(function(){
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#notes').html(res);
                });
			return false;
			});
            /*
                DOCU: This is an ajax for updating notes
                OWNER: Rommel
            */
            $('.notes').on("blur", "#update", function(e) {
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#notes').html(res);
                });
			return false;
			});
		});
</script>
<?php
    /*
        DOCU: This render all the notes from the db
        OWNER: Rommel
    */
    foreach($notes as $note)
    {  ?>
        <div class="notes">
            <form id='update' action="/notes/update" method="post">
                <h2 name="title"><?= $note["title"] ?></h2></input>
                <textarea id="description" name="description"><?= $note["description"] ?></textarea>
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="submit" value="update" style="visibility: hidden;">
            </form>
            <form id='delete' action="/notes/delete" method="post">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="submit" value="delete">
            </form>
        </div>
<?php
    }  ?>