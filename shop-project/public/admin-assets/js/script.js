function cross() {
    $(".menu-button").click(function (e) {
        $(".menu-button").toggleClass("cross");
    });
}
cross();


$(".sidebarGroupLink").click(function (e) {
    $(this).find(".sidebarDropDown").slideToggle();
    $(this).find(".sidebarToggleAngle").toggleClass("angleRotate");
});


$(".menu-button").click(function (e) {
    $(".sidebar").toggleClass("sidebarCollapse");
    $(".sidebarWrapper").toggleClass("sidebarCollapse");
});


$(".underMenu").click(function (e) {
    $(".bodyHeader").slideToggle();
});


$(".notifWrapperClick").click(function (e) {
    // $(".notifWrapper").not(this).slideUp();
    $(this).find(".notifWrapper").slideToggle();
});


$(window).resize(function () {

    if ($(window).width() <= 768){
        $(".sidebar").addClass("sidebarCollapse");
        $(".sidebarWrapper").addClass("sidebarCollapse");
    }
    else{
        $(".sidebar").removeClass("sidebarCollapse");
        $(".sidebarWrapper").removeClass("sidebarCollapse");
    }

});

function sidebarHidden(){
    if ($(window).width() <= 768){
        $(".sidebar").addClass("sidebarCollapse");
        $(".sidebarWrapper").addClass("sidebarCollapse");
    }
}
sidebarHidden();


imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
        $(".imagePreview").slideDown();
        $(".imageSelectWrapper").css({
            "border-bottom-left-radius" : "0",
            "border-bottom-right-radius" : "0"
        })
    }
}



$(".dropdown2").click(function () {
    // $(this).find(".dropdown-menu").slideToggle();
    alert("test");
});



$(".dropdown-toggle").on("onclick" , function (){
    alert("1");
});

function test(){
    $(this).find(".dropdown-menu").slideToggle();
    alert("test");
}
