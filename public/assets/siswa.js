function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }


        reader.readAsDataURL(input.files[0]);
    }
}

$("#chooseFile").change(function() {
    readURL(this);
});

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire(
        'Data Siswa',
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
        text: "Data Siswa akan dihapus",
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
                'Data Siswa',
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