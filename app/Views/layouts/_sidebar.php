<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-discord-alt icon'></i>
        <div class="logo_name">InvenApp</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li class="<?= uri_string() == 'dashboard' ? 'active':'' ?>">
            <a href="/dashboard" class="link">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="<?= uri_string() == 'user' ? 'active':'' ?>">
            <a href="/user" class="link">
                <i class='bx bx-user'></i>
                <span class="links_name">Users</span>
            </a>
            <span class="tooltip">Users</span>
        </li>
        <li class="<?= uri_string() == 'barang' ? 'active':'' ?>">
            <a href="/barang" class="link">
                <i class='bx bx-box'></i>
                <span class="links_name">Barang</span>
            </a>
            <span class="tooltip">Barang</span>
        </li>
        <li class="<?= uri_string() == 'transaction' ? 'active':'' ?>">
            <a href="/transaction" class="link">
                <i class='bx bx-cart-alt'></i>
                <span class="links_name">Transaction</span>
            </a>
            <span class="tooltip">Transaction</span>
        </li>
        <li class="<?= uri_string() == 'profile' ? 'active':'' ?>">
            <a href="/profile" class="link">
                <i class='bx bx-user'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="<?= base_url(); ?>/images/avatar/cat.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name"><a href="/profile" class="text-purple"><?= session()->name ?></a></div>
                    <div class=" job"><?= session()->level ?>
                    </div>
                </div>
            </div>
            <div>
                <a href="/logout" class="logout">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </li>
    </ul>
</div>