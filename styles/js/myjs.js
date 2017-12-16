$("#deleteModal").on("show.bs.modal", function(event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var Id = button.data("staff-id"); // Extract info from data-* attributes
  var name = button.data("staff-name");
  sessionStorage.setItem("IdStaff", Id);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find(".modal-body").text("Bạn có chắc là muốn xóa nhân viên " + name);
});

$("#delete-staff-btn").click(function() {
  console.log("CALL DELETE");
  $("#deleteModal").modal("hide");
  var Id = sessionStorage.getItem("IdStaff");
  $.ajax({
    type: "POST",
    url: 'delete-staff.php',
    data: { 'StaffId': Id }
  }).done(function(msg) {
    var idRowStaffDeleted = "#rowStaff" + Id;
    $(idRowStaffDeleted).remove();
  });
});
