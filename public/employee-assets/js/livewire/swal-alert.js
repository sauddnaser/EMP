Livewire.on('swal-show-alert', swalString => {
    const swal = JSON.parse(swalString); // تحويل السلسلة النصية إلى كائن
    Swal.fire(swal);  // تمرير الكائن إلى SweetAlert
});
