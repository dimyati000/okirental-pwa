$(document).ready(function() {
    fetchData()
});

$('#search').on('keypress', function(e) {
    if (e.which == 13) {
        pageLoad(1);
    }
});

function updateUrlParam(key, value) {
    const url = new URL(window.location);
    url.searchParams.set(key, value);
    window.history.pushState({}, '', url);
}

function pageLoad(i) {
    var limit = $('#limit').val();
    var q = $('#search').val();
    updateUrlParam('page', i);
    updateUrlParam('count', limit);
    updateUrlParam('q', q);
    fetchData();
}

function handleSort(sortBy){
    const params = new URLSearchParams(window.location.search);
    let q = params.get('q') || '';
    let page = params.get('page') || 1;
    let count = params.get('count') || 10;
    let sortType = params.get('sortType') || 'desc';
    
    if(sortType=="asc"){
        sortType = 'desc';
    }else if(sortType=="desc"){
        sortType = 'asc';
    }else{
        sortType = 'asc';
    }

    updateUrlParam('page', page);
    updateUrlParam('count', count);
    updateUrlParam('q', q);
    updateUrlParam('sortBy', sortBy);
    updateUrlParam('sortType', sortType);
    fetchData()
}

function fetchData() {
    const params = new URLSearchParams(window.location.search);
    let q = params.get('q') || '';
    let page = params.get('page') || 1;
    let count = params.get('count') || 10;
    let sortBy = params.get('sortBy');
    let sortType = params.get('sortType');
    $.ajax({
        url: baseUrl + "/Pelanggan/fetchData",
        type: 'get',
        dataType: 'html',
        data: {
            page: page,
            q: q,
            count: count,
            sortBy: sortBy,
            sortType:sortType,
        },
        beforeSend: function() {},
        success: function(result) {
            $('#list').html(result);
            // sort_finish(id_th,sort);
        }
    });
}

$("#btn-add").click(function() {
    console.log("tambah data");
//     $.ajax({
//         url: "<?php echo site_url('kegiatan/load-modal') ?>",
//         type: 'post',
//         dataType: 'html',
//         beforeSend: function() {},
//         success: function(result) {
//             $('#div_modal').html(result);
//             $('#modal_title_add').show();
//             $('#modeform').val('ADD');
//             $('#form-modal').modal('show');
//         }
//     });
});

var currentPage = $('#current').val();
function sort_table(id,column){
    var sort = $(id).attr("data-sort");
    $('#input_id_th').val(id);
    $('#input_column').val(column);
    
    if(sort=="asc"){
        sort = 'desc';
    }else if(sort=="desc"){
        sort = 'asc';
    }else{
        sort = 'asc';
    }
    $('#input_sort').val(sort);
    pageLoad(currentPage);
}

$(".btn-ubah").click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        url: '<?= site_url() ?>'+'/kegiatan/load-modal',
        type: 'post',
        dataType: 'html',
        data:{id:id},
        beforeSend: function () {},
        success: function (result) {    
            $('#div_modal').html(result);
            $('#modal_title_update').show();
            $('#modeform').val('UPDATE');
            $('#form-modal').modal('show');
        }
    });
});

$('.btn-hapus').click(function (e) {
    var id = $(this).attr('data-id');
    var title = $(this).attr('data-name');

    Swal.fire({
        title: 'Hapus Kegiatan',
        text: "Apakah Anda yakin menghapus kegiatan : "+title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve) {
                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    url: '<?= site_url() ?>'+'/kegiatan/delete',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data.success === true) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            swal.hideLoading()
                            pageLoad(currentPage);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message
                            });
                        }
                    },
                    fail: function (e) {
                        alert(e);
                    }
                });
            });
        },
        allowOutsideClick: false
    });
    e.preventDefault();
});