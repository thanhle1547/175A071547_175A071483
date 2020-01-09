<div class="content">
            <div class="content-header">
                <h1 class="title">
                    Giảng Viên
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
                    <td>MaGV</td>
                    <td>HoTen</td>
                    <td>GioiTinh</td>
                    <td>SDT</td>
                    <td>MaNghanh</td>
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
                        <label for="MaGiangVien">Mã Giảng Viên</label>
                        <input type="text" name="MaGiangVien" required>
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
                        <input type="text" name="SDT" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.btn-add').click(function() {
            let MaGiangVien = $("input[name='MaGiangVien']").val();
            let HoTen = $("input[name='HoTen']").val();
            let GioiTinh = $("input[name='GioiTinh']").val();
            let SDT = $("input[name='SDT']").val();
            $.ajax({
                url: 'subjects/add_subject',
                type: 'POST',
                data: {
                    maNganh: $('.selected-value[data-name="NganhHoc"]').attr('data-id'),
                    maGiangVien: MaGiangVien, 
                    hoTen: HoTen,
                    gioiTinh: GioiTinh,
                    sdt: SDT
                }
            }).done(function() {
                $('.btn-back').click();
                $('.data-table').append(`
                <tr class="data-row" data-field-id="${MaMon}">
                    <td>${MaGiangVien}</td>
                    <td>${HoTen}</td>
                    <td>${GioiTinh}</td>
                    <td>${SDT}</td>
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