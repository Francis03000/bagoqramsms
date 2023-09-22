<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/js/fullcalendar.min.js"></script>
<script src="assets/js/jquery.fullcalendar.js"></script>

<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/chart-data.js"></script>

<script src="assets/js/app.js"></script>
<script>
    $.get({
        url: "../controllers/customize/customizeCrud.php",
        data: { getData: "getData" },
        success: function (data) {
            let newData = JSON.parse(data);
            newData.forEach((custom, i) => {
                $("#body_color").css("background-color", custom.main_color);
                $("#header_color").css("background-color", custom.main_color);


            });
        },
    });
</script>
</body>

</html>