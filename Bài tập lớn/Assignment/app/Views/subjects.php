        <div class="content">
            <div class="content-header">
                <h1 class="title">
                    Môn học
                </h1>
                <div class="form-control">
                    <div class="form-group">
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-name="NganhHoc"></div>
                            <div class="values-list">
                                <div class="values-container">
                                    <?php
                                    foreach ($majors as $major)
                                        echo "<div class='val' data-id='$major->MaNganh'>
                                            <span>$major->TenNganh</span>
                                        </div>"
                                    ?>
                                </div>
                            </div>
                        </div>
                        <label>Ngành học</label>
                    </div>
                    <div class="form-group form-action">
                        <button class="btn btn-outline-primary btn-rounded btn-plus">Thêm</button>
                    </div>
                </div>
            </div>
            </button>
            <table class="data-table">
                <tr class="data-row">
                    <td>Mã Môn</td>
                    <td>Tên Môn</td>
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
                                        </div>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="MaMon">Mã môn</label>
                        <input type="text" name="MaMon" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="TenMon">Tên môn</label>
                        <input type="text" name="TenMon" required>
                    </div>
                </form>
            </div>
        </div>
        </div>
<script>
    $(document).ready(function() {
        $('.btn-add').click(function() {
            let MaMon = $("input[name='MaMon']").val();
            let TenMon = $("input[name='TenMon']").val();
            $.ajax({
                url: 'subjects/add_subject',
                type: 'POST',
                data: {
                    maNganh: $('.selected-value').attr('data-id'),
                    maMon: MaMon,
                    tenMon: TenMon
                }
            }).done(function() {
                $('.btn-back').click();
                $('.data-table').append(`
                <tr class="data-row" data-field-id="${MaMon}">
                    <td>${MaMon}</td>
                    <td>${TenMon}</td>
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