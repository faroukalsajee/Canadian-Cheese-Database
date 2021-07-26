/* eslint-disable no-undef */
var table = $("#datas").DataTable({ scrollX: true });

table.clear().draw();

$.ajax({
  url: "script.php",
  type: "post",
  dataType: "json",
  data: { getdata: "https://od-do.agr.gc.ca/canadianCheeseDirectory.json" },
  success: function (response) {
    console.log(response);
  },
});
