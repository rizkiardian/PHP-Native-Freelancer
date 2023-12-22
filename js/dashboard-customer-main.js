// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

// Modal
    // Fungsi untuk menampilkan form upload foto
    function showUploadForm(id_menawar) {
    // Tampilkan form upload foto
    document.getElementById('uploadForm').style.display = 'block';

    // Simpan ID Menawar untuk digunakan saat pengiriman form
    document.getElementById('fileInput').setAttribute('data-id-menawar', id_menawar);
    }

    // Fungsi untuk menyembunyikan form upload foto
    function hideUploadForm() {
    // Sembunyikan form upload foto
    document.getElementById('uploadForm').style.display = 'none';
    }

    // Fungsi untuk mengirimkan form upload foto
    function uploadFoto() {
    // Mendapatkan ID Menawar yang disimpan pada elemen file input
    var idMenawar = document.getElementById('fileInput').getAttribute('data-id-menawar');

    // Mendapatkan file yang dipilih
    var fileInput = document.getElementById('fileInput');
    var selectedFile = fileInput.files[0];

    // Lakukan pengiriman data ke server menggunakan AJAX atau metode yang sesuai
    // ...

    // Setelah pengiriman selesai, sembunyikan form upload
    hideUploadForm();
    }
