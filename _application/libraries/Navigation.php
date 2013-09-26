<?php
class Navigation {
    
    public function load(){
        
        $menu_file = file_get_contents("./_application/views/config/navigation.html");
        $nav = (array) json_decode($menu_file,true);
        
        return $nav;
    }
    
    public function render($menu,$currentPage='home.html'){

            foreach ($menu as $m){
                    ?>
                <li <?php echo $currentPage == $m['id'] ? 'class="active"' : '';?>>
                    <a href="/cms<?php echo $m['url'];?>"><?php echo $m['title'];?></a>
                </li>
                <?php
            }
    }
}