
            <header class="row">
                <h1 class="logo col-md-3 col-12">
                    <a href="index.php">ArticleNest</a>
                </h1>
                <nav class="navigation col-md-9 col-12">
                    <ul>
                    <a href="index.php" class="main-a"><li>Главная</li></a>
                        <a href="create-post.php" class="create-a"><li>Создать статью</li></a>
                        <a href="profile.php?id=<?php echo $_COOKIE['id']?>" class="user-a"><li><i class="fa-solid fa-user"></i> <?php echo $_COOKIE['username']?></li></a>
                        <a href="logout.php"  class="exit-a"><li><i class="fa-solid fa-arrow-right-from-bracket"></i> Выйти</li></a>
                        
                    </ul>
                    
                </nav>
                <div class="drop-menu">
                    <a class="more" onclick="dropdown()"><i class="fa-solid fa-bars"></i></a>
                    <ul class="drop-ul">
                    <a href="index.php"><li>Главная</li></a>
                        <a href="create-post.php"><li>Создать статью</li></a>
                        <a href="profile.php?id=<?php echo $_COOKIE['id']?>"><li><i class="fa-solid fa-user"></i> <?php echo $_COOKIE['username']?></li></a>
                        <a href="logout.php"><li><i class="fa-solid fa-arrow-right-from-bracket"></i> Выйти</li></a>
                    </ul>
                </div>
            </header>


