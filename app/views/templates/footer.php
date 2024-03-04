<!-- Modal Pesan -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Pesan</h3>
            </div>
            <div class="modal-body">
                <?php if (isset($_SESSION['pesan'])) echo $_SESSION['pesan']; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="modal fade" id="modalLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="modalLogoutLabel">Logout</h3>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin logout dari akun ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <a href="<?= BASEURL ?>/auth/logout" class="btn btn-primary">Logout</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <footer class="pt-4 my-md-4 pt-md-3 border-top">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; <span id="currentYear"></span> - <a class="text-info" target="_blank" href="https://www.linkedin.com/in/ade-kurniawan-c/">Ade Kurniawan</a></p>
            </div>
        </div>
    </footer>
</div>
</body>

<script>
    var currentYear = new Date().getFullYear();
    document.getElementById("currentYear").textContent = currentYear;
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['pesan'])) : ?>
            $('#pesanModal').modal('show');
            <?php unset($_SESSION['pesan']); ?>
        <?php endif; ?>
    });

    $(document).ready(function() {
        $('#example').DataTable({
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "emptyTable": "Tidak ada data",
                "zeroRecords": "Data yang dicari tidak ditemukan",
            },
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ["5", "10", "25", "50", "Semua"]
            ],

            language: {
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            },
        });
    });
</script>


</html>