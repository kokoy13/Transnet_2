function konfirmasiSubmit(event) {

    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data?");
    if (!konfirmasi) {
        // Menghentikan aksi formulir jika pengguna memilih "no"
        event.preventDefault();
        alert("Data gagal Dihapus");
    }
}