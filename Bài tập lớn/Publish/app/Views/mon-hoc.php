        <div class="content">
            <div class="content-header">
                <h1 class="title">
                    Môn học
                </h1>
                <div class="form-control">
                    <div class="form-group">
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-type="search" data-name="NganhHoc"></div>
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
                    <button class="btn btn-rounded-corner btn-primary btn-inactive" id="btn-edit">
                        Sửa
                    </button>
                </div>
                <form class="">
                    <div class="form-group-inline">
                        <label>Ngành học</label>
                        <div class="select-box">
                            <div class="selected-value" data-id="" data-type="input" data-name="NganhHoc"></div>
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
                var i_MaMon = $("input[name='MaMon']");
                var i_TenMon = $("input[name='TenMon']");
                var i_NganhHoc = $('.selected-value[data-type="input"][data-name="NganhHoc"]');

                $('#btn-add').click(function() {
                    let MaMon = i_MaMon.val();
                    let TenMon = i_TenMon.val();
                    $.ajax({
                        url: 'mon-hoc/add_subject',
                        type: 'POST',
                        data: {
                            data: {
                                maNganh: i_NganhHoc.attr('data-id'),
                                maMon: MaMon,
                                tenMon: TenMon
                            }
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

            $('#btn-edit').click(function() {
                let MaMon = i_MaMon.val();
                let TenMon = i_TenMon.val();
                $.ajax({
                    url: 'mon-hoc/add_subject',
                    type: 'POST',
                    data: {
                        data: {
                            maNganh: i_NganhHoc.attr('data-id'),
                            maMon: MaMon,
                            tenMon: TenMon
                        }
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

            function filter(id, data_name) {
                $.ajax({
                    url: 'mon-hoc/load_subjects',
                    type: 'POST',
                    data: {
                        data: {
                            maNganh: id
                        }
                    }
                }).done(function(response) {
                    // Xóa hết dl trừ cột tiêu đề
                    $('.data-row:not(:first-child)').remove();
                    sessionStorage.setItem("responseData", response);
                    for (data of JSON.parse(response)) {
                        $('.data-table>tbody').append(`
            <tr class="data-row">
                <td data-field-name="MaMon">${data.MaMon}</td>
                <td data-field-name="TenMon">${data.TenMon}</td>
                <td class="row-edit">
                    <button class="btn btn-rounded btn-edit">
                    </button>
                    <button class="btn btn-rounded btn-delete">
                    </button>
                </td>
            </tr>`);
                    };
                }).fail(function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert("Có lỗi khi thực hiện!\nError: " + errorMessage);
                })
            }

            function edit_field(row) {
                let data = JSON.parse(sessionStorage.responseData);
                let MaMon = row.find('[data-field-name="MaMon"]').text();
                let TenMon = row.find('[data-field-name="TenMon"]').text();
                let search_val = $('.selected-value[data-type="search"][data-name="NganhHoc"]');

                i_NganhHoc.attr('data-id', search_val.attr('data-id'));
                i_NganhHoc.text(search_val.text());
                i_MaMon.val(MaMon);
                i_TenMon.val(TenMon);
            }

            function delete_field(row) {
                let MaMon = row.find('[data-field-name="MaMon"]').text();
                let TenMon = row.find('[data-field-name="TenMon"]').text();
                $.ajax({
                    url: 'mon-hoc/delete_subject',
                    type: 'POST',
                    data: {
                        data: {
                            maNganh: id
                        }
                    }
                }).done(function(response) {
                    // Xóa hết dl trừ cột tiêu đề
                    $('.data-row:not(:first-child)').remove();
                    sessionStorage.setItem("responseData", response);
                    for (data of JSON.parse(response)) {
                        $('.data-table>tbody').append(`
            <tr class="data-row">
                <td data-field-name="MaMon">${data.MaMon}</td>
                <td data-field-name="TenMon">${data.TenMon}</td>
                <td class="row-edit">
                    <button class="btn btn-rounded btn-edit">
                    </button>
                    <button class="btn btn-rounded btn-delete">
                    </button>
                </td>
            </tr>`);
                    };
                }).fail(function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert("Có lỗi khi thực hiện!\nError: " + errorMessage);
                })
            }
        </script>
        <script src="../public/js/script.js"></script>
        </body>

        </html>