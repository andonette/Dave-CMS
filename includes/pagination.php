<nav aria-label="Page navigation example">
<ul class="pagination py-5">
<!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
<?php
$i=0;
for ($i=1; $i < $pages_count; $i++) {
?>
<li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
<?php
}
?>
<!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
</ul>
</nav>
