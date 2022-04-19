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






$("#file-upload").change(function (e){
    var fileName = e.target.files[0].name;
    $(".imagePreview>center>h5").append(fileName);
    $(".imagePreview").slideDown();
    $(".imageSelectWrapper").css({
        "border-bottom-left-radius" : "0",
        "border-bottom-right-radius" : "0"
    });
});






$(".dropdown2").click(function () {
    // $(this).find(".dropdown-menu").slideToggle();
    alert("test");
});



$(".dropdown-toggle").click(function (){
    $(this).parent().find(".dropdown-menu").slideToggle();
});

function test(){
    $(this).find(".dropdown-menu").slideToggle();
    alert("test");
}



// reactive element
// const reactiveElement = document.querySelector('.Reactive-element');
// reactiveElement.addEventListener('mousemove', (e) => {
//     let rect = e.target.getBoundingClientRect();
//     let x = e.clientX - rect.left;
//     let y = e.clientY - rect.top;
//     let roateIndex = 2;
//     const halfWidth = rect.width / 2;
//     const halfHeight = rect.height / 2;
//     if (x < halfWidth) {
//         if (y < halfHeight) {
//             reactiveElement.style.transform = `perspective(200px) rotateX(${roateIndex}deg) rotateY(-${roateIndex}deg)`;
//         } else if (y > halfHeight) {
//             reactiveElement.style.transform = `perspective(200px) rotateX(-${roateIndex}deg) rotateY(-${roateIndex}deg)`;
//         }
//     } else {
//         if (y < halfHeight) {
//             reactiveElement.style.transform = `perspective(200px) rotateX(${roateIndex}deg) rotateY(${roateIndex}deg)`;
//         } else if (y > halfHeight) {
//             reactiveElement.style.transform = `perspective(200px) rotateX(-${roateIndex}deg) rotateY(${roateIndex}deg)`;
//         }
//     }
//
// });
// reactiveElement.addEventListener('mouseout', () => {
//     reactiveElement.style.transform = `perspective(200px) rotateX(0deg) rotateY(0deg)`;
// })
// $(".Reactive-element").mouseover(function(e){
//     let rect = e.target.getBoundingClientRect();
//     let x = e.clientX - rect.left;
//     let y = e.clientY - rect.top;
//     let roateIndex = 3;
//     const halfWidth = rect.width / 2;
//     const halfHeight = rect.height / 2;
//     if (x < halfWidth) {
//         if (y < halfHeight) {
//             // $(this).style.transform = `perspective(200px) rotateX(${roateIndex}deg) rotateY(-${roateIndex}deg)`;
//             $(this).css( "transform", 'perspective(200px) rotateX(2deg) rotateY(-2deg)' );
//         } else if (y > halfHeight) {
//             $(this).css( "transform", 'perspective(200px) rotateX(-2deg) rotateY(-2deg)' );
//         }
//     } else {
//         if (y < halfHeight) {
//             $(this).css( "transform", 'perspective(200px) rotateX(2deg) rotateY(2deg)' );
//         } else if (y > halfHeight) {
//             $(this).css( "transform", 'perspective(200px) rotateX(-2deg) rotateY(2deg)' );
//         }
//     }
// });
//
// $(".Reactive-element").mouseout(function(){
//     $(this).css("transform", `perspective(200px) rotateX(0deg) rotateY(0deg)`);
// });

$("#imgInp").change(function (){
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
        $(".imagePreview").slideDown();
        $(".imageSelectWrapper").css({
            "border-bottom-left-radius" : "0",
            "border-bottom-right-radius" : "0"
        })
    }
});


$("#imgInp1").change(function (){
    const [file] = imgInp1.files
    if (file) {
        blah1.src = URL.createObjectURL(file)
        $(".imagePreview").slideDown();
        $(".imageSelectWrapper").css({
            "border-bottom-left-radius" : "0",
            "border-bottom-right-radius" : "0"
        })
    }
});

