<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
      <h1 class="logo-text"><span>Awa</span>Inspires</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li class="ct-language "><a>Language</a>
               <ul class="list-unstyled ct-language__dropdown">
                 <li><a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en">USA</a></li>
                 <li><a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es">MEXICO</a></li>
                 <li><a href="#googtrans(en|fr)" class="lang-es lang-select" data-lang="fr">FRANCE</a></li>
                 <li><a href="#googtrans(en|zh-CN)" class="lang-es lang-select" data-lang="zh-CN">CHINA</a></li>
                 <li><a href="#googtrans(en|ja)" class="lang-es lang-select" data-lang="ja">JAPAN</a></li>
               </ul>
            </li>

      <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>
            <?php if($_SESSION['admin']): ?>
              <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
            <?php endif; ?>
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
        <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
      <?php endif; ?>
    </ul>
</header>