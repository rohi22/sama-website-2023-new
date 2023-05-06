// -------------------------------------------------- Text Slider
function scrollFunction(x, y) {
    // document.querySelector(".control-left-ts").nextElementSibling.scrollBy(x, y); 
    // document.querySelector(".control-right-ts").previousElementSibling.scrollBy(x, y);
    // this.nextElementSibling.scrollBy(x, y); 
    // this.previousElementSibling.scrollBy(x, y);
}
$('.control-left-ts').click(function () {
    this.nextElementSibling.scrollBy(-100, 0);
});
$('.control-right-ts').click(function () {
    this.previousElementSibling.scrollBy(100, 0);
});

// -------------------------------------------------- Text Slider




function goToHome() {
    $('.lb-inner').hide(400);
    $('.lb-home').show(500);
}

function goToMachine() {
    $('.lb-inner').hide(400);
    $('.lb-machine').show(400);
}

function goToProcessLine() {
    $('.lb-inner').hide(400);
    $('.lb-processing-line').show(400);
}

function goToBakeryApp() {
    $('.lb-inner').hide(400);
    $('.lb-bakery-app').show(400);
}

function goToPharmaLine() {
    $('.lb-inner').hide(400);
    $('.lb-pharma-line').show(400);
}


// goToHome();










// --------------------------------------------------- Mobo Menu
var mobo = 0;
$(".mobo-menu .btn-box").click(function () {

    if (mobo == 0) {
        $(".menu-content").fadeIn();
        $(".dots").addClass("selected");
        mobo = 1;

    } else if (mobo == 1) {
        $(".menu-content").fadeOut();
        $(".dots").removeClass("selected");
        mobo = 0;
    }

})
$(document).ready(function () {
    // alert();
    $(".menu-content").css('display', 'none');
})
// --------------------------------------------------- Mobo Menu








// ------------------------------------- Top For Tabs


function vertFlowPack() {
    $(".changer-box").hide(400);
    $(".vertFlowPack").show(400);
    $(".tab-sections").removeClass("active");
    $(".vertFlowPack").addClass("active");
}

function horiFlowPack() {
    $(".changer-box").hide(400);
    $(".horiFlowPack").show(400);
    $(".tab-sections").removeClass("active");
    $(".horiFlowPack").addClass("active");
}


function dosiDevi() {
    $(".changer-box").hide(400);
    $(".dosiDevi").show(400);
    $(".tab-sections").removeClass("active");
    $(".dosiDevi").addClass("active");
}

function casePack() {
    $(".changer-box").hide(400);
    $(".casePack").show(400);
    $(".tab-sections").removeClass("active");
    $(".casePack").addClass("active");
}
// ------------------------------------- Top For Tabs


function showls() {
    $(".dc-inner").hide(400);
    $(".liquid-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#liquidSeries").addClass("active");
}

function showhs() {
    $(".dc-inner").hide(400);
    $(".h-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#hSeries").addClass("active");
}

function showtps() {
    $(".dc-inner").hide(400);
    $(".twin-pack-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#twinPackSeries").addClass("active");
}

function showss() {
    $(".dc-inner").hide(400);
    $(".sus-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#susSeries").addClass("active");
}

function showcss() {
    $(".dc-inner").hide(400);
    $(".clip-seal-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#clipSealSeries").addClass("active");
}

function showis() {
    $(".dc-inner").hide(400);
    $(".industrial-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#industrialSeries").addClass("active");
}

function showTPs() {
    $(".dc-inner").hide(400);
    $(".TP-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#tpSeries").addClass("active");
}

function showmrs() {
    $(".dc-inner").hide(400);
    $(".mr-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#mrSeries").addClass("active");
}

function showapls() {
    $(".dc-inner").hide(400);
    $(".apl-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#aplSeries").addClass("active");
}

function showbis() {
    $(".dc-inner").hide(400);
    $(".bag-in-series").show(400);
    $(".seriesLinks").removeClass("active");
    $("#bagInSeries").addClass("active");
}





// ------------------------------------- Top Five Tabs


function showChangerBox1() {
    $(".changer-box").hide(400);
    $(".changer-box-1").show(400);
    $(".tab-sections").removeClass("active");
    $(".tab-section-1").addClass("active");
}

function showChangerBox2() {
    $(".changer-box").hide(400);
    $(".changer-box-2").show(400);
    $(".tab-sections").removeClass("active");
    $(".tab-section-2").addClass("active");
}

function showChangerBox3() {
    $(".changer-box").hide(400);
    $(".changer-box-3").show(400);
    $(".tab-sections").removeClass("active");
    $(".tab-section-3").addClass("active");
}

function showChangerBox4() {
    $(".changer-box").hide(400);
    $(".changer-box-4").show(400);
    $(".tab-sections").removeClass("active");
    $(".tab-section-4").addClass("active");
}

function showChangerBox5() {
    $(".changer-box").hide(400);
    $(".changer-box-5").show(400);
    $(".tab-sections").removeClass("active");
    $(".tab-section-5").addClass("active");
}

// ------------------------------------- Top Five Tabs


function subCont1() {
    $(".dc-inner").hide(400);
    $(".subCont1").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont1").addClass("active");
}

function subCont2() {
    $(".dc-inner").hide(400);
    $(".subCont2").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont2").addClass("active");
}

function subCont3() {
    $(".dc-inner").hide(400);
    $(".subCont3").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont3").addClass("active");
}

function subCont4() {
    $(".dc-inner").hide(400);
    $(".subCont4").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont4").addClass("active");
}

function subCont5() {
    $(".dc-inner").hide(400);
    $(".subCont5").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont5").addClass("active");
}

function subCont6() {
    $(".dc-inner").hide(400);
    $(".subCont6").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont6").addClass("active");
}

function subCont7() {
    $(".dc-inner").hide(400);
    $(".subCont7").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont7").addClass("active");
}

function subCont8() {
    $(".dc-inner").hide(400);
    $(".subCont8").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont8").addClass("active");
}

function subCont9() {
    $(".dc-inner").hide(400);
    $(".subCont9").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont9").addClass("active");
}

function subCont10() {
    $(".dc-inner").hide(400);
    $(".subCont10").show(400);
    $(".seriesLinks").removeClass("active");
    $("#subCont10").addClass("active");
}