<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SoftControl</a>
                
            </div>
            <ul class="nav navbar-nav">
                <?php
                    foreach ($menu['menu'] as $m){
                            ?>
                        <li <?php echo $pagename == $m['id'] ? 'class="active"' : '';?>>
                            <a href="/cms<?php echo $m['url'];?>"><?php echo $m['title'];?></a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
    
    