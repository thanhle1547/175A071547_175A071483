<div class="content">
            <div class="content-header">
                <h1 class="title">
                    Tài khoản nhân viên
                </h1>
                <div class="control-group">
                    <button class="btn btn-outline-primary btn-rounded btn-plus">Thêm</button>
                </div>
            </div>
            <div class="data-wrapper">
                <table class="data-table">
                    <tr class="data-row">
                        <td>STT</td>
                        <td>Mã nhân viên</td>
                        <td>Họ tên</td>
                        <td></td>
                    </tr>
                </table>
                <div class="content-form hide">
                <div class="form-control">
                    <button class="btn btn-white-primary btn-back">Quay lại</button>
                    <button class="btn btn-rounded-corner btn-primary btn-inactive" id="btn-add">
                        Thêm
                    </button>
                </div>
                <form class="">
                    <div class="form-group-inline">
                        <label>Ngành học</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="NganhHoc"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                    foreach ($majors as $major)
                                        echo "<div class='val' data-id='$major->MaNganh'>
                                            <span>$major->TenNganh</span>
                                        </div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="MaND">Mã Nhân Viên</label>
                        <input type="text" name="MaND" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="HoTen">Họ Tên</label>
                        <input type="text" name="HoTen" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="GioiTinh">Giới Tính</label>
                        <input type="text" name="GioiTinh" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="SDT">SĐT</label>
                        <input type="text" name="SĐT" required>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script src="../public/js/script.js"></script>
</body>

</html>