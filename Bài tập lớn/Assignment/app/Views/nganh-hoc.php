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
    $(document).ready(function() {
        $('.btn-add').click(function() {
            let MaNganh = $("input[name='MaNganh']").val();
            let TenNganh = $("input[name='TenNganh']").val();
            let ChiTiet = $("input[name='ChiTiet']").val();
            $.ajax({
                url: 'subjects/add_subject',
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
                    <td>${MaNganh}</td>
                    <td>${TenNganh}</td>
                    <td>${ChiTiet}</td>
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
                data: {
                    maNganh: id
                }
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