$('.container img').replaceWith(function (i, v) {
    return $('<div/>', {
        style: 'background-image: url(' + this.src + ');' +
            'width:' + this.width + 'px;' +
            'height:' + this.height + 'px;',
        class: 'fakeImg'
    })
})

$(document).ready(function () {
    $("#content div:nth-child(1)").show();
    $(".abas li:first div").addClass("selected");
    $(".aba").click(function () {
        $(".aba").removeClass("selected");
        $(this).addClass("selected");
        var indice = $(this).parent().index();
        indice++;
        $("#content div").hide();
        $("#content div:nth-child(" + indice + ")").show();
    });

    $(".aba").hover(
        function () { $(this).addClass("ativa") },
        function () { $(this).removeClass("ativa") }
    );
});
