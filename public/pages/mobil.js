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

function handleRefresh(){
    var limit = $('#limit').val();
    var q = $('#search').val();
    updateUrlParam('page', 1);
    updateUrlParam('count', limit);
    updateUrlParam('q', '');
    updateUrlParam('sortBy', 'created_at');
    updateUrlParam('sortType', 'desc');
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
        url: baseUrl + "/Mobil/fetchData",
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
        }
    });
}

$("#btn-add").click(function() {
    $.ajax({
        url: baseUrl + "/Mobil/loadModal",
        type: 'post',
        dataType: 'html',
        beforeSend: function() {},
        success: function(result) {
            $('#div_modal').html(result);
            $('#modal_title_add').show();
            $('#modeform').val('ADD');
            $('#form-modal').modal('show');
        }
    });
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

$(document).on('click', '.btn-edit', function(event) {
    var id = $(this).attr('data-id');
    $.ajax({
        url: baseUrl + '/Mobil/loadModal',
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

$(document).on('click', '.btn-delete', function(e) {
    var id = $(this).attr('data-id');
    var title = $(this).attr('data-name');

    Swal.fire({
        title: 'Hapus Mobil',
        text: "Apakah Anda yakin menghapus mobil : "+title,
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
                    url: baseUrl + '/Mobil/delete',
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
                            pageLoad(1);
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

$(document).on('submit', '#form', function(event) {
    event.preventDefault();
    $.ajax({
        url: baseUrl + '/Mobil/save',
        method: 'POST',
        dataType: 'json',	
        data: new FormData($('#form')[0]),
        async: true,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.success == true) {
                Toast.fire({
                    icon: 'success',
                    title: data.message
                });
                $('#form-modal').modal('hide');
                swal.hideLoading()
                pageLoad(1);
            } else {
                Swal.fire({icon: 'error',title: 'Oops...',text: data.message});
            }
        },
        fail: function (event) {
            alert(event);
        }
    });
});