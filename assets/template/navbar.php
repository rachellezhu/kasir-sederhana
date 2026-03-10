<style>
    .dropdown-menu li {
        position: relative;
    }

    .dropdown-menu .dropdown-submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: -7px;
    }

    .dropdown-menu .dropdown-submenu-left {
        right: 100%;
        left: auto;
    }

    .dropdown-menu>li:hover>.dropdown-submenu {
        display: block;
    }
</style>

<div id="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Kasir</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['name'] ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <span class="dropdown-header" style="font-size: larger;">
                            <?= $_SESSION['name'] ?>
                        </span>
                    </li>
                    <li>
                    <li>
                        <a class="dropdown-item" href="index.php?page=barang">
                            Data Barang
                        </a>
                    </li>
                    <li>
                        <button class="dropdown-item dropdown-toggle">
                            Master Transaksi
                        </button>
                        <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                            <li>
                                <a class="dropdown-item" href="index.php?page=data-transaksi">
                                    Data Transaksi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?page=mulai-transaksi">
                                    Mulai Transaksi
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda ingin keluar?')">
                            Logout
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>