$(document).ready(function () {
  $('.lead_table tr').click(function () {
    window.location.href = "/leads/" + $(this).data('id');
  });
  $('.content_table tr').click(function () {
    window.location.href = "/contents/" + $(this).data('id');
  });
});
