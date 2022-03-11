<script type="text/javascript">
    $(document).ready(function() {
        var cooldown = 100;
        var isOffCooldown = true;

        var defaultResults = $(".filter-noresults");
        var filterResults = $(".filter-hasresults");

        function render() {
            var category = $("#category").val();
            var year = $("#year").val();

            filterResults.find("[year]").hide();

            var filterString = '';

            if (year) {
                filterString += "[year='" + year + "']";
            }

            if (category) {
                filterString += "[category='" + category + "']";
            }

            if (filterString) {
                var results = filterResults.find(filterString);

                if (results.length) {
                    results.show();
                    defaultResults.hide();
                } else {

                }
            } else {
                defaultResults.show();
            }
        }

        $("#ddYear").on('OnChanged', function() {
            if (isOffCooldown) {
                isOffCooldown = false;
                setTimeout(function() {
                    isOffCooldown = true;
                }, cooldown);
                render();
            }
        });
        $("#ddCategory").on('OnChanged', function() {
            if (isOffCooldown) {
                isOffCooldown = false;
                setTimeout(function() {
                    isOffCooldown = true;
                }, cooldown);
                render();
            }
        });

        render();
    });
</script>