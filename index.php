<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1>Blog</h1>
            <div class="section blogs-3">
       <div class="container">
         <div class="row">
           <div class="col-md-10 ml-auto mr-auto">

             <h2 class="title">Latest Blogposts 3</h2>
             <br />
             <?php
            $query = "SELECT * FROM posts";
            $select_all_categories_query = mysqli_query($connection, $query);
              ?>
             <div class="card card-blog card-plain blog-horizontal">
               <div class="row">
                 <div class="col-lg-4">
                   <div class="card-image">
                     <a href="javascript:;">
                       <img class="img rounded" src="assets/img/serge-kutuzov.jpg" />
                     </a>
                   </div>
                 </div>
                 <div class="col-lg-8">
                   <div class="card-body">
                     <h3 class="card-title">
                       <a href="javascript:;">Rover raised $65 million for pet sitting</a>
                     </h3>
                     <p class="card-description">
                       Finding temporary housing for your dog should be as easy as renting an Airbnb. That’s the idea behind Rover, which raised $65 million to expand its pet sitting and dog-walking businesses..Finding temporary housing for your dog should be as easy as renting an Airbnb. That’s the idea behind Rover, which raised $65 million to expand its pet sitting and dog-walking businesses..
                       <a href="javascript:;"> Read More </a>
                     </p>
                     <div class="author">
                       <img src="assets/img/julie.jpg" alt="..." class="avatar img-raised">
                       <div class="text">
                         <span class="name">Tom Hanks</span>
                         <div class="meta">Drawn on 23 Jan</div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="card card-blog card-plain blog-horizontal">
               <div class="row">
                 <div class="col-lg-4">
                   <div class="card-image">
                     <a href="javascript:;">
                       <img class="img rounded" src="assets/img/trae-gould.jpg" />
                     </a>
                   </div>
                 </div>
                 <div class="col-lg-8">
                   <div class="card-body">
                     <h3 class="card-title">
                       <a href="javascript:;">MateLabs mixes machine learning with IFTTT</a>
                     </h3>
                     <p class="card-description">
                       If you’ve ever wanted to train a machine learning model and integrate it with IFTTT, you now can with a new offering from MateLabs. MateVerse, a platform where novices can spin out machine...If you’ve ever wanted to train a machine learning model and integrate it with IFTTT, you now can with a new offering from MateLabs. MateVerse, a platform where novices can spin out machine...
                       <a href="javascript:;"> Read More </a>
                     </p>
                     <div class="author">
                       <img src="assets/img/james.jpg" alt="..." class="avatar img-raised">
                       <div class="text">
                         <span class="name">Tom Hanks</span>
                         <div class="meta">Drawn on 23 Jan</div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="card card-blog card-plain blog-horizontal">
               <div class="row">
                 <div class="col-lg-4">
                   <div class="card-image">
                     <a href="javascript:;">
                       <img class="img rounded" src="assets/img/mark-harrison.jpg" />
                     </a>
                   </div>
                 </div>
                 <div class="col-lg-8">
                   <div class="card-body">
                     <h3 class="card-title">
                       <a href="javascript:;">US venture investment ticks up in Q2 2017</a>
                     </h3>
                     <p class="card-description">
                       Venture investment in U.S. startups rose sequentially in the second quarter of 2017, boosted by large, late-stage financings and a few outsized early-stage rounds in tech and healthcare..enture investment in U.S. startups rose sequentially in the second quarter of 2017, boosted by large, late-stage financings and a few outsized early-stage rounds in tech and healthcare..
                       <a href="javascript:;"> Read More </a>
                     </p>
                     <div class="author">
                       <img src="assets/img/michael.jpg" alt="..." class="avatar img-raised">
                       <div class="text">
                         <span class="name">Tom Hanks</span>
                         <div class="meta">Drawn on 23 Jan</div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
        </div>
        <div class="col-sm-4">
            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
