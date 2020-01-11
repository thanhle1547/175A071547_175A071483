<div class="app-body">
    <aside class="nav-right">
        <nav>
            <ul>
                <?php if ($_SESSION['chucvu'] == 1) : ?>
                    <li>
                        <h5 class="submenu-title">
                            Quản Lí Tài Khoản
                        </h5>
                        <ul class="submenu show">
                            <li class="<?= $page == 'tk-nhanvien' ? 'active' : '' ?>"><a href="tk-nhanvien">Tài khoản nhân viên</a></li>
                            <li class="<?= $page == 'tk-giangvien' ? 'active' : '' ?>"><a href="tk-giangvien">Tài khoản giảng viên</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['chucvu'] <= 2) : ?>
                    <li>
                        <h5 class="submenu-title">
                            Quản Lí
                        </h5>
                        <ul class="submenu show">
                            <li class="<?= $page == 'nganh-hoc' ? 'active' : '' ?>"><a href="nganh-hoc">Ngành học</a></li>
                            <li class="<?= $page == 'mon-hoc' ? 'active' : '' ?>"><a href="mon-hoc">Môn Học</a></li>
                            <li class="<?= $page == 'lop-hoc-phan' ? 'active' : '' ?>"><a href="lop-hoc-phan">Lớp Học Phần </a></li>
                            <li class="<?= $page == 'giang-vien' ? 'active' : '' ?>"><a href="giang-vien">Giảng Viên</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['chucvu'] <= 3) : ?>
                    <li>
                        <h5 class="submenu-title">
                            Quản Lí
                        </h5>
                        <ul class="submenu show">
                            <li class="<?= $page == 'ke-hoach' ? 'active' : '' ?>"><a href="ke-hoach">Kế hoạch giảng dạy</a></li>
                            <li class="<?= $page == 'lich-trinh' ? 'active' : '' ?>"><a href="lich-trinh">Lịch trình giảng dạy</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </aside>