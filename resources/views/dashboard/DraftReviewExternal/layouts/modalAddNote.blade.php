<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="staticBackdropLabel">Tambah Catatan Reviu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/dashboard/tambah_catatan/{{ $regulation->id }}">
                @csrf
                <div class="modal-body text-start">
                    <label for="pesan_catatan" class="form-label">Pesan Catatan</label>
                    <input type="text" class="form-control" id="pesan_catatan" name="pesan_catatan" required
                        placeholder="Masukkan pesan catatan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Note</button>
                </div>
            </form>
        </div>
    </div>
</div>
