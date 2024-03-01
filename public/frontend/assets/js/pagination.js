 function pageClick1(pageNumber) {
        $("#page-number-1").text(pageNumber);
    }

    function pageClick2(pageNumber) {
        $("#page-number-2").text(pageNumber);
    }

    function pageClick3(pageNumber) {
        $("#page-number-3").text(pageNumber);
    }

    function pageClick4(pageNumber) {
        $("#page-number-4").text(pageNumber);
    }

    function pageClickAll(pageNumber) {
        $("#page-number-all").text(pageNumber);
    }

    function pageClick5(pageNumber) {
        $("#page-number-5").text(pageNumber);
    }

    $(document).ready(function () {
        var itemsCount = 300;
        var itemsOnPage = 10;

        var pagination1 = new Pagination({
            container: $("#pagination-1"),
            pageClickCallback: pageClick1
        });
        pagination1.make(itemsCount, itemsOnPage);

        var pagination2 = new Pagination({
            container: $("#pagination-2"),
            pageClickCallback: pageClick2,
            maxVisibleElements: 9,
            showInput: true,
            inputTitle: "Go to page"
        });
        pagination2.make(itemsCount, itemsOnPage);

        var pagination3 = new Pagination({
            container: $("#pagination-3"),
            pageClickCallback: pageClick3,
            maxVisibleElements: 9,
            showSlider: true
        });
        pagination3.make(itemsCount, itemsOnPage);

        var pagination4 = new Pagination({
            container: $("#pagination-4"),
            pageClickCallback: pageClick4,
            enhancedMode: true
        });
        pagination4.make(itemsCount, itemsOnPage);

        var paginationAll = new Pagination({
            container: $("#pagination-all"),
            pageClickCallback: pageClickAll,
            callPageClickCallbackOnInit: true,
            showInput: true,
            showSlider: true,
            enhancedMode: true,
            maxVisibleElements: 20,
            inputTitle: "Go to page"
        });
        paginationAll.make(itemsCount, itemsOnPage);

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        var pagination5 = new Pagination({
            container: $("#pagination-5"),
            pageClickUrl: "?page={{page}}",
            //pageClickUrl: function(num) { return "?page=" + num; },
            pageClickCallback: pageClick5,
            callPageClickCallbackOnInit: true,
            showInput: true,
            showSlider: true,
            enhancedMode: true,
            maxVisibleElements: 20,
            inputTitle: "Go to page"
        });
        pagination5.make(itemsCount, itemsOnPage, getParameterByName("page"));
    });