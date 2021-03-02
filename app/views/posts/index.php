<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Atsiliepimai</h1>
        </div>
    </div>

    <div id="commentContainer">
        <?php foreach ($data['posts'] as $post) : ?>
            <div class="card card-body mb-3">
                <div class="card-header">
                    <b><?php echo $post->author; ?></b>
                    <span><?php echo $post->created_at; ?></span>
                </div>
                <div class="card-body">
                    <?php echo $post->comment_body; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <form id="commentForm" action="" method="POST">
            <div class="form-group">
                <label for="comment">Jūsų komentaras: </label>
                <br>
                <textarea name="comment" id="comment" cols="80" rows="12"></textarea>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Paskelbti" class="btn btn-success btn-block mt-2">
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <script>
        const commentForm = document.getElementById('commentForm');
        const commentContainer = document.getElementById('commentContainer');

        commentForm.addEventListener('submit', addComment);


        function addComment(e) {
            e.preventDefault();

            const commentData = new FormData(commentForm)

            commentData.append('userName', '<?php echo $_SESSION['user_name']; ?>')
            commentData.append('user_id', '<?php echo $_SESSION['user_id']; ?>')

            fetch('<?php echo URLROOT . '/api/addComment/' ?>', {
                    method: 'post',
                    body: commentData,
                })
                .then(resp => resp.json())
                .then(data => {

                    displayComments();
                    // if (data.success){
                    // handleSuccessComment();
                    // } else {
                    // handleCommentError(data.errors)
                    // }
                })
                .catch(error => console.error(error));
        }


        function displayComments() {
            commentContainer.innerHTML = '';

            fetch('<?php echo URLROOT . '/api/getComments/' ?>')
                .then(resp => resp.json())
                .then(data => {
                    data.map(item => {
                        commentContainer.innerHTML += `
                    <div class="card" id='${item.user_id}'>
                    <div class="card-header">
                    <b>${item.author}</b>
                    <span>${item.created_at}</span></div>
                    <div class="card-body">
                    ${item.comment_body}
                    </div>
                    </div>
                    <br>
                    `
                    })
                })


        }
        displayComments()
    </script>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>