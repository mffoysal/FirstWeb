



// $fa = 0.1; 
// $fa2 = 0.05; 
$off = 0.017; 
function apply(){
    var coupc1 = document.getElementById('c1').value;
    var coupv1 = document.getElementById('v1').value;
    var coupp1 = document.getElementById('p1').value;

    var coupc2 = document.getElementById('c2').value;
    var coupv2 = document.getElementById('v2').value;
    var coupp2 = document.getElementById('p2').value;

    var coupc3 = document.getElementById('c3').value;
    var coupv3 = document.getElementById('v3').value;
    var coupp3 = document.getElementById('p3').value;

    var coupc4 = document.getElementById('c4').value;
    var coupv4 = document.getElementById('v4').value;
    var coupp4 = document.getElementById('p4').value;

    var coupc5 = document.getElementById('c5').value;
    var coupv5 = document.getElementById('v5').value;
    var coupp5 = document.getElementById('p5').value;

    var coupc6 = document.getElementById('c6').value;
    var coupv6 = document.getElementById('v6').value;
    var coupp6 = document.getElementById('p6').value;

    var coupc7 = document.getElementById('c7').value;
    var coupv7 = document.getElementById('v7').value;
    var coupp7 = document.getElementById('p7').value;

    var coupc8 = document.getElementById('c8').value;
    var coupv8 = document.getElementById('v8').value;
    var coupp8 = document.getElementById('p8').value;

    var coupc9 = document.getElementById('c9').value;
    var coupv9 = document.getElementById('v9').value;
    var coupp9 = document.getElementById('p9').value;

    var coupc10 = document.getElementById('c10').value;
    var coupv10 = document.getElementById('v10').value;
    var coupp10 = document.getElementById('p10').value;



    var coupon = document.getElementById('coupon_str').value;
    var couponValue = parseInt(coupon);
    var fm = document.getElementById('total_price').value;
    var mf = parseInt(fm);
    if(coupon == coupc1 && mf > coupp1){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv1 + coupc1;
        var coup = document.getElementById('total_price').value = mf - mf * coupv1;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        // document.getElementById('coupon_str').prop('disabled',true);
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc2 && mf > coupp2){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv2 + coupc2;
        var coup = document.getElementById('total_price').value = mf - mf * coupv2;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc3 && mf > coupp3){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv3 + coupc3;
        var coup = document.getElementById('total_price').value = mf - mf * coupv3;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc4 && mf > coupp4){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv4 + coupc4;
        var coup = document.getElementById('total_price').value = mf - mf * coupv4;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc5 && mf > coupp5){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv5 + coupc5;
        var coup = document.getElementById('total_price').value = mf - mf * coupv5;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc6 && mf > coupp6){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv6 + coupc6;
        var coup = document.getElementById('total_price').value = mf - mf * coupv6;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc7 && mf > coupp7){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv7 + coupc7;
        var coup = document.getElementById('total_price').value = mf - mf * coupv7;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc8 && mf > coupp8){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv8 + coupc8;
        var coup = document.getElementById('total_price').value = mf - mf * coupv8;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc9 && mf > coupp9){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv9 + coupc9;
        var coup = document.getElementById('total_price').value = mf - mf * coupv9;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }
    else if(coupon == coupc10 && mf > coupp10){
        var coupstr = document.getElementById('coupon_str').value = mf - mf * coupv10 + coupc10;
        var coup = document.getElementById('total_price').value = mf - mf * coupv10;
        var couptotal = document.getElementById('total').value = coup + coup * $off + '/৳ Bkash/Nogod পেমেন্ট করুন। সাথে ডেলিভারি খরচ.(অবস্থান অনুসারে।।)';
        swal({
            title: "আপনি সঠিক কুপন দিয়েছেন...।ধন্যবাদ!!! পেমেন্ট করার আগে পেমেন্ট মেথড ভাল করে দেখুন।। পেমেন্ট মেথড সিলেক্ট করুন...",
            icon: "success",
            text: "আপনি ছাড় নিতে পেরেছেন...। আরো ছাড় পেতে চোখ রাখুন।। অর্ডার দিন।।!",
            buttons: false,
            timer: 5000,

         });
    }

    else{
        var cou = 'Data not found';
        // alert(cou);
        swal({
            title: "দুঃখিত!!! আমরা আপনাকে ছাড় দিতে পারছিনা... আপনার দেয়া কুপন সঠিক নয় অথবা মেয়াদ উত্তীর্ণ কুপন।। যোগাযোগ করুন!!",
            icon: "warning",
            text: "দয়া করে সঠিক কুপন দিয়ে অথবা নোটিশ দেখে নিন!",
            buttons: false,
            timer: 6000,

         })
    }
    
    
}
