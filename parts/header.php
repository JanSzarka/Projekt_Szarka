<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once "functions.php";

    use Projekt_Szarka\DataLoader;

    $dataLoader = new DataLoader("data/data.json");

    try {
        $navItems = $dataLoader->getSection('navbar');
    } catch (Exception $e) {
        $navItems = [];
    }
?>

<header class="site-header">

                <?php if (isset($_SESSION["username"])): ?>
                    <div class="user-info">
                        <p>Hello, <?= htmlspecialchars($_SESSION["username"]) ?></p>
                        <a href="parts/logout.php">Logout</a>
                    </div>
                <?php endif; ?>
				<div class="container">
					<a href="index.html" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">Company Name</h1>
							<small class="site-description">Tagline goes here</small>
						</div>
					</a> <!-- #branding -->

                    <div class="main-navigation">
                        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                        <ul class="menu">
                            <?php
                            for ($i = 0, $len = count($navItems); $i < $len; $i++) {
                                $item = $navItems[$i];

                                if (!empty($item['adminOnly']) && (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')) {
                                    continue;
                                }

                                ?>
                                <li class="menu-item<?= (basename($_SERVER['SCRIPT_NAME']) === $item['url']) ? ' current-menu-item' : '' ?>">
                                    <a href="<?= htmlspecialchars($item['url']) ?>">
                                        <?= htmlspecialchars($item['label']) ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul> <!-- .menu -->
                    </div> <!-- .main-navigation -->
                </div>
</header>