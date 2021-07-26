/* eslint-disable no-undef */
var table = $("#datas").DataTable({ scrollX: true });

table.clear().draw();

$.ajax({
  url: "index.php",
  type: "post",
  dataType: "json",
  data: { getdata: "https://od-do.agr.gc.ca/canadianCheeseDirectory.json" },
  success: function (response) {
    console.log(response);

    $.each(response.CheeseDirectory, function (index, value) {
      var organic = "Yes";
      if (value.Organic == 0) organic = "No";

      var name = value.CheeseNameEn;

      if (default_lang == "fr") {
        if (value.CheeseNameFr !== "") {
          name = value.CheeseNameFr;
        }
      }

      if (default_lang == "en") {
        table.row.add([
          value.CheeseId,
          name,
          value.ManufacturerNameEn,
          value.ManufacturerProvCode,
          value.ManufacturingTypeEn,
          value.FatContentPercent,
          value.MoisturePercent,
          value.FlavourEn,
          value.CharacteristicsEn,
          value.RindTypeEn,
          organic,
          value.CategoryTypeEn,
          value.MilkTypeEn,
          value.MilkTreatmentTypeEn,
          value.RindTypeEn,
          value.LastUpdateDate,
          '<a href="' +
            value.WebSiteEn +
            '" target="_blank">' +
            value.WebSiteEn +
            "</a>",
        ]);
      } else {
        table.row.add([
          value.CheeseId,
          name,
          value.ManufacturerNameFr,
          value.ManufacturerProvCode,
          value.ManufacturingTypeFr,
          value.FatContentPercent,
          value.MoisturePercent,
          value.FlavourFr,
          value.CharacteristicsFr,
          value.RindTypeFr,
          organic,
          value.CategoryTypeFr,
          value.MilkTypeFr,
          value.MilkTreatmentTypeFr,
          value.RindTypeFr,
          value.LastUpdateDate,
          '<a href="' +
            value.WebSiteFr +
            '" target="_blank">' +
            value.WebSiteFr +
            "</a>",
        ]);
      }
    });
    table.draw(false);
  },
  error: function (jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
  },
});
