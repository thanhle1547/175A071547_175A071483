<div class="content">
    <div class="content-header">
        <h1 class="title">
            Ngành học
        </h1>
        <div class="form-control">
            <div class="form-group form-action">
                <button class="btn btn-outline-primary btn-rounded btn-plus">Thêm</button>
            </div>
        </div>
    </div>

    </button>
    <table class="data-table">
        <tr>
            <td>STT</td>
            <td>Mã ngành </td>
            <td>Tên ngành </td>
            <td>Chi Tiết</td>
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
                <label for="MaNganh">Mã Ngành</label>
                <input type="text" name="MaNganh" required>
            </div>
            <div class="form-group form-group-inline">
                <label for="TenNganh">Tên Ngành</label>
                <input type="text" name="TenNganh" required>
            </div>
            <div class="form-group form-group-inline">
                <label for="ChiTiet">Chi Tiết</label>
                <input type="text" name="ChiTiet" required>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    var i_MaNganh;
    var i_TenNganh;
    var i_ChiTiet;
    var MaNganh_Cu;
    $(document).ready(function() {
        i_MaNganh = $("input[name='MaNganh']");
        i_TenNganh = $("input[name='TenNganh']");
        i_ChiTiet = $("input[name='ChiTiet']");

        $('.btn-add').click(function() {
            let MaNganh = i_MaNganh.val();
            let TenNganh = i_TenNganh.val();
            let ChiTiet = i_ChiTiet.val();
            $.ajax({
                url: 'nganh-hoc/add_major',
                type: 'POST',
                data: {
                    maNganh: MaNganh,
                    tenNganh: TenNganh,
                    chiTiet: ChiTiet
                }
            }).done(function() {
                $('.btn-back').click();
                $('.data-table').append(`
                <tr class="data-row" data-field-id="${MaNganh}">
                    <td data-field-name="MaNganh">${MaNganh}</td>
                    <td data-field-name="TenNganh">${TenNganh}</td>
                    <td data-field-name="ChiTiet">${ChiTiet}</td>
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

        $('#btn-edit').click(function() {
            let MaNganh = i_MaNganh.val();
            let TenNganh = i_TenNganh.val();
            let ChiTiet = i_ChiTiet.val();
            let row = $(this).closest('.data-row');

            $.ajax({
                url: 'mon-hoc/edit_subject',
                type: 'POST',
                data: {
                    maNganh: MaNganh,
                    tenNganh: TenNganh,
                    chiTiet: ChiTiet,
                    maMon: MaMon,
                    maNganhCu: MaNganh_Cu.attr('data-field-id')
                }
            }).done(function() {
                // Xóa cái đã sửa
                row.remove();
                $('.btn-back').click();
                /* $('.data-table').append(`
                <tr class="data-row" data-field-id="${MaNganh}">
                    <td data-field-name="MaNganh">${MaNganh}</td>
                    <td data-field-name="TenNganh">${TenNganh}</td>
                    <td data-field-name="ChiTiet">${ChiTiet}</td>
                    <td class="row-edit">
                        <button class="btn btn-rounded btn-edit">
                        </button>
                        <button class="btn btn-rounded btn-delete">
                        </button>
                    </td>
                </tr>
                `); */
                // Tự động cuộn tới cái vừa sửa
                $('html,body').animate({
                    scrollTop: $(`[data-field-id="${MaMon}"]`).offset().top
                }, 'slow');
                // Highlight cái vừa chèn
                $(`[data-field-id="${MaMon}"]`).addClass("highlight");
                setTimeout(function() {
                    $(`[data-field-id="${MaMon}"]`).removeClass('highlight');
                }, 1800);
                // Xóa dl đã nhập
                i_MaMon.val('');
                i_TenMon.val('');
            }).fail(function(xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
                alert("Có lỗi khi thực hiện!\nError: " + errorMessage);
            })
        });
    });

    function edit_field(row) {
        MaNganhCu = row.find('[data-field-name="MaNganh"]');

        i_NganhHoc.text(MaNganh_Cu.text());
        i_TenNganh.val(row.find('[data-field-name="TenNganh"]').text());
        i_ChiTiet.val(row.find('[data-field-name="ChiTiet"]').text());
    }
</script>
<script src="../public/js/script.js"></script>
</body>

</html>