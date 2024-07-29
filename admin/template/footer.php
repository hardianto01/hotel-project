</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer card">
    <div class="copyright fw-bold">
        <?= $pengaturan['copyright']; ?>
    </div>

</footer><!-- End Footer -->

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Anda yakin ingin logout?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <a href="<?= $base_url; ?>logout.php" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- data tables -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<!-- plugins JS Files -->
<script src="<?= $base_url; ?>assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= $base_url; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url; ?>assets/plugins/chart.js/chart.umd.js"></script>
<script src="<?= $base_url; ?>assets/plugins/echarts/echarts.min.js"></script>
<script src="<?= $base_url; ?>assets/plugins/quill/quill.js"></script>
<script src="<?= $base_url; ?>assets/plugins/simple-datatables/simple-datatables.js"></script>
<script src="<?= $base_url; ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= $base_url; ?>assets/plugins/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= $base_url; ?>assets/js/main.js"></script>

<script>
    $('#form').parsley({
        errorClass: 'is-invalid text-red',
        successClass: 'is-valid',
        errorsWrapper: '<span class="invalid-feedback"></span>',
        errorTemplate: '<span></span>',
        trigger: 'change'
    });

    let pesanBerhasil = $('#pesan-berhasil').data('pesan')
    if (pesanBerhasil) {
        Swal.fire({
            title: "Good job!",
            text: pesanBerhasil,
            icon: "success"
        });
    }

    let pesanGagal = $('#pesan-gagal').data('pesan')
    if (pesanGagal) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: pesanGagal,
        });
    }

    $('#data-table').on('click', '.button-delete', function(e) {

        e.preventDefault()
        let href = $(this).attr('href')

        Swal.fire({
            title: "Anda yakin?",
            text: "Data akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href
            }
        });
    })



    $('#upload').on('change', function(event) {
        $('#preview').attr('src', URL.createObjectURL(event.target.files[0]))
    })

    new DataTable('#data-table');
</script>

</body>

</html>