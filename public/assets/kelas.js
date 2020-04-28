const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire(
        'Data Kelas',
        flashData,
        'success'
    ).then(function() {
        location.reload();
    });
    $(".swal2-modal").css('background-color', '#252733');
    $(".swal2-success-circular-line-left").css('background-color', '#252733');
    $(".swal2-success-circular-line-right").css('background-color', '#252733');
    $(".swal2-success-fix").css('background-color', '#252733');
    $(".swal2-title").css('color', '#fff');
    $(".swal2-content").css('color', '#fff');
}

$('.tombol-hapus').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');


    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Data Kelas akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        } else {
            Swal.fire(
                'Data Kelas',
                'Data gagal dihapus',
                'error'
            ).then(function() {
                location.reload();
            });
            $(".swal2-modal").css('background-color', '#252733');
            $(".swal2-success-circular-line-left").css('background-color', '#252733');
            $(".swal2-success-circular-line-right").css('background-color', '#252733');
            $(".swal2-success-fix").css('background-color', '#252733');
            $(".swal2-title").css('color', '#fff');
            $(".swal2-content").css('color', '#fff');
        }
    })
    $(".swal2-modal").css('background-color', '#252733');
    $(".swal2-success-circular-line-left").css('background-color', '#252733');
    $(".swal2-success-circular-line-right").css('background-color', '#252733');
    $(".swal2-success-fix").css('background-color', '#252733');
    $(".swal2-title").css('color', '#fff');
    $(".swal2-content").css('color', '#fff');
})