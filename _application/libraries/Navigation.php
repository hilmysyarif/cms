<?php
class Navigation {
    
    public function render($menu,$currentPage){

            foreach ($menu as $m){
                    ?>
                <li <?php echo $currentPage == $m['id'] ? 'class="active"' : '';?>>
                    <a href="/cms<?php echo $m['url'];?>"><?php echo $m['title'];?></a>
                </li>
                <?php
            }
    }
}