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
                <?php
                    if(isset($m['submenu'])){
                ?>
                <li class="dropdown <?php echo $currentPage == $m['id'] ? ' active' : '';?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $m['title'];?></a>
                    <ul class="dropdown-menu">
                        <li><a href="/cms<?php echo $m['url'];?>" class="active"><?php echo $m['title'];?></a></li>
                        <?php
                            foreach ($m['submenu'] as $submenu){
                        ?>
                            <li <?php echo $currentPage == $submenu['id'] ? 'class="active"' : '';?>>
                                <a href="/cms<?php echo $submenu['url'];?>"><?php echo $submenu['title'];?></a>
                            </li>
                        <?php
                            }      
                        ?>
                    </ul>
                </li>
                <?php } else { ?>
                <li <?php echo $currentPage == $m['id'] ? 'class="active"' : '';?>>
                    <a href="/cms<?php echo $m['url'];?>"><?php echo $m['title'];?></a>
                </li>
                <?php }?>
                <?php
            }
    }
}