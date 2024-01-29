<div class="container" data-aos="fade" data-aos-delay="500">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 30px; /* Added margin at the top for better spacing */
        }

        .card {
            width: 30%;
            padding: 20px;
            margin-bottom: 30px; /* Added margin at the bottom for better spacing between cards */
        }

        .post-image {
            width: 100%; /* Make the image responsive within the card */
            margin-bottom: 20px; /* Added margin at the bottom of the image */
        }

        .comments-section {
            margin-top: 20px;
        }

        .comment {
            margin-bottom: 10px; /* Added margin at the bottom of each comment for better spacing */
        }

        .comment-form {
            margin-top: 20px; /* Added margin at the top of the comment form for better spacing */
        }
    </style>

    <div class="card">
        <div class="post-details text-center">
            <img src="<?= base_url('images/' . $post['cover']); ?>" alt="Post Image" class="img-fluid post-image">
            <p><?= $post['nama_b']; ?></p>
        </div>

        <!-- Tampilkan Komentar -->
        <div class="comments-section text-center">
            <p>Ulasan :</p>
            <?php foreach ($comments as $comment) : ?>
                <div class="comment">
                    <p><strong><?= $comment['username']; ?></strong>: <?= $comment['comment']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- HTML Form untuk Komentar -->
        <form class="comment-form" action="<?= base_url('book/submitComment'); ?>" method="post">
            <input type="hidden" name="post_id" value="<?= $post['id_book']; ?>">
            <textarea name="comment" placeholder="Add a comment"></textarea>
            <br>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
</div>
