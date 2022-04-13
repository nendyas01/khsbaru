//sweetalert 2 
var flash = $('#flash').data('flash');
if (flash) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: flash,
    })
}

var flash2 = $('#flash2').data('flash');
if (flash2) {
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: flash2,
    })
}


//sweetalert2 tombol hapus

$(document).on('click', '#hapusarea', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Area",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href;
        }
    })
})

