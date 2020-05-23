<div class="card card-blog card-plain blog-horizontal mb-3">
    <div class="card-image">
        <a href="post.php?p_id=<?php echo $post_id; ?>">
            <img class="img rounded" src="/Dave-CMS/images/posts/<?php echo $post_image; ?>" />
        </a>
        <div class="card-body">
            <h3 class="card-title">
                <a class="text-white" href="post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h3>
            <p class="card-description">
                <?php echo substr($post_content, 0, 300); ?>...<br>

                <a class="btn btn-success mt-3" href="post/<?php echo $post_id; ?>">Read More...</a>
            </p>
            <div class="author">
                <?php
                //gets the database connection
                global $connection;
                //create mysql query for categories table
                $query = "SELECT * FROM users WHERE user_id = $post_author";
                //connect to database, and run query
                $display_all_categories = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($display_all_categories);
                sql_error_check($display_all_categories);
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_image = $row['user_image'];
                $user_fullname = $user_firstname . ' ' . $user_lastname;
                ?>
                <img src="/Dave-CMS/images/users/<?php echo $user_image; ?>" alt="<?php echo $post_image; ?>" class="avatar img-raised">
                <div class="text">
                    <span class="name">Posted By <?php echo $user_fullname; ?> On <?php echo date_format($post_date, 'D dS M Y'); ?></span>

                </div>
            </div>
        </div>
    </div>
</div>
