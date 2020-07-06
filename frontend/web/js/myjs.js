/**
 * Created by maryam on 5/28/2018.
 */

$(document).ready(function () {
    var x=0;
    $(".ul-nav li").click(function () {
        if(x==0) {
            $("ul", this).slideDown(0);
            x = 1;
        }else {
            $("ul", this).slideUp(0);
            x = 0;
        }
    });
});


$('.like-btn').on('click', function() {
    $(this).toggleClass('is-active');
});

$('.minus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value &amp,gt, 1) {
        value = value - 1;
    } else {
        value = 0;
    }

    $input.val(value);

});

$('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value &amp, lt, 100) {
        value = value + 1;
    } else {
        value =100;
    }

    $input.val(value);
});
//
// var id=0;
// $('.add .cartbag').click(function () {
//     id=$(this).attr('id');
// // alert(id);
//     $.ajax({
//         type:'POST',
//         url:"BagController.php",
//         data:{idpro:id}
//     });
//     done(function () {
//        
//     })
// });



///////////////////////////////////////////////


$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        rtl:true,
        dots:true,
        margin: 10,
        nav:true,
        navText:false,
        navRewind: true,
        autoplay:500,
        autoplaySpeed:1000,
        autoPlayTimeout:1000,
        responsive: {
            0: {
                items: 1,
                nav:false,
                dots:true
            },
            350: {
                items: 1,
                nav:false,
                dots:true
            },
            800: {
                items: 2,
                dots:true,
                nav:true
            },
            1000: {
                items: 3,
                dots:true,
                nav:true
            },
            1200:{
                items: 4,
                dots:false,
                nav:true
            }
        }
    });
});

$(".btncolor").hover(function () {

});
/**********************bootmenu*************************************/
$(".toprow1").click(function () {
    $(".ul-nave").toggle();
});

$(".ul-nave li").click(function () {
    $(".ul-nave li ul").toggle()

});
/********************************************************/
$(docname).ready(function () {
    var x=0;
    (".show1").click(function () {
        if (x==0){
            $("ul .ul1", this).slideDown(0);
            x=1;
        }else {
            $("ul .ul1", this).slideUp(0);
            x=0;
        }

    });

});

// $(document).ready(function () {
//     var x=0;
//     $(".ul-nav li").click(function () {
//         if(x==0) {
//             $("ul", this).slideDown(0);
//             x = 1;
//         }else {
//             $("ul", this).slideUp(0);
//             x = 0;
//         }
//     });
// });
