<div class="content">
            <div class="content-header">
                <h1 class="title">
                    Lớp Học Phần
                </h1>
                <div class="form-control">
                    <div class="form-group">
                        <div class="select-box">
                            <div class="selected-value"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <div class="val">
                                        <span>Công nghệ thông tin</span>
                                    </div>
                                    <div class="val">
                                        <span>Hệ thống thông tin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>Ngành học</label>
                    </div>
                    <div class="form-group">
                        <div class="select-box">
                            <div class="selected-value"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <div class="val">
                                        <span>Công nghệ web</span>
                                    </div>
                                    <div class="val">
                                        <span>Hệ thống thông tin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>Môn học</label>
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-rounded btn-plus">Thêm</button>
            </div>
    
            </button>
            <table class="data-table">
                <tr>
                    <td>STT</td>
                    <td>Mã lớp học phần</td>
                    <td>Tên giảng viên</td>
                    <td>Thời Gian Bắt Đầu</td>
                    <td>Thời Gian Kết Thúc</td>
                    <td>Số Tín Chỉ</td>
                    <td>Loại Lớp</td>
                    <td>Nhóm</td>
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
                    <div class="form-group form-group-inline">
                        <label for="MaLHP">Mã Lớp Hoc Phần</label>
                        <input type="text" name="MaLHP" required>
                    </div>
                    <div class="form-group-inline">
                        <label>Môn Học</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="MH"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                        foreach ($majors as $major)
                                            echo "<div class='val' data-id='$major->MaMon'>
                                                <span>$major->TenMon</span>
                                            </div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <label>Giáo Viên</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="GV"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                        foreach ($majors as $major)
                                            echo "<div class='val' data-id='$major->MaGV'>
                                                <span>$major->HoTen</span>
                                            </div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <label>Lớp</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="Lop"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                        foreach ($majors as $major)
                                            echo "<div class='val' data-id='$major->MaLop'>
                                                <span>$major->TenLop</span>
                                            </div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <label>Thời Gian</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="TG"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                        foreach ($majors as $major)
                                            echo "<div class='val' data-id='$major->MaTG'>
                                                <span>$major->ThoiGian</span>
                                            </div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <label>Loại Lớp</label>
                        <div class="select-box">
                            <div class="selected-value" data-name="LoaiLop"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <div class="val">
                                        <span>lý thuyết</span>
                                    </div>
                                    <div class="val">
                                        <span>thảo luận</span>
                                    </div>
                                    <div class="val">
                                        <span>thực hành</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="TG_BatDau">TG_Bắt Đầu</label>
                        <input type="date" name="TG_BatDau" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="TG_KetThuc">TG_Kết Thúc</label>
                        <input type="date" name="TG_KetThuc" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="SoTinChi">Số Tín Chỉ</label>
                        <input type="number" name="SoTinChi" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="Nhom">Nhóm</label>
                        <input type="number" name="Nhom" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.btn-add').click(function() {
            let ThoiGian = $('.selected-value[data-name="ThoiGian"]').attr('data-id');
            let LoaiLop = $('.selected-value[data-name="LoaiLop"]').text();
            let MaLop = $('.selected-value[data-name="Lop"]').attr('data-id');
            let MaGiaoVien = $('.selected-value[data-name="GV"]').attr('data-id');
            let MaLHP = $("input[name='MaLHP']").val();
            let MaMon = $('.selected-value[data-name="MH"]').attr('data-id');
            let TG_BatDau = $("input[name='TG_BatDau']").val();
            let TG_KetThuc = $("input[name='TG_KetThuc']").val();
            let SoTinChi = $("input[name='SoTinChi']").val();
            let Nhom = $("input[name='Nhom']").val();
            $.ajax({
                url: 'subjects/add_subject',
                type: 'POST',
                data: {
                    maMon: MaMon,
                    loaiLop: LoaiLop,
                    maLHP: MaLHP,
                    maGiaoVien: MaGiaoVien,
                    maLop: MaLop,
                    thoiGian: ThoiGian,
                    tg_BatDau: TG_BatDau,
                    tg_KetThuc: TG_KetThuc,
                    soTinChi: SoTinChi,
                    nhom: Nhom
                }
            }).done(function() {
                $('.btn-back').click();
                $('.data-table').append(`
                <tr class="data-row" data-field-id="${MaMon}">
                    <td>${}</td>
                    <td>${MaLHP}</td>
                    <td>${HoTen}</td>
                    <td>${TG_BatDau}</td>
                    <td>${TG_KetThuc}</td>
                    <td>${SoTinChi}</td>
                    <td>${LoaiLop}</td>
                    <td>${Nhom}</td>
                    <td class="row-edit">
                        <button class="btn btn-rounded btn-edit">
                        </button>
                        <button class="btn btn-rounded btn-delete">
                        </button>
                    </td>
                </tr>
                `);
            }).fail(function(xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
                alert("Có lỗi khi thực hiện!\nError: " + errorMessage);
            })
        });
    });

    function filter(id, data_name) {
        $.ajax({
            url: 'subjects/load_subjects',
            type: 'POST',
            data: {
                data: {maNganh: id}
            }
        }).done(function(response) {
            // Xóa hết dl trừ cột tiêu đề
            $('.data-row:not(:first-child)').html('');
            $.each(response, function(index, value) {
                $('.data-table').append(`
            <tr class="data-row" data-field-id="${response[index].MaMon}">
                <td>${response[index].MaMon}</td>
                <td>${response[index].TenMon}</td>
                <td class="row-edit">
                    <button class="btn btn-rounded btn-edit">
                    </button>
                    <button class="btn btn-rounded btn-delete">
                    </button>
                </td>
            </tr>
            `);
            });
        }).fail(function(xhr, status, error) {
            let errorMessage = xhr.status + ': ' + xhr.statusText;
            alert("Có lỗi khi thực hiện!\nError: " + errorMessage);
        })
    }

    function edit_field(field_id) {

    }
</script>
    <script src="../public/js/script.js"></script>
</body>
</html>
