<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/Dave-CMS">Dave</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                        Categories</a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-danger">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                $category_class = '';
                                $registration_class = '';
                                $registration = 'registration';
                                $current_page = basename($_SERVER['PHP_SELF']);
                                if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                                    $category_class = 'active';
                                } else if($page_name = $registration){
                                $registration_class = 'active';
                                }
                                    echo "<a class='dropdown-item {$category_class}' href='/Dave-CMS/category/{$cat_id}'>{$cat_title}</a>";
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-auto  <?php echo $registration_class ?>" href="/Dave-CMS/contact">Contact</a>
                    </li>
                    <?php if (is_logged_in()): ?>
                        <li class="nav-item">
                            <a class="nav-link ml-auto <?php echo $registration_class ?>" href="/Dave-CMS/admin">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-auto <?php echo $registration_class ?>" href="/Dave-CMS/logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link ml-auto <?php echo $registration_class ?>" href="/Dave-CMS/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-auto <?php echo $registration_class ?>" href="/Dave-CMS/registration">Register</a>
                        </li>
                    <?php endif; ?>
                    <?php show_update(); ?>
                </ul>
            </div>
        </div>
    </nav>
